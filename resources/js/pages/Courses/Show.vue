<template>
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="mb-6 flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <Link :href="route('courses.index')" class="text-gray-400 hover:text-gray-500"> Courses </Link>
                        </li>
                        <li>
                            <span class="text-gray-400">/</span>
                        </li>
                        <li>
                            <Link :href="route('courses.index', { category: course.category.parent_id })" class="text-gray-400 hover:text-gray-500">
                                {{ course.category.parent.name }}
                            </Link>
                        </li>
                        <li>
                            <span class="text-gray-400">/</span>
                        </li>
                        <li class="font-medium text-gray-900">{{ course.title }}</li>
                    </ol>
                </nav>

                <!-- Course Details -->
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="md:flex">
                        <!-- Course Image -->
                        <div class="md:w-1/3">
                            <div class="h-64 bg-gray-200 md:h-full">
                                <img v-if="course.image" :src="`/storage/${course.image}`" :alt="course.title" class="h-full w-full object-cover" />
                                <div v-else class="flex h-full w-full items-center justify-center bg-gray-100">
                                    <span class="text-gray-400">No Image Available</span>
                                </div>
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="p-8 md:w-2/3">
                            <div class="mb-4 flex items-start justify-between">
                                <div>
                                    <span class="mb-2 inline-block rounded-full bg-indigo-100 px-3 py-1 text-sm font-semibold text-indigo-800">
                                        {{ course.category.parent.name }} / {{ course.category.name }}
                                    </span>
                                    <h1 class="text-2xl font-bold text-gray-900">{{ course.title }}</h1>
                                </div>
                                <div class="text-2xl font-bold text-indigo-600">৳{{ course.fee }}</div>
                            </div>

                            <div class="mb-6">
                                <h3 class="mb-2 text-lg font-semibold text-gray-900">Course Description</h3>
                                <p class="whitespace-pre-line text-gray-700">{{ course.description }}</p>
                            </div>

                            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="flex items-center">
                                    <svg class="mr-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    <span class="text-gray-700">Duration: {{ course.duration }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="mr-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    <span class="text-gray-700">Category: {{ course.category.name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="mr-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    <span class="text-gray-700">Videos: {{ course.videos_count || 0 }}</span>
                                </div>
                            </div>

                            <!-- Enrollment Button -->
                            <div class="border-t pt-6">
                                <div v-if="$page.props.auth.user">
                                    <div v-if="!isEnrolled">
                                        <button
                                            @click="showPaymentModal = true"
                                            class="w-full rounded-lg bg-indigo-600 px-6 py-3 font-semibold text-white transition-colors hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 md:w-auto"
                                        >
                                            Enroll Now
                                        </button>
                                    </div>
                                    <div v-else>
                                        <div v-if="enrollmentStatus === 'pending'" class="text-center">
                                            <span class="inline-flex items-center rounded-lg bg-yellow-100 px-4 py-2 font-semibold text-yellow-800">
                                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                Payment Verification Pending
                                            </span>
                                            <p class="mt-2 text-sm text-gray-600">Your enrollment is awaiting admin verification</p>
                                        </div>
                                        <div v-else-if="enrollmentStatus === 'verified'" class="text-center">
                                            <span class="inline-flex items-center rounded-lg bg-green-100 px-4 py-2 font-semibold text-green-800">
                                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                Successfully Enrolled
                                            </span>
                                            <p class="mt-2 text-sm text-gray-600">You can now access the course content</p>
                                        </div>
                                        <div v-else-if="enrollmentStatus === 'rejected'" class="text-center">
                                            <span class="inline-flex items-center rounded-lg bg-red-100 px-4 py-2 font-semibold text-red-800">
                                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                Enrollment Rejected
                                            </span>
                                            <p class="mt-2 text-sm text-gray-600">Please contact admin for assistance</p>
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <Link
                                        :href="route('login')"
                                        class="inline-block w-full rounded-lg bg-indigo-600 px-6 py-3 text-center font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 md:w-auto"
                                    >
                                        Login to Enroll
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Section for Enrolled Users -->
                <div v-if="isEnrolled && enrollmentStatus === 'verified'" class="mt-8 overflow-hidden rounded-lg bg-white shadow">
                    <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Course Videos</h2>
                        <p class="text-sm text-gray-600">Watch the course videos in order</p>
                    </div>

                    <div class="p-6">
                        <div v-if="videos && videos.length > 0">
                            <!-- Video Player -->
                            <div v-if="selectedVideo" class="mb-6 overflow-hidden rounded-lg bg-gray-900">
                                <video
                                    v-if="selectedVideo.video_path"
                                    :key="selectedVideo.id"
                                    controls
                                    :autoplay="true"
                                    class="h-auto max-h-[500px] w-full"
                                    @loadedmetadata="onVideoLoaded"
                                >
                                    <source :src="getVideoUrl(selectedVideo.video_path)" type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>
                                <div v-else class="flex aspect-video items-center justify-center bg-black text-white">Video not available</div>
                            </div>

                            <!-- Current Video Info -->
                            <div v-if="selectedVideo" class="mb-6 rounded-lg bg-indigo-50 p-4">
                                <h3 class="text-lg font-semibold text-indigo-900">{{ selectedVideo.title }}</h3>
                                <div class="mt-2 flex items-center space-x-4 text-sm text-indigo-700">
                                    <span>Duration: {{ selectedVideo.duration || 'N/A' }}</span>
                                    <span>•</span>
                                    <span>Order: {{ selectedVideo.order }}</span>
                                </div>
                            </div>

                            <!-- Video List -->
                            <div class="space-y-3">
                                <div
                                    v-for="video in sortedVideos"
                                    :key="video.id"
                                    @click="selectVideo(video)"
                                    :class="[
                                        'cursor-pointer rounded-lg border p-4 transition-all hover:shadow-md',
                                        selectedVideo?.id === video.id ? 'border-indigo-500 bg-indigo-50' : 'border-gray-200 hover:border-indigo-300',
                                    ]"
                                >
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-600"
                                                >
                                                    {{ video.order }}
                                                </div>
                                                <h4 class="font-medium text-gray-900">{{ video.title }}</h4>
                                            </div>
                                            <p class="ml-11 mt-2 text-sm text-gray-600">Duration: {{ video.duration || 'N/A' }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span
                                                v-if="selectedVideo?.id === video.id"
                                                class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-medium text-indigo-800"
                                            >
                                                Playing
                                            </span>
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else class="py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                                />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">No videos available</h3>
                            <p class="mt-2 text-sm text-gray-600">The course videos are not available yet.</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Modal -->
                <PaymentModal :open="showPaymentModal" :course="course" @close="showPaymentModal = false" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import PaymentModal from '@/Components/PaymentModal.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { computed, onMounted, ref } from 'vue';

const props = defineProps<{
    course: {
        id: number;
        title: string;
        description: string;
        image?: string;
        fee: number;
        duration: string;
        category: {
            id: number;
            name: string;
            parent: {
                id: number;
                name: string;
            };
        };
        videos_count: number;
    };
    isEnrolled: boolean;
    enrollmentStatus?: string;
    videos: Array<{
        id: number;
        title: string;
        video_path: string;
        duration?: string;
        order: number;
    }>;
}>();

const showPaymentModal = ref(false);
const selectedVideo = ref<(typeof props.videos)[0] | null>(null);

//getting video
const getVideoUrl = (videoPath: string) => {
    if (!videoPath) return '';

    if (videoPath.startsWith('http://') || videoPath.startsWith('https://') || videoPath.startsWith('/storage/')) {
        return videoPath;
    }

    return `/storage/${videoPath}`;
};

// Sort videos by order
const sortedVideos = computed(() => {
    if (!props.videos) return [];
    return [...props.videos].sort((a, b) => a.order - b.order);
});

const onVideoLoaded = (event: Event) => {
    console.log('Video loaded successfully');
    const video = event.target as HTMLVideoElement;
    video.play().catch((error) => {
        console.log('Autoplay prevented:', error);
        // Show play button if autoplay is blocked
        video.controls = true;
    });
};

// Select first video by default when page loads
onMounted(() => {
    if (props.isEnrolled && props.enrollmentStatus === 'verified' && props.videos && props.videos.length > 0) {
        const sorted = sortedVideos.value;
        selectedVideo.value = sorted[0];
    }
});

const selectVideo = (video: (typeof props.videos)[0]) => {
    selectedVideo.value = video;
};
</script>
