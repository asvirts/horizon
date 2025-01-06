<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  modelValue?: boolean
  class?: string
}>()

const emit = defineEmits<{
  'update:modelValue': [value: boolean]
}>()

const classes = computed(() => `h-4 w-4 rounded border border-gray-300 text-primary focus:ring-primary ${props.class || ''}`)
</script>

<template>
  <input 
    type="checkbox"
    :checked="modelValue"
    @change="$emit('update:modelValue', ($event.target as HTMLInputElement).checked)"
    :class="classes"
  />
</template> 