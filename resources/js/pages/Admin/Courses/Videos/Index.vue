<!-- resources/js/Pages/Admin/Courses/Videos/Index.vue -->
<template>
    <AdminLayout :page-title="`Manage Videos - ${course.title}`" :page-description="`Upload and manage videos for ${course.title}`">
        <!-- Gradient Header -->
        <div class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 p-8">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative">
                <!-- Breadcrumb -->
                <nav class="mb-6 flex items-center space-x-2">
                    <Link :href="route('admin.courses.index')" class="text-blue-200 transition-colors hover:text-white">Courses</Link>
                    <span class="text-blue-300">/</span>
                    <Link :href="route('admin.courses.edit', course.id)" class="text-blue-200 transition-colors hover:text-white">
                        {{ truncateText(course.title, 30) }}
                    </Link>
                    <span class="text-blue-300">/</span>
                    <span class="font-medium text-white">Videos</span>
                </nav>

                <!-- Course Header -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="mb-6 lg:mb-0">
                        <h1 class="mb-2 text-3xl font-bold text-white">Video Management</h1>
                        <p class="max-w-2xl text-blue-100">{{ course.description }}</p>

                        <!-- Course Stats -->
                        <div class="mt-6 flex flex-wrap gap-3">
                            <div class="rounded-full bg-white/20 px-4 py-2 backdrop-blur-sm">
                                <span class="text-sm font-medium text-white">{{ course.category.name }}</span>
                            </div>
                            <div class="rounded-full bg-white/20 px-4 py-2 backdrop-blur-sm">
                                <span class="text-sm font-medium text-white">${{ course.fee }}</span>
                            </div>
                            <div class="rounded-full bg-white/20 px-4 py-2 backdrop-blur-sm">
                                <span class="text-sm font-medium text-white">{{ course.videos.length }} videos</span>
                            </div>
                            <div class="rounded-full bg-white/20 px-4 py-2 backdrop-blur-sm">
                                <span class="text-sm font-medium text-white">{{ course.duration }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <Link
                            :href="route('admin.courses.index')"
                            class="group flex items-center rounded-xl bg-white/10 px-5 py-3 text-white backdrop-blur-sm transition-all hover:bg-white/20 hover:shadow-lg"
                        >
                            <svg
                                class="mr-2 h-5 w-5 transition-transform group-hover:-translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Courses
                        </Link>
                        <Link
                            :href="route('admin.courses.edit', course.id)"
                            class="rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 px-5 py-3 font-medium text-white shadow-lg transition-all hover:from-amber-600 hover:to-orange-600 hover:shadow-xl"
                        >
                            Edit Course
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Left Column: Videos Section -->
            <div class="lg:col-span-2">
                <!-- Video Upload Card -->
                <div class="overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 shadow-2xl">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-emerald-500 to-teal-500 px-8 py-6">
                        <div class="flex items-center">
                            <div class="mr-4 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                    />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white">Upload New Video</h2>
                                <p class="mt-1 text-sm text-emerald-100">Add a new video lesson to this course</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <CourseVideoUpload :course-id="course.id" @video-uploaded="handleVideoUploaded" />
                    </div>
                </div>

                <!-- Existing Videos Card -->
                <div class="mt-8 overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 shadow-2xl">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-indigo-500 to-purple-500 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="mr-4 rounded-lg bg-white/20 p-2">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Course Videos</h2>
                                    <p class="mt-1 text-sm text-indigo-100">{{ course.videos.length }} video(s) uploaded</p>
                                </div>
                            </div>
                            <div v-if="course.videos.length > 0" class="text-sm font-medium text-white">⏱️ {{ calculateTotalDuration() }}</div>
                        </div>
                    </div>
                    <div class="p-8">
                        <CourseVideoList
                            :course-id="course.id"
                            :initial-videos="videos"
                            @video-deleted="handleVideoDeleted"
                            @video-edited="handleVideoEdited"
                            ref="videoListRef"
                        />
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="space-y-6">
                <!-- Course Info Card -->
                <div class="overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 shadow-2xl">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-6">
                        <div class="flex items-center">
                            <div class="mr-4 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Course Information</h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- Course Image -->
                        <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 shadow-lg">
                            <div class="relative h-48 w-full">
                                <img
                                    v-if="course.image"
                                    :src="`/storage/${course.image}`"
                                    :alt="course.title"
                                    class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                                />
                                <div v-else class="flex h-full w-full items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        />
                                    </svg>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">{{ truncateText(course.title, 40) }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Course Details -->
                        <div class="space-y-4">
                            <div class="rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                            />
                                        </svg>
                                        <span class="text-sm text-gray-600">Category</span>
                                    </div>
                                    <span class="font-semibold text-gray-900">{{ course.category.name }}</span>
                                </div>
                            </div>

                            <div class="rounded-lg bg-gradient-to-r from-green-50 to-emerald-50 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                        <span class="text-sm text-gray-600">Duration</span>
                                    </div>
                                    <span class="font-semibold text-gray-900">{{ course.duration }}</span>
                                </div>
                            </div>

                            <div class="rounded-lg bg-gradient-to-r from-amber-50 to-yellow-50 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                        <span class="text-sm text-gray-600">Course Fee</span>
                                    </div>
                                    <span class="text-xl font-bold text-gray-900">${{ course.fee }}</span>
                                </div>
                            </div>

                            <div class="rounded-lg bg-gradient-to-r from-purple-50 to-violet-50 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-5 w-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                        <span class="text-sm text-gray-600">Total Videos</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-xl font-bold text-gray-900">{{ course.videos.length }}</span>
                                        <div v-if="course.videos.length > 0" class="ml-2 h-2 w-2 rounded-full bg-green-500"></div>
                                        <div v-else class="ml-2 h-2 w-2 rounded-full bg-gray-400"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- View Course Button -->
                        <div class="mt-8">
                            <Link
                                :href="route('courses.show', course.id)"
                                target="_blank"
                                class="group flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-3 font-medium text-white shadow-lg transition-all hover:from-blue-600 hover:to-indigo-600 hover:shadow-xl"
                            >
                                <svg
                                    class="mr-2 h-5 w-5 transition-transform group-hover:scale-110"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                                Preview Course
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 shadow-2xl">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-teal-500 to-emerald-500 px-6 py-6">
                        <div class="flex items-center">
                            <div class="mr-4 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Video Stats</h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="rounded-lg bg-gradient-to-r from-gray-50 to-white p-4">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-900">{{ course.videos.length }}</div>
                                    <div class="text-sm text-gray-600">Total Videos</div>
                                </div>
                            </div>

                            <div v-if="course.videos.length > 0" class="rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 p-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">{{ calculateTotalDuration() }}</div>
                                    <div class="text-sm text-gray-600">Total Duration</div>
                                </div>
                            </div>

                            <div class="rounded-lg bg-gradient-to-r from-green-50 to-emerald-50 p-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">{{ course.videos.filter((v) => v.is_active).length }}</div>
                                    <div class="text-sm text-gray-600">Active Videos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 shadow-2xl">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-orange-500 to-red-500 px-6 py-6">
                        <div class="flex items-center">
                            <div class="mr-4 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Quick Actions</h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <Link
                                :href="route('admin.courses.edit', course.id)"
                                class="group flex items-center justify-between rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 p-4 transition-all hover:from-blue-100 hover:to-indigo-100 hover:shadow-md"
                            >
                                <div class="flex items-center">
                                    <div class="mr-3 rounded-lg bg-blue-100 p-2">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">Edit Course Details</h3>
                                        <p class="text-sm text-gray-600">Update course information</p>
                                    </div>
                                </div>
                                <svg
                                    class="h-5 w-5 text-gray-400 transition-transform group-hover:translate-x-1"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>

                            <Link
                                :href="route('admin.courses.index')"
                                class="group flex items-center justify-between rounded-xl bg-gradient-to-r from-gray-50 to-white p-4 transition-all hover:from-gray-100 hover:to-white hover:shadow-md"
                            >
                                <div class="flex items-center">
                                    <div class="mr-3 rounded-lg bg-gray-100 p-2">
                                        <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">All Courses</h3>
                                        <p class="text-sm text-gray-600">Browse all courses</p>
                                    </div>
                                </div>
                                <svg
                                    class="h-5 w-5 text-gray-400 transition-transform group-hover:translate-x-1"
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
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import CourseVideoList from '@/Components/CourseVideoList.vue';
import CourseVideoUpload from '@/Components/CourseVideoUpload.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    course: Object,
    videos: Array,
    category: Object,
});

const videoListRef = ref();

const handleVideoUploaded = (video) => {
    if (videoListRef.value && videoListRef.value.fetchVideos) {
        videoListRef.value.fetchVideos();
    }
};

const handleVideoDeleted = (videoId) => {
    console.log('Video deleted:', videoId);
};

const handleVideoEdited = (video) => {
    console.log('Video edited:', video);
};

const truncateText = (text, length) => {
    if (!text) return '';
    return text.length > length ? text.substring(0, length) + '...' : text;
};

const calculateTotalDuration = () => {
    const totalSeconds = props.course.videos.reduce((total, video) => {
        if (!video.duration) return total;
        const parts = video.duration.split(':');
        if (parts.length === 3) {
            return total + parseInt(parts[0]) * 3600 + parseInt(parts[1]) * 60 + parseInt(parts[2]);
        }
        return total;
    }, 0);

    const hours = Math.floor(totalSeconds / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const seconds = totalSeconds % 60;

    if (hours > 0) {
        return `${hours}h ${minutes}m`;
    } else if (minutes > 0) {
        return `${minutes}m ${seconds}s`;
    } else {
        return `${seconds}s`;
    }
};
</script>
