<template>
    <div class="p-6 flex-1">
        <!-- Header section -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <!-- Avatar -->
                <Avatar class="h-8 w-8">
                    <AvatarFallback>MT</AvatarFallback>
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
            <Button variant="outline" class="gap-2">
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
                <div class="col-span-4">Task name</div>
                <div class="col-span-2">Due date</div>
                <div class="col-span-2">Collaborators</div>
                <div class="col-span-2">Projects</div>
                <div class="col-span-2">Task visibility</div>
            </div>

            <!-- Table body: loop over tasks -->
            <div class="divide-y">
                <div
                    v-for="task in tasks"
                    :key="task.id"
                    class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-gray-50"
                >
                    <!-- Task name & Checkbox -->
                    <div class="col-span-4 flex items-center gap-3">
                        <Checkbox />
                        <span>{{ task.title }}</span>
                    </div>

                    <!-- Due date -->
                    <div class="col-span-2 text-sm text-gray-600">
                        {{ task.dueDate }}
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
                        {{ task.visibility }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Recurring tasks section -->
        <div class="mt-8">
            <h3 class="text-sm font-medium mb-4">Recurring</h3>
            <Button variant="outline" class="gap-2">
                <Plus class="h-4 w-4" />
                Add task
            </Button>
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
const tasks = ref([
    {
        id: 1,
        title: "Automatic mailers for Payment Made",
        dueDate: "Nov 29, 2024",
        project: "Lilypay",
        visibility: "Personal",
    },
    {
        id: 2,
        title: "Follow up with Laura Williams at Firefly",
        dueDate: "Dec 2, 2024",
        visibility: "Only me",
    },
    {
        id: 3,
        title: "AI Obituary",
        dueDate: "Dec 20, 2024",
        project: "Lilypay",
        visibility: "Personal",
    },
    {
        id: 4,
        title: "MyIAM Questionnaire Builder Design",
        dueDate: "Dec 20, 2024",
        project: "Darren",
        visibility: "Personal",
        assignee: "D",
    },
]);
</script>

<!-- 
    If you have specific (scoped) styles, add them below.
    Otherwise, keep styles global via Tailwind.
  -->
<style scoped>
/* optional scoped styles here */
</style>
