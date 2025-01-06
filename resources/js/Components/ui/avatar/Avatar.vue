<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  class?: string
}>()

const classes = computed(() => `relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full ${props.class || ''}`)
</script>

<template>
  <div :class="classes">
    <slot></slot>
  </div>
</template> 