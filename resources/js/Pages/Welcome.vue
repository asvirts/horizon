<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Sidebar from "@/Components/Sidebar.vue";
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
    <div class="flex">
        <Sidebar />
        <div class="flex flex-col items-center justify-center h-screen flex-1">
            <h1 class="text-4xl font-bold">Welcome to Horizon</h1>
        </div>
    </div>
</template>
