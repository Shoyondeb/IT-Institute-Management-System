<!-- resources/js/Pages/Dashboard.vue -->
<template>
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Welcome, {{ $page.props.auth.user.name }}!</h1>
                    <p class="mt-1 text-sm text-gray-600">Manage your learning journey with us</p>
                </div>
                <!-- Quick Stats -->
                <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-3">
                    <div class="rounded-lg bg-white p-6 shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex h-12 w-12 items-center justify-center rounded-md bg-indigo-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <h3 class="text-lg font-medium text-gray-900">My Courses</h3>
                                <p class="text-sm text-gray-500">View all enrolled courses</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <Link :href="route('my-courses')" class="inline-flex items-center text-indigo-600 hover:text-indigo-900">
                                View all courses
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>

                    <div class="rounded-lg bg-white p-6 shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex h-12 w-12 items-center justify-center rounded-md bg-green-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <h3 class="text-lg font-medium text-gray-900">Browse Courses</h3>
                                <p class="text-sm text-gray-500">Explore new learning opportunities</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <Link :href="route('courses.index')" class="inline-flex items-center text-indigo-600 hover:text-indigo-900">
                                Explore courses
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>

                    <div class="rounded-lg bg-white p-6 shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex h-12 w-12 items-center justify-center rounded-md bg-purple-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <h3 class="text-lg font-medium text-gray-900">Profile</h3>
                                <p class="text-sm text-gray-500">Update your account information</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <Link :href="route('profile.edit')" class="inline-flex items-center text-indigo-600 hover:text-indigo-900">
                                Edit profile
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Recent Enrollments -->
                <div class="rounded-lg bg-white shadow">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Recently Enrolled Courses</h3>
                    </div>
                    <div class="p-6">
                        <div v-if="enrolledCourses.length > 0" class="space-y-4">
                            <div
                                v-for="course in enrolledCourses"
                                :key="course.id"
                                class="flex items-center justify-between rounded-lg bg-gray-50 p-4"
                            >
                                <div class="flex items-center">
                                    <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md bg-gray-200">
                                        <img
                                            v-if="course.image"
                                            :src="`/storage/${course.image}`"
                                            :alt="course.title"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-semibold text-gray-900">{{ course.title }}</h4>
                                        <p class="text-sm text-gray-500">{{ course.category.parent.name }} • {{ course.duration }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm font-medium text-indigo-600">${{ course.fee }}</span>
                                    <Link
                                        :href="route('courses.show', course.id)"
                                        class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        View Course
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div v-else class="py-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">No courses enrolled yet</h3>
                            <p class="mt-1 text-gray-500">Start your learning journey by enrolling in a course.</p>
                            <div class="mt-6">
                                <Link
                                    :href="route('courses.index')"
                                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-indigo-300 transition duration-150 ease-in-out hover:bg-indigo-700 focus:border-indigo-900 focus:outline-none focus:ring active:bg-indigo-900 disabled:opacity-25"
                                >
                                    Browse Courses
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
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
            parent: {
                id: number;
                name: string;
            };
        };
    }>;
}>();
</script>
