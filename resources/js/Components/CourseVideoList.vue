<template>
    <div class="rounded-lg bg-white p-6 shadow-md">
        <h3 class="mb-4 text-lg font-semibold">Course Videos</h3>

        <div v-if="loading" class="py-8 text-center">
            <div class="inline-block h-8 w-8 animate-spin rounded-full border-b-2 border-blue-600"></div>
        </div>

        <div v-else-if="videos.length === 0" class="py-8 text-center text-gray-500">No videos uploaded yet.</div>

        <div v-else class="space-y-4">
            <div v-for="video in videos" :key="video.id" class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                <div class="mb-3 flex items-start justify-between">
                    <div>
                        <h4 class="font-medium text-gray-900">{{ video.title }}</h4>
                        <p class="mt-1 text-sm text-gray-600">Duration: {{ video.duration || 'N/A' }} | Order: {{ video.order }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button @click="playVideo(video)" class="text-blue-600 hover:text-blue-800">
                            {{ playingVideoId === video.id ? 'Stop' : 'Play' }}
                        </button>
                        <button @click="editVideo(video)" class="text-green-600 hover:text-green-800">Edit</button>
                        <button @click="deleteVideo(video.id)" class="text-red-600 hover:text-red-800">Delete</button>
                    </div>
                </div>

                <!-- Video player (shown when playing) -->
                <div v-if="playingVideoId === video.id" class="mt-3">
                    <div class="relative pt-[56.25%]">
                        <!-- 16:9 aspect ratio -->
                        <video ref="videoPlayer" controls class="absolute left-0 top-0 h-full w-full rounded">
                            <source :src="videoUrl" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

const props = defineProps({
    courseId: {
        type: [String, Number],
        required: true,
    },
});

const emit = defineEmits(['video-deleted', 'video-edited']);

const videos = ref([]);
const loading = ref(false);
const playingVideoId = ref(null);
const videoUrl = ref('');
const videoPlayer = ref(null);

const fetchVideos = async () => {
    loading.value = true;
    try {
        const response = await axios.get(route('admin.courses.videos.index', { course: props.courseId }));
        videos.value = response.data.videos;
    } catch (error) {
        console.error('Error fetching videos:', error);
        alert('Error loading videos: ' + (error.response?.data?.message || error.message));
    } finally {
        loading.value = false;
    }
};
const response = await axios.get(route('admin.courses.videos.list', { course: props.courseId }));

const playVideo = async (video) => {
    if (playingVideoId.value === video.id) {
        playingVideoId.value = null;
        return;
    }

    try {
        // Option 1: Direct URL (simpler)
        videoUrl.value = `/storage/course_videos/${video.video_path}`;
        playingVideoId.value = video.id;

        // Option 2: Using API route
        // const response = await axios.get(
        //     route('admin.courses.videos.url', {
        //         course: props.courseId,
        //         video: video.id
        //     })
        // );
        // videoUrl.value = response.data.url;
        // playingVideoId.value = video.id;

        // Play video after a short delay
        setTimeout(() => {
            if (videoPlayer.value) {
                videoPlayer.value.play();
            }
        }, 100);
    } catch (error) {
        console.error('Error getting video URL:', error);
        alert('Error playing video');
    }
};

const editVideo = (video) => {
    emit('video-edited', video);
};

const deleteVideo = async (videoId) => {
    if (!confirm('Are you sure you want to delete this video?')) {
        return;
    }

    try {
        await axios.delete(
            route('admin.courses.videos.destroy', {
                course: props.courseId,
                video: videoId,
            }),
        );
        videos.value = videos.value.filter((v) => v.id !== videoId);
        emit('video-deleted', videoId);
        alert('Video deleted successfully!');

        // Refresh the video list
        fetchVideos();
    } catch (error) {
        console.error('Error deleting video:', error);
        alert('Error deleting video: ' + (error.response?.data?.message || error.message));
    }
};

onMounted(() => {
    fetchVideos();
});
</script>
