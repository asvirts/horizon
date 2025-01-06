<script setup lang="ts">
import { computed } from "vue";

const props = defineProps<{
    variant?: "default" | "outline" | "ghost";
    class?: string;
}>();

const classes = computed(() => {
    const baseClasses =
        "px-4 py-2 inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50";
    const variantClasses = {
        default: "bg-primary text-primary-foreground hover:bg-primary/90",
        outline:
            "border border-input hover:bg-accent hover:text-accent-foreground",
        ghost: "hover:bg-accent hover:text-accent-foreground",
    };
    return `${baseClasses} ${variantClasses[props.variant || "default"]} ${
        props.class || ""
    }`;
});
</script>

<template>
    <button :class="classes">
        <slot></slot>
    </button>
</template>
