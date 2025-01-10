<script setup>
import { Head } from "@inertiajs/vue3";
import Dock from "@/Components/Dock.vue";
import { Avatar, AvatarFallback } from "@/Components/ui/avatar";

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}

defineProps({
    user: Object,
    tasks: Array,
    projects: Array,
    clients: Array,
});
</script>

<template>
    <Head title="Welcome" />
    <div className="flex bg-background">
        <Dock />
        <main className="flex-1 overflow-auto max-w-[1400px] mx-auto">
            <div class="p-6 flex-1">
                <!-- Header section -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <!-- Avatar -->
                        <Avatar
                            class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center"
                        >
                            <AvatarFallback>AV</AvatarFallback>
                        </Avatar>
                        <!-- Title -->
                        <h1 class="text-xl font-semibold">Welcome, Andrew</h1>
                        <p class="text-gray-500 ml-2">
                            ({{ tasks?.length || 0 }} Tasks)
                        </p>
                    </div>
                    <SearchBar />
                </div>
            </div>
        </main>
    </div>
</template>
