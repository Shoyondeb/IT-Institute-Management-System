<!-- resources/js/Pages/Student/MyCourses.vue -->
<template>
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-900">My Enrolled Courses</h1>
                    <p class="mt-1 text-sm text-gray-600">View all courses you're enrolled in</p>
                </div>

                <!-- Courses List -->
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Enrolled Courses ({{ courses.data.length }})</h3>
                    </div>

                    <div class="p-6">
                        <div v-if="courses.data.length > 0" class="space-y-4">
                            <div
                                v-for="course in courses.data"
                                :key="course.id"
                                class="flex flex-col justify-between rounded-lg bg-gray-50 p-4 transition-colors hover:bg-gray-100 md:flex-row md:items-center"
                            >
                                <div class="flex items-start space-x-4">
                                    <!-- Course Image -->
                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md bg-gray-200">
                                        <img
                                            v-if="course.image"
                                            :src="`/storage/${course.image}`"
                                            :alt="course.title"
                                            class="h-full w-full object-cover"
                                        />
                                        <div v-else class="flex h-full w-full items-center justify-center bg-gray-100">
                                            <span class="text-xs text-gray-400">No Image</span>
                                        </div>
                                    </div>

                                    <!-- Course Info -->
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900">{{ course.title }}</h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ course.description.substring(0, 100) }}...</p>
                                        <div class="mt-2 flex flex-wrap items-center space-x-4">
                                            <span class="inline-flex items-center text-xs text-gray-600">
                                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                {{ course.duration }}
                                            </span>
                                            <span class="inline-flex items-center text-xs text-gray-600">
                                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                                class="inline-flex items-center rounded-full bg-indigo-100 px-2 py-1 text-xs font-medium text-indigo-800"
                                            >
                                                {{ course.category?.parent?.name || course.category?.name }}
                                            </span>
                                            <!-- Enrollment Status Badge -->
                                            <span
                                                :class="{
                                                    'inline-flex items-center rounded-full px-2 py-1 text-xs font-medium': true,
                                                    'bg-yellow-100 text-yellow-800': course.pivot?.status === 'pending',
                                                    'bg-green-100 text-green-800': course.pivot?.status === 'verified',
                                                    'bg-red-100 text-red-800': course.pivot?.status === 'rejected',
                                                }"
                                            >
                                                {{ course.pivot?.status || 'pending' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="mt-4 flex space-x-3 md:mt-0">
                                    <Link
                                        :href="route('courses.show', course.id)"
                                        class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        View Course
                                    </Link>
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

                    <!-- Pagination -->
                    <div v-if="courses.data.length > 0" class="border-t border-gray-200 bg-gray-50 px-4 py-3 sm:px-6">
                        <Pagination :links="courses.links" />
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

defineProps<{
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
</script>
