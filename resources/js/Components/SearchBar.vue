<script setup lang="ts">
import { ref } from "vue";
import { Search } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";

const searchQuery = ref("");
</script>

<template>
    <div class="relative">
        <div
            class="flex items-center border rounded-lg px-3 py-2 gap-2 hover:border-gray-400 focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20"
        >
            <Search class="h-4 w-4 text-gray-500" />
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Search..."
                class="flex-1 border-none focus:outline-none bg-transparent text-sm"
            />
            <Button
                v-if="searchQuery"
                variant="ghost"
                class="h-6 w-6 p-0"
                @click="searchQuery = ''"
            >
                <span class="sr-only">Clear search</span>
                ×
            </Button>
        </div>
    </div>
</template>
