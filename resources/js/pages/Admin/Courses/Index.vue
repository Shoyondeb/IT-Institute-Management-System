<!-- resources/js/Pages/Admin/Courses/Index.vue -->
<template>
    <AdminLayout>
        <!-- Header with button -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manage Courses</h1>
                <p class="mt-1 text-sm text-gray-600">Total {{ courses.total }} courses in the system</p>
            </div>
            <Link
                :href="route('admin.courses.create')"
                class="group inline-flex items-center rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg transition-all duration-200 hover:from-indigo-700 hover:to-purple-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                <svg class="mr-2 h-5 w-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Course
            </Link>
        </div>

        <!-- Courses Table Container -->
        <div class="rounded-2xl bg-white shadow-2xl">
            <!-- Responsive wrapper -->
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200/50">
                        <thead class="bg-gradient-to-r from-gray-50 to-white">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-6">
                                    Course
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-4">
                                    Category
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-4">
                                    Duration
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-4">
                                    Fee
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-4">
                                    Videos
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 lg:px-4">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <tr v-for="course in courses.data" :key="course.id" class="hover:bg-gray-50/50">
                                <!-- Course Cell -->
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 sm:h-12 sm:w-12">
                                            <img
                                                v-if="course.image"
                                                class="h-full w-full object-cover"
                                                :src="`/storage/${course.image}`"
                                                :alt="course.title"
                                            />
                                            <div
                                                v-else
                                                class="flex h-full w-full items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50"
                                            >
                                                <svg
                                                    class="h-5 w-5 text-blue-400 sm:h-6 sm:w-6"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                    />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3 min-w-0 flex-1">
                                            <div class="truncate font-medium text-gray-900 hover:text-indigo-600">{{ course.title }}</div>
                                            <div class="truncate text-xs text-gray-600 sm:text-sm">
                                                {{
                                                    course.description && course.description.length > 30
                                                        ? course.description.substring(0, 27) + '...'
                                                        : course.description
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Category Cell -->
                                <td class="px-3 py-4 lg:px-4">
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                        {{ course.category.name }}
                                    </span>
                                </td>

                                <!-- Duration Cell -->
                                <td class="px-3 py-4 text-sm text-gray-700 lg:px-4">
                                    <div class="flex items-center">
                                        <svg class="mr-1.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                        {{ course.duration }}
                                    </div>
                                </td>

                                <!-- Fee Cell -->
                                <td class="px-3 py-4 lg:px-4">
                                    <div class="text-sm font-bold text-gray-900">${{ course.fee }}</div>
                                    <div v-if="course.videos_count" class="mt-0.5 text-xs text-gray-600">{{ course.videos_count }} video(s)</div>
                                </td>

                                <!-- Videos Cell -->
                                <td class="px-3 py-4 lg:px-4">
                                    <div class="space-y-1">
                                        <div v-if="course.videos_count" class="text-xs text-green-600">✓ {{ course.videos_count }} videos</div>
                                        <div v-else class="text-xs text-gray-500">No videos yet</div>
                                        <Link
                                            :href="route('admin.courses.videos.page', course.id)"
                                            class="inline-flex items-center text-xs text-blue-600 hover:text-blue-800 sm:text-sm"
                                        >
                                            <svg class="mr-1 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                            Manage Videos
                                        </Link>
                                    </div>
                                </td>

                                <!-- Actions Cell -->
                                <td class="px-3 py-4 lg:px-4">
                                    <div class="flex flex-col space-y-2 sm:flex-row sm:space-x-3 sm:space-y-0">
                                        <Link
                                            :href="route('admin.courses.edit', course.id)"
                                            class="group inline-flex items-center text-xs text-indigo-600 hover:text-indigo-900 sm:text-sm"
                                            title="Edit Course"
                                        >
                                            <svg
                                                class="mr-1 h-3 w-3 transition-transform group-hover:scale-110 sm:h-4 sm:w-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                />
                                            </svg>
                                            Edit
                                        </Link>
                                        <button
                                            @click="deleteCourse(course)"
                                            class="group inline-flex items-center text-xs text-red-600 hover:text-red-900 sm:text-sm"
                                            title="Delete Course"
                                        >
                                            <svg
                                                class="mr-1 h-3 w-3 transition-transform group-hover:scale-110 sm:h-4 sm:w-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State -->
            <div v-if="courses.data.length === 0" class="py-12 text-center">
                <div class="mx-auto max-w-sm">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No courses found</h3>
                    <p class="mt-2 text-sm text-gray-600">Get started by creating your first course.</p>
                    <div class="mt-6">
                        <Link
                            :href="route('admin.courses.create')"
                            class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700"
                        >
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Course
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div v-if="courses.data.length > 0" class="border-t border-gray-200 bg-gradient-to-r from-gray-50 to-white px-4 py-3 sm:px-6">
                <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
                    <div class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ courses.from || 0 }}</span>
                        to
                        <span class="font-medium">{{ courses.to || 0 }}</span>
                        of
                        <span class="font-medium">{{ courses.total || 0 }}</span>
                        results
                    </div>
                    <Pagination :links="courses.links" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    courses: Object,
});

const deleteCourse = (course) => {
    if (confirm('Are you sure you want to delete this course?')) {
        router.delete(route('admin.courses.destroy', course.id));
    }
};
</script>
