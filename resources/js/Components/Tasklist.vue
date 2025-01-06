<template>
    <div class="p-6 flex-1">
        <!-- Header section -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <!-- Avatar -->
                <Avatar class="h-8 w-8">
                    <AvatarFallback>AV</AvatarFallback>
                </Avatar>
                <!-- Title -->
                <h1 class="text-xl font-semibold">My tasks</h1>
                <ChevronDown class="h-4 w-4 text-gray-500" />
            </div>
            <SearchBar />
        </div>

        <!-- View Toggles (List, Board, Calendar, Files, etc.) -->
        <div class="flex items-center gap-4 mb-6">
            <Button variant="outline" class="gap-2"> List </Button>
            <Button variant="ghost" class="gap-2">
                <LayoutGrid class="h-4 w-4" />
                Board
            </Button>
            <Button variant="ghost" class="gap-2">
                <Calendar class="h-4 w-4" />
                Calendar
            </Button>
            <Button variant="ghost" class="gap-2">
                <Files class="h-4 w-4" />
                Files
            </Button>
            <Button variant="ghost" class="gap-2">
                <Plus class="h-4 w-4" />
            </Button>
        </div>

        <!-- Add task button -->
        <div class="mb-4">
            <Button variant="outline" class="gap-2" @click="createTask">
                <Plus class="h-4 w-4" />
                Add task
            </Button>
        </div>

        <!-- Task table -->
        <div class="border rounded-lg">
            <!-- Table header -->
            <div
                class="grid grid-cols-12 gap-4 p-4 border-b bg-gray-50 text-sm font-medium"
            >
                <div class="col-span-4">Name</div>
                <div class="col-span-2">Due Date</div>
                <div class="col-span-2">Assignee</div>
                <div class="col-span-2">Projects</div>
                <div class="col-span-2">Status</div>
            </div>

            <!-- Loading state -->
            <div v-if="!tasks.length" class="p-4 text-gray-500">Loading...</div>

            <!-- Table body: loop over tasks -->
            <div v-else class="divide-y">
                <div
                    v-for="task in tasks"
                    :key="task.id"
                    class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-gray-50"
                >
                    <!-- Task name & Checkbox -->
                    <div class="col-span-4 flex items-center gap-3">
                        <Checkbox
                            v-model="task.is_completed"
                            @click="
                                async () => {
                                    try {
                                        await axios.patch(
                                            `/api/tasks/${task.id}`,
                                            {
                                                is_completed: task.is_completed,
                                            }
                                        );
                                    } catch (error) {
                                        console.error(
                                            'Error updating task:',
                                            error
                                        );
                                        // Revert the checkbox if the update fails
                                        task.is_completed = !task.is_completed;
                                    }
                                }
                            "
                        />
                        <span>{{ task.title }}</span>
                    </div>

                    <!-- Due date -->
                    <div class="col-span-2 text-sm text-gray-600">
                        {{ task.due_date }}
                    </div>

                    <!-- Assignee (avatar) -->
                    <div class="col-span-2">
                        <Avatar v-if="task.assignee" class="h-6 w-6">
                            <AvatarFallback>{{ task.assignee }}</AvatarFallback>
                        </Avatar>
                    </div>

                    <!-- Project badge -->
                    <div class="col-span-2">
                        <Badge
                            v-if="task.project"
                            variant="secondary"
                            class="font-normal"
                        >
                            {{ task.project }}
                        </Badge>
                    </div>

                    <!-- Visibility -->
                    <div class="col-span-2 text-sm text-gray-600">
                        {{ task.status }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

// Import your Vue-based UI components
import { Button } from "@/Components/ui/button";
import { Avatar, AvatarFallback } from "@/Components/ui/avatar";
import { Badge } from "@/Components/ui/badge";
import { Checkbox } from "@/Components/ui/checkbox";
import SearchBar from "@/Components/SearchBar.vue";
import axios from "axios";

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}

// Import icons from lucide-vue (or any other Vue Lucide library)
import {
    LayoutGrid,
    Calendar,
    Files,
    Filter,
    SortAsc,
    Users,
    Settings,
    ChevronDown,
    Plus,
} from "lucide-vue-next";

// Reactive tasks array
import { onMounted } from "vue";

let tasks = ref([]);

// Function to fetch tasks from the API
const fetchTasks = async () => {
    try {
        const response = await fetch("/api/tasks");
        const data = await response.json();
        tasks.value = data;
    } catch (error) {
        console.error("Error fetching tasks:", error);
    }
};

// Fetch tasks when component mounts
onMounted(() => {
    fetchTasks();
});

const createTask = async () => {
    await axios.post("/api/tasks/create", {
        title: "New Task",
    });
    fetchTasks();
};
</script>

<!-- 
    If you have specific (scoped) styles, add them below.
    Otherwise, keep styles global via Tailwind.
  -->
<style scoped>
/* optional scoped styles here */
</style>
