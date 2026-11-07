<!-- resources/js/Pages/Dashboard.vue -->
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
                    v-for="n in 20"
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
                <!-- Welcome Section -->
                <div class="animate-fade-in mb-8">
                    <div
                        class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-blue-600/20 via-purple-600/20 to-pink-600/20 p-8 shadow-2xl backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-purple-500/10"
                    >
                        <!-- Animated background elements -->
                        <div class="absolute inset-0 opacity-20">
                            <div class="animate-pulse-slow absolute -right-24 -top-24 h-64 w-64 rounded-full bg-blue-500 blur-3xl"></div>
                            <div
                                class="animate-pulse-slow animation-delay-1000 absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-purple-600 blur-3xl"
                            ></div>
                            <div
                                class="absolute left-1/2 top-1/2 h-96 w-96 -translate-x-1/2 -translate-y-1/2 rounded-full bg-pink-500/20 blur-3xl"
                            ></div>
                        </div>

                        <!-- Decorative dots -->
                        <div class="absolute right-4 top-4 opacity-20">
                            <div class="grid grid-cols-4 gap-1">
                                <div v-for="i in 16" :key="i" class="h-1.5 w-1.5 rounded-full bg-white"></div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="flex flex-wrap items-start justify-between gap-4">
                                <div>
                                    <div
                                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                                    >
                                        <span class="relative flex h-2.5 w-2.5">
                                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-400"></span>
                                        </span>
                                        <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text font-semibold text-transparent">
                                            Active
                                        </span>
                                    </div>
                                    <h1 class="text-3xl font-bold text-white md:text-4xl">
                                        <TypingText :text="`Welcome, ${$page.props.auth.user.name}! 👋`" :speed="50" :delay="500" />
                                    </h1>
                                    <p class="mt-2 text-lg text-blue-200/80">Manage your learning journey with us</p>
                                </div>
                                <div class="flex gap-3">
                                    <span
                                        class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/20 px-4 py-2 text-sm font-medium text-blue-200 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-blue-500/30"
                                    >
                                        <span class="mr-1.5 inline-block h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                                        {{ enrolledCourses.length }} Verified Courses
                                    </span>
                                    <span
                                        class="inline-flex items-center rounded-full border border-purple-500/20 bg-purple-500/20 px-4 py-2 text-sm font-medium text-purple-200 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:bg-purple-500/30"
                                    >
                                        {{ totalCourses }} Courses Available
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Cards -->
                <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-3">
                    <!-- My Courses Card -->
                    <div class="animate-fade-in animation-delay-100 group">
                        <div
                            class="relative rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <div
                                class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                            ></div>
                            <div class="relative flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-blue-500/30 to-purple-500/30 shadow-lg transition-transform duration-500 group-hover:rotate-3 group-hover:scale-110"
                                    >
                                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white">My Courses</h3>
                                    <p class="text-sm text-gray-400">View all verified courses</p>
                                </div>
                            </div>
                            <div class="relative mt-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-3xl font-bold text-white">{{ enrolledCourses.length }}</span>
                                    <span class="text-sm text-gray-400">verified</span>
                                </div>
                                <Link
                                    :href="route('my-courses')"
                                    class="group/link inline-flex items-center text-sm font-medium text-blue-400 transition-all duration-300 hover:text-blue-300"
                                >
                                    View all courses
                                    <svg
                                        class="ml-1 h-4 w-4 transition-all duration-300 group-hover/link:translate-x-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Browse Courses Card -->
                    <div class="animate-fade-in animation-delay-200 group">
                        <div
                            class="relative rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <div
                                class="absolute inset-0 rounded-3xl bg-gradient-to-r from-emerald-500/0 via-green-500/0 to-emerald-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                            ></div>
                            <div class="relative flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-emerald-500/30 to-green-500/30 shadow-lg transition-transform duration-500 group-hover:rotate-3 group-hover:scale-110"
                                    >
                                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white">Browse Courses</h3>
                                    <p class="text-sm text-gray-400">Explore new learning opportunities</p>
                                </div>
                            </div>
                            <div class="relative mt-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-3xl font-bold text-white">{{ totalCourses }}</span>
                                    <span class="text-sm text-gray-400">available</span>
                                </div>
                                <Link
                                    :href="route('courses.public.index')"
                                    class="group/link inline-flex items-center text-sm font-medium text-emerald-400 transition-all duration-300 hover:text-emerald-300"
                                >
                                    Explore courses
                                    <svg
                                        class="ml-1 h-4 w-4 transition-all duration-300 group-hover/link:translate-x-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Card -->
                    <div class="animate-fade-in animation-delay-300 group">
                        <div
                            class="relative rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <div
                                class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-500/0 via-pink-500/0 to-purple-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                            ></div>
                            <div class="relative flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-purple-500/30 to-pink-500/30 shadow-lg transition-transform duration-500 group-hover:rotate-3 group-hover:scale-110"
                                    >
                                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white">Profile</h3>
                                    <p class="text-sm text-gray-400">Update your account information</p>
                                </div>
                            </div>
                            <div class="relative mt-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-400">Account settings</span>
                                </div>
                                <Link
                                    :href="route('profile.edit')"
                                    class="group/link inline-flex items-center text-sm font-medium text-purple-400 transition-all duration-300 hover:text-purple-300"
                                >
                                    Edit profile
                                    <svg
                                        class="ml-1 h-4 w-4 transition-all duration-300 group-hover/link:translate-x-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Verified Enrollments -->
                <div class="animate-fade-in animation-delay-400">
                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="border-b border-white/10 px-6 py-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-white">Your Verified Courses</h3>
                                    <p class="text-sm text-gray-400">Continue where you left off</p>
                                </div>
                                <Link
                                    :href="route('my-courses')"
                                    class="group/link inline-flex items-center text-sm font-medium text-blue-400 transition-all duration-300 hover:text-blue-300"
                                >
                                    View All
                                    <svg
                                        class="ml-1 h-4 w-4 transition-all duration-300 group-hover/link:translate-x-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </Link>
                            </div>
                        </div>

                        <div class="p-6">
                            <div v-if="enrolledCourses.length > 0" class="space-y-4">
                                <div
                                    v-for="(course, index) in enrolledCourses"
                                    :key="course.id"
                                    class="group/item relative rounded-2xl border border-white/10 bg-white/5 p-4 transition-all duration-500 hover:scale-[1.02] hover:border-white/20 hover:bg-white/10 hover:shadow-xl"
                                >
                                    <div
                                        class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover/item:opacity-5"
                                    ></div>
                                    <div class="relative flex items-center justify-between">
                                        <div class="flex min-w-0 flex-1 items-center">
                                            <div
                                                class="relative h-16 w-16 flex-shrink-0 overflow-hidden rounded-xl border border-white/10 bg-gradient-to-br from-white/10 to-white/5 shadow-lg"
                                            >
                                                <img
                                                    v-if="course.image"
                                                    :src="`/storage/${course.image}`"
                                                    :alt="course.title"
                                                    class="h-full w-full object-cover transition-transform duration-500 group-hover/item:scale-110"
                                                />
                                                <div v-else class="flex h-full items-center justify-center text-gray-600">
                                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                        />
                                                    </svg>
                                                </div>
                                                <!-- Verified Badge -->
                                                <div
                                                    class="absolute -right-1 -top-1 rounded-full bg-gradient-to-r from-green-400 to-emerald-500 p-1.5 shadow-lg shadow-green-500/20"
                                                >
                                                    <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover/item:opacity-100"
                                                ></div>
                                            </div>
                                            <div class="ml-4 min-w-0 flex-1">
                                                <h4
                                                    class="truncate text-sm font-semibold text-white transition-colors duration-300 group-hover/item:text-blue-400"
                                                >
                                                    {{ course.title }}
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-400">
                                                    {{ course.category?.parent?.name || course.category?.name }} • {{ course.duration }}
                                                </p>
                                                <div class="mt-1 flex items-center space-x-2">
                                                    <span
                                                        class="inline-flex items-center rounded-full border border-green-500/20 bg-green-500/20 px-2 py-0.5 text-xs font-medium text-green-300"
                                                    >
                                                        <span class="mr-1 h-1.5 w-1.5 rounded-full bg-green-400"></span>
                                                        Verified
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex flex-shrink-0 items-center space-x-4">
                                            <div class="text-right">
                                                <span class="text-sm font-bold text-blue-400">${{ course.fee }}</span>
                                                <div class="mt-1 h-1.5 w-24 overflow-hidden rounded-full bg-white/10">
                                                    <div
                                                        class="h-full rounded-full bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 transition-all duration-1000"
                                                        :style="{ width: getProgressPercentage(index) + '%' }"
                                                    ></div>
                                                </div>
                                                <span class="text-xs text-gray-500">{{ getProgressPercentage(index) }}% Complete</span>
                                            </div>
                                            <Link
                                                :href="route('courses.public.show', course.id)"
                                                class="group/btn relative whitespace-nowrap rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-5 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                                            >
                                                <span class="relative z-10">View Course</span>
                                                <span
                                                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 opacity-0 transition-opacity duration-300 group-hover/btn:opacity-100"
                                                ></span>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else class="py-16 text-center">
                                <div
                                    class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20"
                                >
                                    <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">No verified courses yet</h3>
                                <p class="mt-2 text-gray-400">Start your learning journey by enrolling in a course.</p>
                                <div class="mt-8">
                                    <Link
                                        :href="route('courses.public.index')"
                                        class="group relative inline-flex items-center overflow-hidden rounded-xl px-8 py-3.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105"
                                    >
                                        <span
                                            class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                        ></span>
                                        <span
                                            class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"
                                        ></span>
                                        <span class="relative z-10 flex items-center">
                                            Browse Courses
                                            <svg
                                                class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import TypingText from '@/Components/TypingText.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    enrolledCourses: Array<{
        id: number;
        title: string;
        description: string;
        duration: string;
        fee: number;
        image?: string;
        category: {
            id: number;
            name: string;
            parent?: {
                id: number;
                name: string;
            };
        };
    }>;
    totalCourses: number;
}>();

// Calculate progress percentage based on index for demo
const getProgressPercentage = (index: number) => {
    const progressData = [75, 45, 90, 30, 60, 85, 20, 50];
    return progressData[index % progressData.length];
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

@keyframes pulse-slow {
    0%,
    100% {
        opacity: 0.3;
        transform: scale(1);
    }
    50% {
        opacity: 0.6;
        transform: scale(1.1);
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

.animate-pulse-slow {
    animation: pulse-slow 3s ease-in-out infinite;
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

.animation-delay-400 {
    animation-delay: 0.4s;
}

.animation-delay-1000 {
    animation-delay: 1s;
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
</style>
