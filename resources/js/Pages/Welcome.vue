<script setup>
import { Head, Link } from "@inertiajs/vue3";

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
    <Head title="Welcome" />
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-bold">Welcome to Horizon</h1>
        <div class="flex flex-col items-center justify-center">
            <div class="flex gap-4">
                <Link
                    href="/login"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md"
                    >Login</Link
                >
                <Link
                    href="/register"
                    class="bg-green-500 text-white px-4 py-2 rounded-md"
                    >Register</Link
                >
            </div>
        </div>
    </div>
</template>
