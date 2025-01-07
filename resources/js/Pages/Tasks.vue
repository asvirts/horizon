<script setup>
import Tasklist from "@/Components/Tasklist.vue";
import Sidebar from "@/Components/Sidebar.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    tasks: Array,
});
</script>

<template>
    <div className="flex h-screen bg-background">
        <Sidebar />
        <main className="flex-1 overflow-auto">
            <div class="min-h-screen bg-gray-100">
                <Tasklist :tasks="tasks" />
            </div>
        </main>
    </div>
</template>
