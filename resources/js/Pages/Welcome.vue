<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Sidebar from "@/Components/Sidebar.vue";
import TaskList from "@/Components/Tasklist.vue";

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
            <div class="p-6 flex-1">
                <!-- Header section -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <!-- Avatar -->
                        <Avatar class="h-8 w-8">
                            <AvatarFallback>AV</AvatarFallback>
                        </Avatar>
                        <!-- Title -->
                        <h1 class="text-xl font-semibold">Welcome, Andrew</h1>
                        <ChevronDown class="h-4 w-4 text-gray-500" />
                    </div>
                    <SearchBar />
                </div>
            </div>
        </main>
    </div>
</template>
