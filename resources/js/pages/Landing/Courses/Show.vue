<!-- resources/js/pages/Landing/Courses/Show.vue -->
<template>
    <AuthenticatedLayout>
        <div class="py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Back Button -->
                <Link
                    :href="route('courses.public.index')"
                    class="inline-flex items-center text-sm text-gray-600 hover:text-indigo-600 transition-colors"
                >
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Courses
                </Link>

                <div class="mt-6 grid gap-8 lg:grid-cols-3">
                    <!-- Course Details -->
                    <div class="lg:col-span-2">
                        <div class="rounded-xl bg-white shadow-lg overflow-hidden">
                            <div class="relative h-64 bg-gray-100">
                                <img
                                    v-if="course.image"
                                    :src="`/storage/${course.image}`"
                                    :alt="course.title"
                                    class="h-full w-full object-cover"
                                />
                                <div v-else class="flex h-full items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-500">
                                    <span class="text-6xl font-bold text-white">{{ course.title.charAt(0) }}</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <h1 class="text-2xl font-bold text-gray-900">{{ course.title }}</h1>
                                    <span class="text-3xl font-bold text-indigo-600">${{ course.fee }}</span>
                                </div>
                                <div class="mt-2 flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">{{ course.duration }}</span>
                                    <span class="text-sm text-gray-500">•</span>
                                    <span class="text-sm text-gray-500">{{ course.category }}</span>
                                    <span class="text-sm text-gray-500">•</span>
                                    <span class="text-sm text-gray-500">{{ course.enrollments_count || 0 }} students</span>
                                </div>
                                <p class="mt-4 text-gray-600 leading-relaxed">{{ course.description }}</p>

                                <!-- Enroll Button -->
                                <div class="mt-6">
                                    <template v-if="$page.props.auth.user">
                                        <button
                                            v-if="!isEnrolled"
                                            @click="handleEnroll"
                                            :disabled="isEnrolling"
                                            class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                        >
                                            <span v-if="!isEnrolling">Enroll Now</span>
                                            <span v-else>
                                                <svg class="inline h-4 w-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Enrolling...
                                            </span>
                                        </button>
                                        <div v-else class="rounded-lg bg-green-50 p-4 text-center">
                                            <svg class="mx-auto h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="mt-2 text-sm font-medium text-green-800">You are enrolled in this course!</p>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <Link
                                            :href="route('login')"
                                            class="block w-full rounded-lg bg-indigo-600 px-4 py-3 text-center text-base font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors"
                                        >
                                            Login to Enroll
                                        </Link>
                                        <p class="mt-2 text-center text-sm text-gray-500">
                                            Don't have an account?
                                            <Link :href="route('register')" class="text-indigo-600 hover:underline">
                                                Register here
                                            </Link>
                                        </p>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Videos -->
                    <div>
                        <div class="rounded-xl bg-white shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900">Course Content</h3>
                            <div v-if="course.videos && course.videos.length > 0" class="mt-4 space-y-2">
                                <div
                                    v-for="video in course.videos"
                                    :key="video.id"
                                    class="flex items-center justify-between rounded-lg border border-gray-200 p-3 hover:bg-gray-50 transition-colors"
                                >
                                    <div class="flex items-center space-x-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm text-gray-700">{{ video.title }}</span>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ video.duration || 'N/A' }}</span>
                                </div>
                            </div>
                            <div v-else class="mt-4 text-center py-8">
                                <p class="text-gray-500">No videos available yet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    course: {
        type: Object,
        required: true,
    },
    isEnrolled: {
        type: Boolean,
        default: false,
    },
});

const page = usePage();
const isEnrolling = ref(false);

const handleEnroll = () => {
    if (!page.props.auth.user) {
        router.get(route('login'));
        return;
    }

    if (confirm('Are you sure you want to enroll in this course?')) {
        isEnrolling.value = true;
        router.post(
            route('enrollments.enroll', props.course.id),
            {},
            {
                preserveScroll: true,
                onSuccess: () => {
                    isEnrolling.value = false;
                },
                onError: () => {
                    isEnrolling.value = false;
                },
            }
        );
    }
};
</script>
