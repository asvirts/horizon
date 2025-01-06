<script setup>
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
</script>

<template>
    <div className="flex h-screen bg-background">
        <Sidebar />
        <main className="flex-1 overflow-auto">
            <div v-if="loading">Loading...</div>
            <TaskList />
        </main>
    </div>
</template>
