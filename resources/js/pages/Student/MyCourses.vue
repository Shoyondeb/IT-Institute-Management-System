<!-- resources/js/Pages/Student/MyCourses.vue -->
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
                <!-- Page Header -->
                <div class="animate-fade-in mb-8">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <div
                                class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                            >
                                <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                    />
                                </svg>
                                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                    My Learning
                                </span>
                            </div>
                            <h1 class="text-3xl font-bold text-white md:text-4xl">
                                My
                                <span
                                    class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                                    >Enrolled Courses</span
                                >
                            </h1>
                            <p class="mt-1 text-gray-400">Track and manage all your enrolled courses</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span
                                class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white backdrop-blur-sm"
                            >
                                <span class="mr-1.5 inline-block h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                                {{ courses.data.length }} Total
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div
                        v-for="(stat, index) in stats"
                        :key="index"
                        class="animate-fade-in group"
                        :style="{ animationDelay: 0.1 + index * 0.05 + 's' }"
                    >
                        <div
                            class="relative rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-xl p-3 transition-transform duration-500 group-hover:scale-110" :class="stat.bgClass">
                                        <component :is="stat.icon" class="h-6 w-6" :class="stat.iconClass" />
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-400">{{ stat.label }}</p>
                                    <p class="text-2xl font-bold text-white">{{ stat.value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Courses List -->
                <div class="animate-fade-in animation-delay-300">
                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="border-b border-white/10 px-6 py-5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">All Courses</h3>
                                <span class="rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-1 text-sm font-medium text-blue-300">
                                    {{ courses.data.length }} Courses
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <div v-if="courses.data.length > 0" class="space-y-4">
                                <div
                                    v-for="course in courses.data"
                                    :key="course.id"
                                    class="group/item relative rounded-2xl border border-white/10 bg-white/5 p-4 transition-all duration-500 hover:scale-[1.02] hover:border-white/20 hover:bg-white/10 hover:shadow-xl"
                                >
                                    <div
                                        class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover/item:opacity-5"
                                    ></div>
                                    <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                        <!-- Course Info -->
                                        <div class="flex flex-1 items-start gap-4">
                                            <!-- Course Image -->
                                            <div
                                                class="relative h-20 w-20 flex-shrink-0 overflow-hidden rounded-xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 shadow-lg"
                                            >
                                                <img
                                                    v-if="course.image"
                                                    :src="`/storage/${course.image}`"
                                                    :alt="course.title"
                                                    class="h-full w-full object-cover transition-transform duration-500 group-hover/item:scale-110"
                                                />
                                                <div v-else class="flex h-full w-full items-center justify-center">
                                                    <svg class="h-8 w-8 text-blue-400/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                        />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover/item:opacity-100"
                                                ></div>
                                            </div>

                                            <!-- Course Details -->
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-base font-semibold text-white transition-colors group-hover/item:text-blue-400">
                                                    {{ course.title }}
                                                </h4>
                                                <p class="mt-1 line-clamp-2 text-sm text-gray-400">
                                                    {{ course.description }}
                                                </p>
                                                <div class="mt-2 flex flex-wrap items-center gap-2">
                                                    <span class="inline-flex items-center text-xs text-gray-400">
                                                        <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            />
                                                        </svg>
                                                        {{ course.duration }}
                                                    </span>
                                                    <span class="inline-flex items-center text-xs text-gray-400">
                                                        <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            />
                                                        </svg>
                                                        ${{ course.fee }}
                                                    </span>
                                                    <span
                                                        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-2.5 py-0.5 text-xs font-medium text-gray-300"
                                                    >
                                                        {{ course.category?.parent?.name || course.category?.name }}
                                                    </span>
                                                    <!-- Status Badge -->
                                                    <span
                                                        :class="{
                                                            'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium': true,
                                                            'border border-yellow-500/20 bg-yellow-500/10 text-yellow-300':
                                                                course.pivot?.status === 'pending',
                                                            'border border-green-500/20 bg-green-500/10 text-green-300':
                                                                course.pivot?.status === 'verified',
                                                            'border border-red-500/20 bg-red-500/10 text-red-300':
                                                                course.pivot?.status === 'rejected',
                                                        }"
                                                    >
                                                        <span
                                                            class="mr-1 h-1.5 w-1.5 rounded-full"
                                                            :class="{
                                                                'bg-yellow-400': course.pivot?.status === 'pending',
                                                                'bg-green-400': course.pivot?.status === 'verified',
                                                                'bg-red-400': course.pivot?.status === 'rejected',
                                                            }"
                                                        ></span>
                                                        {{ course.pivot?.status || 'pending' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action Button -->
                                        <div class="flex-shrink-0">
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
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </span>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Empty State -->
                            <div v-else class="py-16 text-center">
                                <div
                                    class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20"
                                >
                                    <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">No Courses Enrolled Yet</h3>
                                <p class="mt-2 text-gray-400">Start your learning journey by exploring available courses.</p>
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
                                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                            Browse Courses
                                        </span>
                                    </Link>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div v-if="courses.data.length > 0" class="border-t border-white/10 px-6 py-4">
                            <Pagination :links="courses.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps<{
    courses: {
        data: Array<{
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
            pivot?: {
                status: string;
            };
        }>;
        links: Array<{
            url: string | null;
            label: string;
            active: boolean;
        }>;
    };
}>();

// Stats computed
const stats = computed(() => {
    const total = props.courses.data.length;
    const verified = props.courses.data.filter((c) => c.pivot?.status === 'verified').length;
    const pending = props.courses.data.filter((c) => c.pivot?.status === 'pending').length;
    const rejected = props.courses.data.filter((c) => c.pivot?.status === 'rejected').length;

    return [
        {
            label: 'Total Enrolled',
            value: total,
            icon: 'BookIcon',
            bgClass: 'bg-blue-500/20',
            iconClass: 'text-blue-400',
        },
        {
            label: 'In Progress',
            value: verified,
            icon: 'ClockIcon',
            bgClass: 'bg-yellow-500/20',
            iconClass: 'text-yellow-400',
        },
        {
            label: 'Completed',
            value: 0,
            icon: 'CheckIcon',
            bgClass: 'bg-green-500/20',
            iconClass: 'text-green-400',
        },
        {
            label: 'Pending Review',
            value: pending,
            icon: 'PendingIcon',
            bgClass: 'bg-purple-500/20',
            iconClass: 'text-purple-400',
        },
    ];
});
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

/* Line clamp */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
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
