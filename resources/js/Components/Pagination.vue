<!-- resources/js/Components/Pagination.vue -->
<template>
    <div v-if="links.length > 3">
        <div class="-mb-1 flex flex-wrap">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400" v-html="link.label" />
                <Link
                    v-else
                    class="mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-indigo-500 text-white': link.active }"
                    :href="link.url"
                >
                    {{ link.label }}
                </Link>
            </template>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    links: Array<{
        url: string | null;
        label: string;
        active: boolean;
    }>;
}>();
</script>
