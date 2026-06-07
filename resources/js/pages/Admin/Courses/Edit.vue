<!-- resources/js/Pages/Admin/Courses/Edit.vue -->
<template>
    <AdminLayout>
        <div class="py-6">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Edit Course</h1>
                    <p class="mt-1 text-sm text-gray-600">Update course information</p>
                </div>

                <!-- Success/Error Messages -->
                <div v-if="$page.props.flash && $page.props.flash.success" class="mb-4 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ $page.props.flash.success }}</p>
                        </div>
                    </div>
                </div>

                <div v-if="$page.props.flash && $page.props.flash.error" class="mb-4 rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ $page.props.flash.error }}</p>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="submit">
                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <div class="p-6">
                            <!-- Title -->
                            <div class="mb-6">
                                <label for="title" class="mb-1 block text-sm font-medium text-gray-700"> Course Title * </label>
                                <input
                                    v-model="form.title"
                                    type="text"
                                    id="title"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                    required
                                />
                                <p v-if="form.errors.title" class="mt-1 text-sm text-red-600">
                                    {{ form.errors.title }}
                                </p>
                            </div>

                            <!-- Description -->
                            <div class="mb-6">
                                <label for="description" class="mb-1 block text-sm font-medium text-gray-700"> Description * </label>
                                <textarea
                                    v-model="form.description"
                                    id="description"
                                    rows="4"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                    required
                                ></textarea>
                                <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">
                                    {{ form.errors.description }}
                                </p>
                            </div>

                            <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                                <!-- Duration -->
                                <div>
                                    <label for="duration" class="mb-1 block text-sm font-medium text-gray-700"> Duration * </label>
                                    <input
                                        v-model="form.duration"
                                        type="text"
                                        id="duration"
                                        placeholder="e.g., 3 months, 40 hours"
                                        class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                        required
                                    />
                                    <p v-if="form.errors.duration" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.duration }}
                                    </p>
                                </div>

                                <!-- Fee -->
                                <div>
                                    <label for="fee" class="mb-1 block text-sm font-medium text-gray-700"> Fee ($) * </label>
                                    <input
                                        v-model="form.fee"
                                        type="number"
                                        step="0.01"
                                        id="fee"
                                        min="0"
                                        class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                        required
                                    />
                                    <p v-if="form.errors.fee" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.fee }}
                                    </p>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="mb-6">
                                <label for="category_id" class="mb-1 block text-sm font-medium text-gray-700"> Subcategory * </label>
                                <select
                                    v-model="form.category_id"
                                    id="category_id"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                    required
                                >
                                    <option value="">Select a subcategory</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <p v-if="form.errors.category_id" class="mt-1 text-sm text-red-600">
                                    {{ form.errors.category_id }}
                                </p>
                            </div>

                            <!-- Current Image -->
                            <div class="mb-6" v-if="course.image && !removeImage">
                                <label class="mb-1 block text-sm font-medium text-gray-700"> Current Image </label>
                                <div class="h-48 w-full overflow-hidden rounded-md bg-gray-200">
                                    <img :src="`/storage/${course.image}`" :alt="course.title" class="h-full w-full object-cover" />
                                </div>
                                <div class="mt-2">
                                    <button type="button" @click="removeImage = true" class="text-sm text-red-600 hover:text-red-800">
                                        Remove image
                                    </button>
                                </div>
                            </div>

                            <!-- Image removed message -->
                            <div v-if="removeImage" class="mb-6 rounded-md bg-yellow-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                fill-rule="evenodd"
                                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-yellow-800">Image will be removed when you save changes</p>
                                        <button
                                            type="button"
                                            @click="removeImage = false"
                                            class="mt-2 text-sm font-medium text-yellow-800 underline hover:text-yellow-900"
                                        >
                                            Undo removal
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-6">
                                <label for="image" class="mb-1 block text-sm font-medium text-gray-700">
                                    {{ course.image && !removeImage ? 'Change Course Image' : 'Course Image' }}
                                </label>
                                <input
                                    @input="form.image = $event.target.files[0]"
                                    type="file"
                                    id="image"
                                    accept="image/*"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                />
                                <p v-if="form.errors.image" class="mt-1 text-sm text-red-600">
                                    {{ form.errors.image }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500">Upload a course image (max 2MB, JPEG, PNG, GIF)</p>
                            </div>
                            <!-- Video Management Section -->
                            <div class="mt-8">
                                <h2 class="mb-4 text-xl font-bold">Course Videos Management</h2>

                                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                    <!-- Video Upload -->
                                    <CourseVideoUpload :course-id="course.id" @video-uploaded="handleVideoUploaded" />

                                    <!-- Video List -->
                                    <CourseVideoList :course-id="course.id" @video-deleted="handleVideoDeleted" @video-edited="handleVideoEdited" />
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3 pt-6">
                                <a
                                    :href="route('admin.courses.index')"
                                    class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    Cancel
                                </a>
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50"
                                >
                                    <span v-if="form.processing">Updating...</span>
                                    <span v-else>Update Course</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps<{
    course: {
        id: number;
        title: string;
        description: string;
        duration: string;
        fee: number;
        image?: string;
        category_id: number;
    };
    categories: Array<{
        id: number;
        name: string;
    }>;
}>();

const removeImage = ref(false);

const form = useForm({
    title: props.course.title,
    description: props.course.description,
    duration: props.course.duration,
    fee: props.course.fee,
    category_id: props.course.category_id,
    image: null as File | null,
    remove_image: false,
});
//video part
const handleVideoUploaded = (video) => {
    // Refresh video list or add to local state
    console.log('Video uploaded:', video);
};

const handleVideoDeleted = (videoId) => {
    console.log('Video deleted:', videoId);
};

const handleVideoEdited = (video) => {
    console.log('Video edited:', video);
};

const submit = () => {
    form.remove_image = removeImage.value;

    // Use form.transform to handle file upload properly
    form.transform((data) => ({
        ...data,
        _method: 'PUT', // Laravel needs this for PUT requests with file uploads
    })).post(route('admin.courses.update', props.course.id), {
        preserveScroll: true,
        forceFormData: true, // This tells Inertia to use FormData for file uploads
    });
};
</script>
