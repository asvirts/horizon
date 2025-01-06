<template>
    <div class="flex h-screen">
        <div class="w-60 bg-zinc-900 text-white p-4 flex flex-col h-full">
            <!-- "Create" Button -->
            <button
                class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
            >
                <router-link to="/" class="flex items-center gap-2 w-full">
                    <Plus class="h-4 w-4" />
                    Create
                </router-link>
            </button>

            <!-- Main Navigation -->
            <nav class="space-y-1 mt-4">
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link to="/" class="flex items-center gap-2 w-full">
                        <Home class="h-4 w-4" />
                        Home
                    </router-link>
                </button>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/tasks"
                        class="flex items-center gap-2 w-full"
                    >
                        <CheckSquare class="h-4 w-4" />
                        My tasks
                    </router-link>
                </button>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/inbox"
                        class="flex items-center gap-2 w-full"
                    >
                        <Inbox class="h-4 w-4" />
                        Inbox
                    </router-link>
                </button>
            </nav>

            <!-- Insights Section -->
            <div class="mt-8">
                <h2 class="text-xs font-semibold text-zinc-400 px-4 mb-2">
                    Insights
                </h2>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/reporting"
                        class="flex items-center gap-2 w-full"
                    >
                        <LineChart class="h-4 w-4" />
                        Reporting
                    </router-link>
                </button>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/portfolios"
                        class="flex items-center gap-2 w-full"
                    >
                        <Briefcase class="h-4 w-4" />
                        Portfolios
                    </router-link>
                </button>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/goals"
                        class="flex items-center gap-2 w-full"
                    >
                        <Target class="h-4 w-4" />
                        Goals
                    </router-link>
                </button>
            </div>

            <!-- Team Section -->
            <div class="mt-8">
                <h2 class="text-xs font-semibold text-zinc-400 px-4 mb-2">
                    Team
                </h2>
                <button
                    class="flex items-center gap-2 text-white px-4 py-2 hover:bg-zinc-800 rounded w-full"
                >
                    <router-link
                        to="/team"
                        class="flex items-center gap-2 w-full"
                    >
                        <Users class="h-4 w-4" />
                        Personal
                    </router-link>
                </button>
            </div>
        </div>
        <div class="flex-1">
            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    Plus,
    Home,
    CheckSquare,
    Inbox,
    LineChart,
    Briefcase,
    Target,
    Users,
} from "lucide-vue-next";
</script>
