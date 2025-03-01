<template>
    <div class="p-6 pb-48 flex-1">
        <!-- Header section -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <!-- Avatar -->
                <Avatar
                    class="h-8 w-8 bg-white border border-gray-200 flex items-center justify-center"
                >
                    <AvatarFallback>AV</AvatarFallback>
                </Avatar>
                <!-- Title -->
                <h1 class="text-xl font-semibold">My tasks</h1>
                <p class="text-gray-500 ml-2">
                    ({{ tasks?.length ?? 0 }} Tasks)
                </p>
            </div>
            <SearchBar />
        </div>

        <!-- View Toggles (List, Board, Calendar, Files, etc.) -->
        <div class="flex items-center gap-4 mb-6">
            <Button variant="outline" class="gap-2 bg-white"> List </Button>
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
        <div class="mb-4 flex justify-between">
            <Button variant="outline" class="gap-2 bg-white" @click="openModal">
                <Plus class="h-4 w-4" />
                Add task
            </Button>
            <Button
                variant="outline"
                class="gap-2 bg-white"
                @click="showCompleted = !showCompleted"
                :class="{ 'bg-gray-200': showCompleted }"
            >
                Show completed
            </Button>
        </div>

        <!-- Task table -->
        <div class="border rounded-lg">
            <!-- Table header -->
            <div
                class="grid grid-cols-12 gap-4 p-4 border-b bg-gray-100 text-sm font-medium"
            >
                <div class="col-span-4">Name</div>
                <div class="col-span-2">Due Date</div>
                <div class="col-span-2">Assignee</div>
                <div class="col-span-2">Projects</div>
                <div class="col-span-2">Status</div>
            </div>

            <!-- Loading state -->
            <div v-if="!tasks || tasks.length === 0" class="p-4 text-gray-500">
                {{ !tasks ? "Loading..." : "No tasks found" }}
            </div>

            <!-- Table body: loop over tasks -->
            <div v-else-if="tasks.length > 0" class="divide-y">
                <div
                    v-for="task in filteredTasks"
                    :key="task.id"
                    class="grid grid-cols-12 gap-4 p-4 items-center bg-white hover:bg-gray-50"
                >
                    <!-- Task name & Checkbox -->
                    <div class="col-span-4 flex items-center gap-3">
                        <Checkbox
                            :modelValue="task.is_completed"
                            @click="completeTask(task.id)"
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

    <!-- Modal -->
    <Modal :show="showModal" @close="showModal = false">
        <div class="p-6 flex flex-col gap-4">
            <h1 class="text-xl font-semibold">Add task</h1>
            <Input
                type="text"
                placeholder="Title"
                v-model="newTaskTitle"
                @input="(e) => (newTaskTitle = e.target.value)"
                required
            />
            <Input
                type="text"
                placeholder="Due date"
                v-model="newTaskDueDate"
                @input="(e) => (newTaskDueDate = e.target.value)"
                required
            />
            <Input
                type="text"
                placeholder="Assignee"
                v-model="newTaskAssignee"
                @input="(e) => (newTaskAssignee = e.target.value)"
                required
            />
            <Input
                type="text"
                placeholder="Project"
                v-model="newTaskProject"
                @input="(e) => (newTaskProject = e.target.value)"
                required
            />
            <Button class="w-full" variant="outline" @click="createTask">
                Submit
            </Button>
        </div>
    </Modal>
</template>

<script setup lang="ts">
// Import your Vue-based UI components
import { Button } from "@/Components/ui/button";
import { Avatar, AvatarFallback } from "@/Components/ui/avatar";
import { Badge } from "@/Components/ui/badge";
import { Checkbox } from "@/Components/ui/checkbox";
import SearchBar from "@/Components/SearchBar.vue";
import Modal from "@/Components/Modal.vue";
import { router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

interface Task {
    id: number;
    title: string;
    description?: string;
    status: string;
    start_date?: string;
    end_date?: string;
    is_completed: boolean;
    due_date: string | null;
    assignee: string | null;
    created_at: string;
    updated_at: string;

    // Relationships
    project?: {
        id: number;
        name: string;
    };
    users?: Array<{
        id: number;
        name: string;
        email: string;
    }>;
    comments?: Array<{
        id: number;
        content: string;
    }>;
    tags?: Array<{
        id: number;
        name: string;
    }>;
}

const showCompleted = ref(false);
const showModal = ref(false);
const newTaskTitle = ref("");
const newTaskDueDate = ref("");
const newTaskAssignee = ref("");
const newTaskProject = ref("");
const processing = ref(false);

const props = defineProps<{
    tasks: Task[];
}>();

// Add computed property for filtered tasks
const filteredTasks = computed(() => {
    if (showCompleted.value) {
        return props.tasks;
    }
    return props.tasks.filter((task) => !task.is_completed);
});

function createTask() {
    router.post("/tasks", {
        title: newTaskTitle.value,
        due_date: newTaskDueDate.value,
        assignee: newTaskAssignee.value,
        project: newTaskProject.value,
    });

    // Clear form and close modal
    newTaskTitle.value = "";
    newTaskDueDate.value = "";
    newTaskAssignee.value = "";
    newTaskProject.value = "";
    showModal.value = false;
}

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
    ChevronDown,
    Plus,
} from "lucide-vue-next";
import { createClient } from "@supabase/supabase-js";

const supabase = createClient(
    import.meta.env.VITE_SUPABASE_URL,
    import.meta.env.VITE_SUPABASE_ANON_KEY
);

async function completeTask(taskId: number) {
    if (processing.value) return;

    processing.value = true;
    try {
        const { data, error } = await supabase
            .from("tasks")
            .update({ is_completed: true })
            .eq("id", taskId)
            .select();

        if (error) throw error;

        // Refresh the page to show updated data
        router.reload();
    } finally {
        processing.value = false;
    }
}

const openModal = () => {
    showModal.value = true;
};

// Expose the method to parent components
defineExpose({
    openModal,
});
</script>

<!-- 
    If you have specific (scoped) styles, add them below.
    Otherwise, keep styles global via Tailwind.
  -->
<style scoped>
/* optional scoped styles here */
</style>
