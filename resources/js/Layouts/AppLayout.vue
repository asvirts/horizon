<script setup lang="ts">
import Dock from "@/Components/Dock.vue";
import Tasklist from "@/Components/Tasklist.vue";

defineProps<{
    tasks: Array<{
        id: number;
        title: string;
        due_date: string | null;
        assignee: string | null;
        project: string | null;
        status: string;
    }>;
}>();
</script>

<template>
    <Dock>
        <Tasklist :tasks="tasks" />
    </Dock>
</template>
