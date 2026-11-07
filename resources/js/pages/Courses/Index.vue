<!-- resources/js/Pages/Courses/Index.vue -->
<template>
    <AuthenticatedLayout>
        <div class="relative min-h-screen overflow-hidden bg-black py-6">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute -right-20 top-20 h-96 w-96 animate-pulse rounded-full bg-purple-600/20 blur-3xl"></div>
                <div
                    class="absolute -bottom-20 -left-20 h-96 w-96 animate-pulse rounded-full bg-blue-600/20 blur-3xl"
                    style="animation-delay: 2s"
                ></div>
                <div
                    class="absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-600/10 blur-3xl"
                ></div>
            </div>

            <!-- Grid Pattern -->
            <div
                class="bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.03%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] absolute inset-0"
            ></div>

            <!-- Floating Particles -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    v-for="n in 25"
                    :key="n"
                    class="animate-float-particle absolute rounded-full"
                    :class="[
                        n % 3 === 0
                            ? 'bg-gradient-to-r from-blue-400/20 to-purple-400/20'
                            : n % 3 === 1
                              ? 'bg-gradient-to-r from-purple-400/20 to-pink-400/20'
                              : 'bg-gradient-to-r from-pink-400/20 to-red-400/20',
                    ]"
                    :style="{
                        left: Math.random() * 100 + '%',
                        top: Math.random() * 100 + '%',
                        animationDelay: Math.random() * 8 + 's',
                        animationDuration: 4 + Math.random() * 6 + 's',
                        width: Math.random() * 4 + 2 + 'px',
                        height: Math.random() * 4 + 2 + 'px',
                    }"
                ></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Hero Section -->
                <div class="animate-fade-in mb-10">
                    <div
                        class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-blue-600/20 via-purple-600/20 to-pink-600/20 p-8 shadow-2xl backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-purple-500/10"
                    >
                        <!-- Animated background elements -->
                        <div class="absolute inset-0 opacity-20">
                            <div class="animate-float absolute -left-20 -top-20 h-64 w-64 rounded-full bg-blue-500 blur-3xl"></div>
                            <div class="animate-float-delayed absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-purple-600 blur-3xl"></div>
                        </div>

                        <!-- Decorative dots -->
                        <div class="absolute right-4 top-4 opacity-20">
                            <div class="grid grid-cols-4 gap-1">
                                <div v-for="i in 16" :key="i" class="h-1.5 w-1.5 rounded-full bg-white"></div>
                            </div>
                        </div>

                        <div class="relative z-10">
                            <div class="flex flex-wrap items-start justify-between gap-4">
                                <div>
                                    <div
                                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                                    >
                                        <svg class="h-4 w-4 animate-pulse text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            />
                                        </svg>
                                        <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text font-semibold text-transparent">
                                            IT Training Center & Academy
                                        </span>
                                    </div>
                                    <h1 class="text-3xl font-bold text-white md:text-4xl">
                                        🚀 Browse Our
                                        <span
                                            class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                                            >Courses</span
                                        >
                                    </h1>
                                    <p class="mt-3 text-lg text-blue-200/80">Browse and enroll in our comprehensive IT training programs</p>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <span
                                        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-white/10"
                                    >
                                        <span class="mr-1">💻</span> {{ courses.total || courses.data.length }}+ Courses
                                    </span>
                                    <span
                                        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-white/10"
                                    >
                                        <span class="mr-1">👨‍🏫</span> Expert Instructors
                                    </span>
                                    <span
                                        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-white/10"
                                    >
                                        <span class="mr-1">🎓</span> Certificate Included
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="animate-fade-in animation-delay-100 mb-8">
                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
                            <!-- Search -->
                            <div class="max-w-md flex-1">
                                <div class="group relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <svg
                                            class="h-5 w-5 text-gray-400 transition-colors group-hover:text-blue-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
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
                                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    />
                                    <button
                                        v-if="search"
                                        @click="
                                            search = '';
                                            updateFilters();
                                        "
                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 transition-colors hover:text-white"
                                    >
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="flex space-x-3">
                                <div class="relative">
                                    <select
                                        v-model="selectedCategory"
                                        @change="updateFilters"
                                        class="min-w-[180px] appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    >
                                        <option value="" class="bg-gray-900">📚 All Categories</option>
                                        <optgroup v-for="category in categories" :key="category.id" :label="category.name" class="bg-gray-900">
                                            <option :value="category.id" class="bg-gray-900">{{ category.name }}</option>
                                            <option v-for="sub in category.children" :key="sub.id" :value="sub.id" class="bg-gray-900">
                                                &nbsp;&nbsp;└ {{ sub.name }}
                                            </option>
                                        </optgroup>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Results Count -->
                                <div
                                    v-if="courses.data.length > 0"
                                    class="flex items-center rounded-xl border border-blue-500/20 bg-blue-500/10 px-4 py-2.5 text-sm text-blue-300"
                                >
                                    <span class="font-semibold">{{ courses.total || courses.data.length }}</span>
                                    <span class="ml-1">courses found</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Navigation -->
                <div class="animate-fade-in animation-delay-200 mb-8">
                    <div class="scrollbar-hide flex flex-wrap gap-2 overflow-x-auto pb-2">
                        <button
                            v-for="category in categories"
                            :key="category.id"
                            @click="selectCategory(category.id)"
                            class="group relative flex-shrink-0 rounded-xl px-5 py-2.5 text-sm font-medium transition-all duration-300 hover:scale-105"
                            :class="{
                                'border border-blue-500/30 bg-gradient-to-r from-blue-500/20 to-purple-500/20 text-white shadow-lg shadow-purple-500/20':
                                    selectedMainCategory === category.id,
                                'border border-white/10 bg-white/5 text-gray-400 hover:border-white/20 hover:text-white':
                                    selectedMainCategory !== category.id,
                            }"
                        >
                            <span class="relative z-10">{{ category.name }}</span>
                            <span
                                v-if="selectedMainCategory === category.id"
                                class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10"
                            ></span>
                        </button>
                        <button
                            @click="selectCategory(null)"
                            class="group relative flex-shrink-0 rounded-xl px-5 py-2.5 text-sm font-medium transition-all duration-300 hover:scale-105"
                            :class="{
                                'border border-blue-500/30 bg-gradient-to-r from-blue-500/20 to-purple-500/20 text-white shadow-lg shadow-purple-500/20':
                                    !selectedMainCategory,
                                'border border-white/10 bg-white/5 text-gray-400 hover:border-white/20 hover:text-white': selectedMainCategory,
                            }"
                        >
                            <span class="relative z-10">🎯 All Courses</span>
                        </button>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div v-if="courses.data.length > 0">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div
                            v-for="(course, index) in courses.data"
                            :key="course.id"
                            class="animate-fade-in group"
                            :style="{ animationDelay: index * 0.05 + 's' }"
                        >
                            <div
                                class="relative rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:scale-[1.02] hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <!-- Glow effect -->
                                <div
                                    class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                                ></div>

                                <!-- Course Image -->
                                <div class="relative h-52 overflow-hidden rounded-t-3xl bg-gradient-to-br from-blue-500/20 to-purple-500/20">
                                    <img
                                        v-if="course.image"
                                        :src="`/storage/${course.image}`"
                                        :alt="course.title"
                                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    />
                                    <div v-else class="flex h-full w-full items-center justify-center">
                                        <svg class="h-20 w-20 text-blue-400/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            />
                                        </svg>
                                    </div>

                                    <!-- Image overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                    ></div>

                                    <!-- Badges -->
                                    <div class="absolute left-3 top-3 flex flex-wrap gap-2">
                                        <span
                                            class="rounded-full bg-gradient-to-r from-blue-500 to-purple-500 px-3 py-1 text-xs font-semibold text-white shadow-lg shadow-purple-500/30"
                                        >
                                            {{ course.category.parent?.name || course.category.name }}
                                        </span>
                                        <span
                                            v-if="course.level"
                                            class="rounded-full bg-gradient-to-r from-emerald-500 to-green-500 px-3 py-1 text-xs font-semibold text-white shadow-lg shadow-emerald-500/30"
                                        >
                                            {{ course.level }}
                                        </span>
                                    </div>

                                    <!-- Wishlist Button -->
                                    <button
                                        class="absolute right-3 top-3 rounded-full bg-white/10 p-2 backdrop-blur-xl transition-all duration-300 hover:scale-110 hover:bg-white/20"
                                    >
                                        <svg
                                            class="h-5 w-5 text-white transition-colors hover:text-red-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Price tag on image -->
                                    <div class="absolute bottom-3 right-3 rounded-xl bg-black/60 px-4 py-1.5 backdrop-blur-xl">
                                        <span class="text-lg font-bold text-white">৳{{ course.fee }}</span>
                                        <span v-if="course.original_fee" class="ml-2 text-sm text-gray-400 line-through"
                                            >৳{{ course.original_fee }}</span
                                        >
                                    </div>
                                </div>

                                <!-- Course Info -->
                                <div class="p-6">
                                    <h3 class="mb-2 line-clamp-1 text-lg font-semibold text-white transition-colors group-hover:text-blue-400">
                                        {{ course.title }}
                                    </h3>
                                    <p class="mb-4 line-clamp-2 text-sm text-gray-400">{{ course.description }}</p>

                                    <!-- Course Meta -->
                                    <div class="mb-4 flex flex-wrap items-center gap-4 text-sm">
                                        <div class="flex items-center text-gray-400">
                                            <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                            {{ course.duration }}
                                        </div>
                                        <div class="flex items-center text-gray-400">
                                            <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                                />
                                            </svg>
                                            {{ course.enrollments_count || 0 }} enrolled
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between border-t border-white/10 pt-4">
                                        <Link
                                            :href="route('courses.public.show', course.id)"
                                            class="group/btn relative inline-flex items-center overflow-hidden rounded-xl px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 hover:scale-105"
                                        >
                                            <span
                                                class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                            ></span>
                                            <span
                                                class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover/btn:bg-opacity-0"
                                            ></span>
                                            <span class="relative z-10 flex items-center">
                                                View Course
                                                <svg
                                                    class="ml-2 h-4 w-4 transition-transform duration-300 group-hover/btn:translate-x-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                                                    />
                                                </svg>
                                            </span>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-else class="animate-fade-in py-16 text-center">
                    <div class="mx-auto max-w-md rounded-3xl border border-white/10 bg-white/5 p-12 backdrop-blur-xl">
                        <div class="flex justify-center">
                            <svg class="animate-float h-24 w-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-2xl font-semibold text-white">No courses found</h3>
                        <p class="mt-2 text-gray-400">Try adjusting your search or filter criteria.</p>
                        <button
                            @click="resetFilters"
                            class="group relative mt-6 inline-flex items-center overflow-hidden rounded-xl px-6 py-3 text-sm font-medium text-white transition-all duration-300 hover:scale-105"
                        >
                            <span
                                class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                            ></span>
                            <span class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"></span>
                            <span class="relative z-10 flex items-center">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    />
                                </svg>
                                Reset Filters
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Pagination -->
                <div v-if="courses.data.length > 0" class="animate-fade-in animation-delay-300 mt-8">
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
import { ref } from 'vue';

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

const resetFilters = () => {
    search.value = '';
    selectedCategory.value = '';
    selectedMainCategory.value = null;
    updateFilters();
};
</script>

<style scoped>
/* Animation Keyframes */
@keyframes float-particle {
    0%,
    100% {
        transform: translateY(0px) translateX(0px) rotate(0deg);
        opacity: 0.2;
    }
    25% {
        transform: translateY(-30px) translateX(15px) rotate(90deg);
        opacity: 0.6;
    }
    50% {
        transform: translateY(-10px) translateX(-15px) rotate(180deg);
        opacity: 0.4;
    }
    75% {
        transform: translateY(-40px) translateX(10px) rotate(270deg);
        opacity: 0.7;
    }
}

@keyframes gradient-x {
    0%,
    100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes float-delayed {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Animation Classes */
.animate-float-particle {
    animation: float-particle 6s ease-in-out infinite;
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 3s ease-in-out infinite 1.5s;
}

.animation-delay-100 {
    animation-delay: 0.1s;
}

.animation-delay-200 {
    animation-delay: 0.2s;
}

.animation-delay-300 {
    animation-delay: 0.3s;
}

/* Hide scrollbar for category navigation */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #0a0a0a;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}

/* Smooth scroll */
html {
    scroll-behavior: smooth;
}

/* Glassmorphism */
.backdrop-blur-xl {
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

/* Transition improvements */
.transition-all {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Gradient text */
.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}

/* Select dropdown styling */
select option {
    background-color: #1a1a1a;
    color: white;
}

select optgroup {
    background-color: #1a1a1a;
    color: #9ca3af;
}

/* Input autofill styles */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset !important;
    -webkit-text-fill-color: white !important;
    border-color: rgba(59, 130, 246, 0.3) !important;
}
</style>
