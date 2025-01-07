<script setup>
import Tasklist from "@/Components/Tasklist.vue";
import Dock from "@/Components/Dock.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    tasks: Array,
});
</script>

<template>
    <div className="flex h-screen bg-background">
        <Dock />
        <main className="flex-1 overflow-auto">
            <div class="min-h-screen bg-gray-100">
                <Tasklist :tasks="tasks" />
            </div>
        </main>
    </div>
</template>
