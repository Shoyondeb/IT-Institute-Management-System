<!-- resources/js/Pages/Courses/Index.vue -->
<template>
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Hero Section -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">IT Training Center and Academy</h1>
                    <p class="mt-2 text-lg text-gray-600">Browse and enroll in our comprehensive IT training programs</p>
                </div>

                <!-- Search and Filter -->
                <div class="mb-8 rounded-lg bg-white p-6 shadow">
                    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
                        <!-- Search -->
                        <div class="max-w-md flex-1">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    v-model="search"
                                    type="search"
                                    placeholder="Search courses..."
                                    @change="updateFilters"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 pl-10 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                />
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="flex space-x-4">
                            <select
                                v-model="selectedCategory"
                                @change="updateFilters"
                                class="rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                            >
                                <option value="">All Categories</option>
                                <optgroup v-for="category in categories" :key="category.id" :label="category.name">
                                    <option :value="category.id">{{ category.name }}</option>
                                    <option v-for="sub in category.children" :key="sub.id" :value="sub.id">&nbsp;&nbsp;{{ sub.name }}</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Categories Navigation -->
                <div class="mb-8">
                    <div class="flex flex-wrap gap-2">
                        <button
                            @click="selectCategory(null)"
                            :class="{
                                'bg-indigo-600 text-white': !selectedMainCategory,
                                'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedMainCategory,
                            }"
                            class="rounded-lg px-4 py-2 text-sm font-medium transition-colors"
                        >
                            All Courses
                        </button>
                        <button
                            v-for="category in categories"
                            :key="category.id"
                            @click="selectCategory(category.id)"
                            :class="{
                                'bg-indigo-600 text-white': selectedMainCategory === category.id,
                                'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedMainCategory !== category.id,
                            }"
                            class="rounded-lg px-4 py-2 text-sm font-medium transition-colors"
                        >
                            {{ category.name }}
                        </button>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div v-if="courses.data.length > 0" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="course in courses.data"
                        :key="course.id"
                        class="overflow-hidden rounded-lg bg-white shadow transition-shadow hover:shadow-lg"
                    >
                        <!-- Course Image -->
                        <div class="relative h-48 bg-gray-200">
                            <img v-if="course.image" :src="`/storage/${course.image}`" :alt="course.title" class="h-full w-full object-cover" />
                            <div v-else class="flex h-full w-full items-center justify-center bg-gray-100">
                                <span class="text-gray-400">No Image</span>
                            </div>
                            <div class="absolute right-3 top-3">
                                <span class="rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white">
                                    {{ course.category.parent.name }}
                                </span>
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="p-6">
                            <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ course.title }}</h3>
                            <p class="mb-4 line-clamp-2 text-sm text-gray-600">{{ course.description }}</p>

                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <span class="text-sm text-gray-500">Duration:</span>
                                    <span class="ml-2 text-sm font-medium">{{ course.duration }}</span>
                                </div>
                                <div class="text-lg font-bold text-indigo-600">৳{{ course.fee }}</div>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ course.category.name }}</span>
                                <Link
                                    :href="route('courses.show', course.id)"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-700"
                                >
                                    View Details
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-else class="py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No courses found</h3>
                    <p class="mt-1 text-gray-500">Try adjusting your search or filter criteria.</p>
                </div>

                <!-- Pagination -->
                <div v-if="courses.data.length > 0" class="mt-8">
                    <Pagination :links="courses.links" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    courses: Object,
    categories: Array,
    filters: Object,
});

const search = ref(props.filters.search || '');
const selectedCategory = ref(props.filters.category || '');
const selectedMainCategory = ref(null);

const selectCategory = (categoryId) => {
    selectedMainCategory.value = categoryId;
    selectedCategory.value = categoryId || '';
    updateFilters();
};

const updateFilters = () => {
    const params = {};
    if (search.value) params.search = search.value;
    if (selectedCategory.value) params.category = selectedCategory.value;

    router.get(route('courses.index'), params, {
        preserveState: true,
        replace: true,
    });
};

watch(search, () => {
    updateFilters();
});
</script>
