<script setup>
import Tasklist from "@/Components/Tasklist.vue";
import Dock from "@/Components/Dock.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    tasks: Array,
    all: Array,
});
</script>

<template>
    <div className="flex justify-center bg-background">
        <Dock />
        <main className="flex-1 overflow-auto max-w-[1400px] text-center">
            <div class="min-h-screen bg-gray-100">
                <Tasklist :tasks="tasks" />
                <CompletedTasks :tasks="all" />
            </div>
        </main>
    </div>
</template>
