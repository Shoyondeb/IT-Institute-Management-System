<!-- resources/js/Components/CourseVideoUpload.vue -->
<template>
    <div class="rounded-lg bg-white p-6 shadow-md">
        <h3 class="mb-4 text-lg font-semibold">Upload Course Video</h3>

        <div v-if="uploadProgress !== null" class="mb-4">
            <div class="h-2.5 w-full rounded-full bg-gray-200">
                <div class="h-2.5 rounded-full bg-blue-600" :style="{ width: uploadProgress + '%' }"></div>
            </div>
            <p class="mt-1 text-sm text-gray-600">Uploading: {{ uploadProgress }}%</p>
        </div>

        <form @submit.prevent="uploadVideo">
            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-gray-700"> Video Title * </label>
                <input v-model="form.title" type="text" required class="w-full rounded-md border border-gray-300 px-3 py-2" />
                <p v-if="errors.title" class="mt-1 text-sm text-red-500">
                    {{ errors.title[0] }}
                </p>
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-gray-700"> Video File (MP4) * </label>
                <input
                    type="file"
                    ref="videoInput"
                    accept=".mp4"
                    required
                    @change="handleFileChange"
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                />
                <p v-if="errors.video" class="mt-1 text-sm text-red-500">
                    {{ errors.video[0] }}
                </p>
                <p class="mt-1 text-xs text-gray-500">Maximum file size: 100MB</p>
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-gray-700"> Duration (optional) </label>
                <input v-model="form.duration" type="text" placeholder="HH:MM:SS" class="w-full rounded-md border border-gray-300 px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-gray-700"> Order </label>
                <input v-model="form.order" type="number" min="0" class="w-full rounded-md border border-gray-300 px-3 py-2" />
            </div>

            <button
                type="submit"
                :disabled="uploading"
                class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50"
            >
                <span v-if="uploading">Uploading...</span>
                <span v-else>Upload Video</span>
            </button>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { reactive, ref } from 'vue';

const props = defineProps({
    courseId: {
        type: [String, Number],
        required: true,
    },
});

const emit = defineEmits(['video-uploaded']);

const videoInput = ref(null);
const uploading = ref(false);
const uploadProgress = ref(null);
const errors = ref({});

const form = reactive({
    title: '',
    duration: '',
    order: 0,
    video: null,
});

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        if (!file.type.includes('mp4')) {
            alert('Please select an MP4 file');
            videoInput.value.value = '';
            return;
        }

        if (file.size > 100 * 1024 * 1024) {
            alert('File size must be less than 100MB');
            videoInput.value.value = '';
            return;
        }

        form.video = file;
    }
};

const uploadVideo = async () => {
    if (!form.video) {
        alert('Please select a video file');
        return;
    }

    uploading.value = true;
    uploadProgress.value = 0;
    errors.value = {};

    // FIXED: Create FormData here
    const formData = new FormData();
    formData.append('title', form.title);
    formData.append('video', form.video);
    formData.append('duration', form.duration);
    formData.append('order', form.order);

    try {
        const response = await axios.post(
            route('admin.courses.videos.store', {
                course: props.courseId,
            }),
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
                onUploadProgress: (progressEvent) => {
                    const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    uploadProgress.value = percentCompleted;
                },
            },
        );

        // Reset form
        form.title = '';
        form.duration = '';
        form.order = 0;
        form.video = null;
        if (videoInput.value) {
            videoInput.value.value = '';
        }

        uploadProgress.value = null;
        uploading.value = false;

        emit('video-uploaded', response.data.video);
        alert('Video uploaded successfully!');
    } catch (error) {
        uploading.value = false;
        uploadProgress.value = null;

        if (error.response?.status === 422) {
            errors.value = error.response.data.errors;
        } else {
            alert('Error uploading video: ' + (error.response?.data?.message || error.message));
        }
    }
};
</script>
