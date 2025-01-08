<template>
    <div class="flex flex-col h-screen">
        <!-- Main content area -->
        <div class="flex-1">
            <slot></slot>
        </div>

        <!-- Dock -->
        <div class="fixed bottom-0 left-0 right-0 flex justify-center p-8">
            <div
                class="bg-zinc-900/80 backdrop-blur-md rounded-2xl p-2 flex items-center gap-2"
            >
                <!-- Create Button -->
                <button
                    class="group flex flex-col items-center"
                    @click="showModal = true"
                >
                    <div
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Plus class="h-6 w-6 text-white" />
                    </div>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Create</span
                    >
                </button>

                <!-- Divider -->
                <div class="w-px h-8 bg-zinc-700/50"></div>

                <!-- Main Navigation -->
                <button class="group flex flex-col items-center">
                    <Link
                        href="/"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Home class="h-6 w-6 text-white" />
                    </Link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Home</span
                    >
                </button>

                <button class="group flex flex-col items-center">
                    <Link
                        href="/tasks"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <CheckSquare class="h-6 w-6 text-white" />
                    </Link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >My tasks</span
                    >
                </button>

                <button class="group flex flex-col items-center">
                    <router-link
                        to="/inbox"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Inbox class="h-6 w-6 text-white" />
                    </router-link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Inbox</span
                    >
                </button>

                <!-- You can add more dividers between sections if desired -->
                <div class="w-px h-8 bg-zinc-700/50"></div>

                <!-- Insights Section Icons -->
                <button class="group flex flex-col items-center hidden md:flex">
                    <router-link
                        to="/reporting"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <LineChart class="h-6 w-6 text-white" />
                    </router-link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Reporting</span
                    >
                </button>

                <button class="group flex flex-col items-center hidden md:flex">
                    <router-link
                        to="/portfolios"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Briefcase class="h-6 w-6 text-white" />
                    </router-link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Portfolios</span
                    >
                </button>

                <button class="group flex flex-col items-center hidden md:flex">
                    <router-link
                        to="/goals"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Target class="h-6 w-6 text-white" />
                    </router-link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Goals</span
                    >
                </button>

                <!-- Team Section Icons -->
                <button class="group flex flex-col items-center">
                    <router-link
                        to="/team"
                        class="p-3 rounded-xl hover:bg-zinc-800 transition-all duration-200 group-hover:scale-110"
                    >
                        <Users class="h-6 w-6 text-white" />
                    </router-link>
                    <span
                        class="text-xs opacity-0 group-hover:opacity-100 transition-opacity absolute -top-6"
                        >Personal</span
                    >
                </button>
            </div>
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
import { Link } from "@inertiajs/vue3";

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
</script>
