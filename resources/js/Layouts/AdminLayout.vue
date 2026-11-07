<!-- resources/js/Layouts/AdminLayout.vue -->
<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar for Desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
            <!-- Sidebar component -->
            <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-gradient-to-b from-blue-900 to-purple-900">
                <!-- Logo -->
                <div class="flex h-16 flex-shrink-0 items-center px-6">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                            />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h1 class="ml-3 text-xl font-bold text-white">Admin Panel</h1>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 space-y-1 px-4 py-4">
                    <div class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-blue-300">Main Navigation</div>

                    <!-- Dashboard -->
                    <Link
                        :href="route('admin.dashboard')"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.dashboard') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                            />
                        </svg>
                        Dashboard
                    </Link>

                    <!-- Courses -->
                    <Link
                        :href="route('admin.courses.index')"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.courses.*') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />
                        </svg>
                        Courses
                        <span v-if="pendingEnrollmentsCount > 0" class="ml-auto rounded-full bg-red-500 px-2 py-0.5 text-xs text-white">
                            {{ pendingEnrollmentsCount }}
                        </span>
                    </Link>

                       <!-- Users Link -->
                    <Link
                        :href="route('admin.users.index')"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.users.*') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white'
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Users
                    </Link>


                    <!-- Enrollments -->
                    <Link
                        :href="route('admin.enrollments.index')"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.enrollments.*') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                            />
                        </svg>
                        Enrollments
                        <!-- Notification badge - ALWAYS visible when notificationCount > 0 -->
                        <span
                            v-if="notiCount > 0"
                            class="ml-auto flex items-center space-x-1 rounded-full bg-red-500 px-2.5 py-0.5 text-xs font-bold text-white shadow-lg shadow-red-500/50"
                        >
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-white"></span>
                            </span>
                            <span>{{ notiCount }}</span>
                        </span>
                    </Link>

                    <div class="mt-6 px-3 py-2 text-xs font-semibold uppercase tracking-wider text-blue-300">Quick Access</div>

                    <!-- User Dashboard -->
                    <Link
                        :href="route('dashboard')"
                        class="group flex items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                        Student View
                    </Link>

                    <!-- Profile -->
                    <Link
                        :href="route('profile.edit')"
                        class="group flex items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>
                        Profile Settings
                    </Link>

                    <!-- Logout -->
                    <button
                        @click="logout"
                        class="group flex w-full items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>
                        Sign Out
                    </button>
                </nav>

                <!-- User Info -->
                <div class="border-t border-blue-800 p-4">
                    <div class="flex items-center">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-purple-500 font-semibold text-white"
                        >
                            {{ $page.props.auth.user ? $page.props.auth.user.name.charAt(0).toUpperCase() : '?' }}
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ $page.props.auth.user.name }}</p>
                            <p class="text-xs text-blue-300">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile top navigation -->
        <div class="lg:hidden">
            <div class="bg-gradient-to-r from-blue-900 to-purple-900 px-4 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button @click="mobileSidebarOpen = !mobileSidebarOpen" class="text-white focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="ml-4 text-lg font-bold text-white">Admin Panel</h1>
                    </div>
                    <div class="flex items-center">
                        <Link :href="route('dashboard')" class="rounded-md bg-white/10 px-3 py-1 text-sm text-white hover:bg-white/20">
                            Student View
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile sidebar overlay -->
        <div v-if="mobileSidebarOpen" class="fixed inset-0 z-40 lg:hidden" @click="mobileSidebarOpen = false">
            <div class="fixed inset-0 bg-black bg-opacity-25"></div>
        </div>

        <!-- Mobile sidebar -->
        <div v-if="mobileSidebarOpen" class="fixed inset-y-0 left-0 z-50 w-64 transform lg:hidden">
            <div class="flex h-full flex-col bg-gradient-to-b from-blue-900 to-purple-900 shadow-xl">
                <div class="flex h-16 items-center justify-between px-6">
                    <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                    <button @click="mobileSidebarOpen = false" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile navigation (same as desktop) -->
                <nav class="flex-1 space-y-1 px-4 py-4">
                    <div class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-blue-300">Main Navigation</div>

                    <Link
                        :href="route('admin.dashboard')"
                        @click="mobileSidebarOpen = false"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.dashboard') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                            />
                        </svg>
                        Dashboard
                    </Link>

                    <Link
                        :href="route('admin.courses.index')"
                        @click="mobileSidebarOpen = false"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.courses.*') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />
                        </svg>
                        Courses
                    </Link>

                    <Link
                        :href="route('admin.enrollments.index')"
                        @click="mobileSidebarOpen = false"
                        :class="[
                            'group flex items-center rounded-lg px-3 py-2 text-sm font-medium transition-colors',
                            route().current('admin.enrollments.*') ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white',
                        ]"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                            />
                        </svg>
                        Enrollments
                    </Link>

                    <div class="mt-6 px-3 py-2 text-xs font-semibold uppercase tracking-wider text-blue-300">Quick Access</div>

                    <Link
                        :href="route('dashboard')"
                        @click="mobileSidebarOpen = false"
                        class="group flex items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                        Student View
                    </Link>

                    <Link
                        :href="route('profile.edit')"
                        @click="mobileSidebarOpen = false"
                        class="group flex items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>
                        Profile Settings
                    </Link>

                    <button
                        @click="logout"
                        class="group flex w-full items-center rounded-lg px-3 py-2 text-sm font-medium text-blue-100 transition-colors hover:bg-blue-800/50 hover:text-white"
                    >
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>
                        Sign Out
                    </button>
                </nav>
            </div>
        </div>

        <!-- Main content area -->
        <div class="lg:pl-64">
            <main class="py-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Page header -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">{{ pageTitle }}</h1>
                                <p class="mt-1 text-sm text-gray-600">{{ pageDescription }}</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <!-- You can add action buttons here -->
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const page = usePage();
const notiCount = computed(() => {
    return page.props.notificationCount || 0;
});

const props = defineProps<{
    pageTitle?: string;
    pageDescription?: string;
    pendingEnrollmentsCount?: number;
    notificationCount?: number;
}>();

const mobileSidebarOpen = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>
