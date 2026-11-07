<!-- resources/js/Pages/Admin/Courses/Create.vue -->
<template>
    <AdminLayout>
        <div class="relative min-h-screen overflow-hidden bg-black py-6">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute -right-20 top-20 h-96 w-96 animate-pulse rounded-full bg-purple-600/20 blur-3xl"></div>
                <div
                    class="absolute -bottom-20 -left-20 h-96 w-96 animate-pulse rounded-full bg-blue-600/20 blur-3xl"
                    style="animation-delay: 2s"
                ></div>
                <div
                    class="absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-600/10 blur-3xl"
                ></div>
            </div>

            <!-- Grid Pattern -->
            <div
                class="bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.03%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] absolute inset-0"
            ></div>

            <!-- Floating Particles -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    v-for="n in 20"
                    :key="n"
                    class="animate-float-particle absolute rounded-full"
                    :class="[
                        n % 3 === 0
                            ? 'bg-gradient-to-r from-blue-400/20 to-purple-400/20'
                            : n % 3 === 1
                              ? 'bg-gradient-to-r from-purple-400/20 to-pink-400/20'
                              : 'bg-gradient-to-r from-pink-400/20 to-red-400/20',
                    ]"
                    :style="{
                        left: Math.random() * 100 + '%',
                        top: Math.random() * 100 + '%',
                        animationDelay: Math.random() * 8 + 's',
                        animationDuration: 4 + Math.random() * 6 + 's',
                        width: Math.random() * 4 + 2 + 'px',
                        height: Math.random() * 4 + 2 + 'px',
                    }"
                ></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="py-6">
                    <!-- Page Header -->
                    <div class="animate-fade-in mb-8">
                        <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                            <div>
                                <div
                                    class="mb-2 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                                >
                                    <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                        />
                                    </svg>
                                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                        Admin Panel
                                    </span>
                                </div>
                                <h1 class="text-2xl font-semibold text-white">Create New Course</h1>
                                <p class="mt-1 text-sm text-gray-400">Add a new course to the system</p>
                            </div>
                            <Link
                                :href="route('admin.courses.index')"
                                class="group inline-flex items-center rounded-xl border border-white/10 bg-white/5 px-5 py-2.5 text-sm font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-white/20 hover:bg-white/10 hover:text-white"
                            >
                                <svg
                                    class="mr-2 h-4 w-4 transition-transform group-hover:-translate-x-1"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Courses
                            </Link>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="animate-fade-in animation-delay-100 mx-auto max-w-3xl">
                        <form @submit.prevent="submit">
                            <div
                                class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                            >
                                <!-- Title -->
                                <div class="mb-6">
                                    <label for="title" class="mb-1.5 block text-sm font-medium text-gray-300">
                                        Course Title <span class="text-red-400">*</span>
                                    </label>
                                    <div class="group relative">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                            <svg
                                                class="h-5 w-5 text-gray-500 transition-colors group-hover:text-blue-400"
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
                                        <input
                                            v-model="form.title"
                                            type="text"
                                            id="title"
                                            placeholder="Enter course title..."
                                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            required
                                        />
                                    </div>
                                    <p v-if="form.errors.title" class="mt-1.5 flex items-center text-sm text-red-400">
                                        <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        {{ form.errors.title }}
                                    </p>
                                </div>

                                <!-- Description -->
                                <div class="mb-6">
                                    <label for="description" class="mb-1.5 block text-sm font-medium text-gray-300">
                                        Description <span class="text-red-400">*</span>
                                    </label>
                                    <div class="group relative">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-start pl-4 pt-4">
                                            <svg
                                                class="h-5 w-5 text-gray-500 transition-colors group-hover:text-blue-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <textarea
                                            v-model="form.description"
                                            id="description"
                                            rows="4"
                                            placeholder="Enter course description..."
                                            class="w-full resize-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            required
                                        ></textarea>
                                    </div>
                                    <p v-if="form.errors.description" class="mt-1.5 flex items-center text-sm text-red-400">
                                        <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        {{ form.errors.description }}
                                    </p>
                                </div>

                                <!-- Duration & Fee -->
                                <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <!-- Duration -->
                                    <div>
                                        <label for="duration" class="mb-1.5 block text-sm font-medium text-gray-300">
                                            Duration <span class="text-red-400">*</span>
                                        </label>
                                        <div class="group relative">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                                <svg
                                                    class="h-5 w-5 text-gray-500 transition-colors group-hover:text-blue-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <input
                                                v-model="form.duration"
                                                type="text"
                                                id="duration"
                                                placeholder="e.g., 3 months, 40 hours"
                                                class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                                required
                                            />
                                        </div>
                                        <p v-if="form.errors.duration" class="mt-1.5 flex items-center text-sm text-red-400">
                                            <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.duration }}
                                        </p>
                                    </div>

                                    <!-- Fee -->
                                    <div>
                                        <label for="fee" class="mb-1.5 block text-sm font-medium text-gray-300">
                                            Fee ($) <span class="text-red-400">*</span>
                                        </label>
                                        <div class="group relative">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                                <svg
                                                    class="h-5 w-5 text-gray-500 transition-colors group-hover:text-blue-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <input
                                                v-model="form.fee"
                                                type="number"
                                                step="0.01"
                                                id="fee"
                                                min="0"
                                                placeholder="0.00"
                                                class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                                required
                                            />
                                        </div>
                                        <p v-if="form.errors.fee" class="mt-1.5 flex items-center text-sm text-red-400">
                                            <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.fee }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="mb-6">
                                    <label for="category_id" class="mb-1.5 block text-sm font-medium text-gray-300">
                                        Subcategory <span class="text-red-400">*</span>
                                    </label>
                                    <div class="group relative">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                            <svg
                                                class="h-5 w-5 text-gray-500 transition-colors group-hover:text-blue-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                                />
                                            </svg>
                                        </div>
                                        <select
                                            v-model="form.category_id"
                                            id="category_id"
                                            class="w-full appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            required
                                        >
                                            <option value="" class="bg-gray-900">Select a subcategory</option>
                                            <option v-for="category in categories" :key="category.id" :value="category.id" class="bg-gray-900">
                                                {{ category.name }}
                                            </option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p v-if="form.errors.category_id" class="mt-1.5 flex items-center text-sm text-red-400">
                                        <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        {{ form.errors.category_id }}
                                    </p>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-6">
                                    <label for="image" class="mb-1.5 block text-sm font-medium text-gray-300"> Course Image </label>
                                    <div class="group relative">
                                        <div class="flex w-full items-center justify-center">
                                            <label
                                                for="image"
                                                class="group flex w-full cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-white/10 bg-white/5 px-4 py-8 transition-all duration-300 hover:border-blue-500/50 hover:bg-white/10"
                                            >
                                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                                    <svg
                                                        class="mb-3 h-10 w-10 text-gray-400 transition-colors group-hover:text-blue-400"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                        />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-400">
                                                        <span class="font-semibold text-white">Click to upload</span> or drag and drop
                                                    </p>
                                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                                    <p v-if="form.image" class="mt-2 text-sm text-green-400">✓ {{ form.image.name }}</p>
                                                </div>
                                                <input
                                                    @input="form.image = $event.target.files[0]"
                                                    type="file"
                                                    id="image"
                                                    accept="image/*"
                                                    class="hidden"
                                                />
                                            </label>
                                        </div>
                                    </div>
                                    <p v-if="form.errors.image" class="mt-1.5 flex items-center text-sm text-red-400">
                                        <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        {{ form.errors.image }}
                                    </p>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex justify-end space-x-3 border-t border-white/10 pt-6">
                                    <Link
                                        :href="route('admin.courses.index')"
                                        class="inline-flex items-center rounded-xl border border-white/10 bg-white/5 px-6 py-2.5 text-sm font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-white/20 hover:bg-white/10 hover:text-white"
                                    >
                                        Cancel
                                    </Link>
                                    <button
                                        type="submit"
                                        :disabled="form.processing"
                                        class="group relative inline-flex items-center overflow-hidden rounded-xl px-6 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105 disabled:cursor-not-allowed disabled:opacity-50 disabled:hover:scale-100"
                                    >
                                        <span
                                            class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                        ></span>
                                        <span
                                            class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"
                                        ></span>
                                        <span class="relative z-10 flex items-center">
                                            <svg
                                                v-if="form.processing"
                                                class="mr-2 h-4 w-4 animate-spin"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                                />
                                            </svg>
                                            <svg
                                                v-else
                                                class="mr-2 h-4 w-4 transition-transform group-hover:scale-110"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                            {{ form.processing ? 'Creating...' : 'Create Course' }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

<style scoped>
/* Animation Keyframes */
@keyframes float-particle {
    0%,
    100% {
        transform: translateY(0px) translateX(0px) rotate(0deg);
        opacity: 0.2;
    }
    25% {
        transform: translateY(-30px) translateX(15px) rotate(90deg);
        opacity: 0.6;
    }
    50% {
        transform: translateY(-10px) translateX(-15px) rotate(180deg);
        opacity: 0.4;
    }
    75% {
        transform: translateY(-40px) translateX(10px) rotate(270deg);
        opacity: 0.7;
    }
}

@keyframes gradient-x {
    0%,
    100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animation Classes */
.animate-float-particle {
    animation: float-particle 6s ease-in-out infinite;
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
    opacity: 0;
}

.animation-delay-100 {
    animation-delay: 0.1s;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #0a0a0a;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}

/* Smooth scroll */
html {
    scroll-behavior: smooth;
}

/* Glassmorphism */
.backdrop-blur-xl {
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

/* Transition improvements */
.transition-all {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Gradient text */
.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}

/* Select dropdown styling */
select option {
    background-color: #1a1a1a;
    color: white;
}

/* Input autofill styles */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset !important;
    -webkit-text-fill-color: white !important;
    border-color: rgba(59, 130, 246, 0.3) !important;
}
</style>
