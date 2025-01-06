<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  class?: string
}>()

const classes = computed(() => `flex h-full w-full items-center justify-center rounded-full bg-gray-100 text-gray-600 ${props.class || ''}`)
</script>

<template>
  <div :class="classes">
    <slot></slot>
  </div>
</template> 