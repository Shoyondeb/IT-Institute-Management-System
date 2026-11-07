<!-- resources/js/Pages/Admin/Dashboard.vue -->
<template>
    <AdminLayout>
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
                <div class="py-6">
                    <!-- Page Header -->
                    <div class="animate-fade-in mb-8">
                        <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                            <div>
                                <div
                                    class="mb-2 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                                >
                                    <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                        />
                                    </svg>
                                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                        Admin Panel
                                    </span>
                                </div>
                                <h1 class="text-2xl font-semibold text-white">Admin Dashboard</h1>
                            </div>
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center rounded-full border border-green-500/20 bg-green-500/10 px-4 py-2 text-sm text-green-300 backdrop-blur-sm"
                                >
                                    <span class="mr-1.5 inline-block h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                                    System Online
                                </span>
                                <span
                                    class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white backdrop-blur-sm"
                                >
                                    {{
                                        new Date().toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' })
                                    }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div class="animate-fade-in group" style="animation-delay: 0.1s">
                            <div
                                class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <div
                                    class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                                ></div>
                                <div class="relative flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-xl bg-blue-500/20 p-3 transition-transform duration-500 group-hover:scale-110">
                                            <svg class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 0c-.828 0-1.5.672-1.5 1.5v4.5"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="truncate text-sm font-medium text-gray-400">Total Students</dt>
                                            <dd class="text-2xl font-bold text-white">{{ stats.totalStudents }}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="relative mt-3 h-1 overflow-hidden rounded-full bg-white/5">
                                    <div
                                        class="h-full rounded-full bg-gradient-to-r from-blue-400 to-blue-600 transition-all duration-1000"
                                        :style="{ width: Math.min((stats.totalStudents / 1000) * 100, 100) + '%' }"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div class="animate-fade-in group" style="animation-delay: 0.2s">
                            <div
                                class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <div
                                    class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                                ></div>
                                <div class="relative flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-xl bg-purple-500/20 p-3 transition-transform duration-500 group-hover:scale-110">
                                            <svg class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="truncate text-sm font-medium text-gray-400">Total Courses</dt>
                                            <dd class="text-2xl font-bold text-white">{{ stats.totalCourses }}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="relative mt-3 h-1 overflow-hidden rounded-full bg-white/5">
                                    <div
                                        class="h-full rounded-full bg-gradient-to-r from-purple-400 to-purple-600 transition-all duration-1000"
                                        :style="{ width: Math.min((stats.totalCourses / 100) * 100, 100) + '%' }"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div class="animate-fade-in group" style="animation-delay: 0.3s">
                            <div
                                class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <div
                                    class="absolute inset-0 rounded-3xl bg-gradient-to-r from-emerald-500/0 via-green-500/0 to-emerald-500/0 opacity-0 transition-opacity duration-500 group-hover:opacity-10"
                                ></div>
                                <div class="relative flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-xl bg-emerald-500/20 p-3 transition-transform duration-500 group-hover:scale-110">
                                            <svg class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="truncate text-sm font-medium text-gray-400">Total Enrollments</dt>
                                            <dd class="text-2xl font-bold text-white">{{ stats.totalEnrollments }}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="relative mt-3 h-1 overflow-hidden rounded-full bg-white/5">
                                    <div
                                        class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-all duration-1000"
                                        :style="{ width: Math.min((stats.totalEnrollments / 500) * 100, 100) + '%' }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Enrollments -->
                    <div
                        class="animate-fade-in rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        style="animation-delay: 0.4s"
                    >
                        <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                            <div>
                                <h3 class="text-lg font-medium text-white">Recent Enrollments</h3>
                                <p class="text-sm text-gray-400">Latest student enrollments in your courses</p>
                            </div>
                            <Link
                                :href="route('admin.enrollments.index')"
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

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-white/10">
                                <thead class="bg-white/5">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Student</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Course</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Enrolled At</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr
                                        v-for="enrollment in stats.recentEnrollments"
                                        :key="enrollment.id"
                                        class="transition-all duration-300 hover:bg-white/5"
                                    >
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/30 to-purple-500/30"
                                                >
                                                    <span class="text-sm font-medium text-white">
                                                        {{ enrollment.user.name.charAt(0).toUpperCase() }}
                                                    </span>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-white">{{ enrollment.user.name }}</div>
                                                    <div class="text-sm text-gray-400">{{ enrollment.user.email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <div class="text-sm text-white">{{ enrollment.course.title }}</div>
                                            <div class="text-xs text-gray-400">{{ enrollment.course.category?.name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-400">
                                            <div class="flex items-center">
                                                <svg class="mr-1.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>
                                                {{
                                                    new Date(enrollment.created_at).toLocaleDateString('en-US', {
                                                        year: 'numeric',
                                                        month: 'short',
                                                        day: 'numeric',
                                                    })
                                                }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="!stats.recentEnrollments || stats.recentEnrollments.length === 0">
                                        <td colspan="3" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="h-12 w-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                    />
                                                </svg>
                                                <p class="mt-2 text-gray-400">No recent enrollments</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
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

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
    opacity: 0;
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
