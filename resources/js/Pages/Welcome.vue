<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Sidebar from "@/Components/Sidebar.vue";
import TaskList from "@/Components/Tasklist.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <div className="flex h-screen bg-background">
        <Sidebar />
        <main className="flex-1 overflow-auto">
            <TaskList />
        </main>
    </div>
</template>
