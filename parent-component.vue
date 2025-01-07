<template>
    <Dock @showCreateModal="tasklist.openModal()" />
    <Tasklist ref="tasklist" :tasks="tasks" />
</template>

<script setup>
import { ref } from "vue";
const tasklist = ref(null);
</script>
