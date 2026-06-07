<!-- resources/js/Components/DropdownLink.vue -->
<template>
    <component :is="as" :class="classes" v-bind="$attrs">
        <slot />
    </component>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    as?: string;
}>();

const classes = computed(() => {
    return 'block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out';
});
</script>
