<!-- resources/js/Pages/Admin/Courses/Create.vue -->
<template>
    <AdminLayout>
        <div class="py-6">
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">Create New Course</h1>
            </div>

            <div class="mx-auto max-w-3xl">
                <form @submit.prevent="submit">
                    <div class="rounded-lg bg-white p-6 shadow">
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

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="mb-1 block text-sm font-medium text-gray-700"> Course Image </label>
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

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3">
                            <Link
                                :href="route('admin.courses.index')"
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Cancel
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50"
                            >
                                Create Course
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
    duration: '',
    fee: '',
    category_id: '',
    image: null as File | null,
});

const submit = () => {
    form.post(route('admin.courses.store'));
};

defineProps<{
    categories: Array<{
        id: number;
        name: string;
    }>;
}>();
</script>
