<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  variant?: 'default' | 'secondary'
  class?: string
}>()

const classes = computed(() => {
  const baseClasses = 'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors'
  const variantClasses = {
    default: 'bg-primary text-primary-foreground hover:bg-primary/80',
    secondary: 'bg-secondary text-secondary-foreground hover:bg-secondary/80'
  }
  return `${baseClasses} ${variantClasses[props.variant || 'default']} ${props.class || ''}`
})
</script>

<template>
  <div :class="classes">
    <slot></slot>
  </div>
</template> 