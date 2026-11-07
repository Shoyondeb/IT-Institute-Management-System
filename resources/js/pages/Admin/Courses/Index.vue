<!-- resources/js/Pages/Admin/Courses/Index.vue -->
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
                <!-- Header with button -->
                <div class="animate-fade-in mb-6 flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
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
                        <h1 class="text-2xl font-bold text-white">Manage Courses</h1>
                        <p class="mt-1 text-sm text-gray-400">Total {{ courses.total }} courses in the system</p>
                    </div>
                    <Link
                        :href="route('admin.courses.create')"
                        class="group relative inline-flex items-center overflow-hidden rounded-xl px-6 py-2.5 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105"
                    >
                        <span
                            class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                        ></span>
                        <span class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"></span>
                        <span class="relative z-10 flex items-center">
                            <svg
                                class="mr-2 h-5 w-5 transition-transform group-hover:rotate-90"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Course
                        </span>
                    </Link>
                </div>

                <!-- Search and Filter Section -->
                <div
                    class="animate-fade-in animation-delay-100 mb-6 rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                >
                    <div class="flex flex-col space-y-4 md:flex-row md:items-center md:space-x-4 md:space-y-0">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <div class="group relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                    <svg
                                        class="h-5 w-5 text-gray-400 transition-colors group-hover:text-blue-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    v-model="search"
                                    type="text"
                                    placeholder="Search by course title or description..."
                                    @keyup.enter="applyFilters"
                                    class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                />
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="w-full md:w-64">
                            <div class="relative">
                                <select
                                    v-model="selectedCategory"
                                    @change="applyFilters"
                                    class="w-full appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                >
                                    <option value="" class="bg-gray-900">All Categories</option>
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
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button
                                @click="applyFilters"
                                class="inline-flex items-center rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-purple-500/25"
                            >
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                                Search
                            </button>
                            <button
                                @click="resetFilters"
                                class="inline-flex items-center rounded-xl border border-white/10 px-5 py-3 text-sm font-medium text-gray-300 transition-all duration-300 hover:border-white/20 hover:bg-white/5 hover:text-white"
                            >
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    />
                                </svg>
                                Reset
                            </button>
                        </div>
                    </div>

                    <!-- Active Filters Display -->
                    <div v-if="search || selectedCategory" class="mt-4 flex flex-wrap items-center gap-2 border-t border-white/10 pt-4">
                        <span class="text-sm text-gray-400">Active filters:</span>
                        <span
                            v-if="search"
                            class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-1 text-xs font-medium text-blue-300"
                        >
                            Search: "{{ search }}"
                            <button
                                @click="
                                    search = '';
                                    applyFilters();
                                "
                                class="ml-1.5 hover:text-blue-100"
                            >
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </span>
                        <span
                            v-if="selectedCategory"
                            class="inline-flex items-center rounded-full border border-purple-500/20 bg-purple-500/10 px-3 py-1 text-xs font-medium text-purple-300"
                        >
                            Category: {{ getCategoryName(selectedCategory) }}
                            <button
                                @click="
                                    selectedCategory = '';
                                    applyFilters();
                                "
                                class="ml-1.5 hover:text-purple-100"
                            >
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>

                <!-- Courses Table Container -->
                <div
                    class="animate-fade-in animation-delay-200 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                >
                    <!-- Responsive wrapper -->
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <table class="min-w-full divide-y divide-white/10">
                                <thead class="bg-white/5">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-4 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-6"
                                        >
                                            Course
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Category
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Duration
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Fee
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Students
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Videos
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-gray-400 lg:px-4"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr v-for="course in courses.data" :key="course.id" class="transition-all duration-300 hover:bg-white/5">
                                        <!-- Course Cell -->
                                        <td class="px-4 py-4 lg:px-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="relative h-12 w-12 flex-shrink-0 overflow-hidden rounded-xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 shadow-lg"
                                                >
                                                    <img
                                                        v-if="course.image"
                                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                        :src="`/storage/${course.image}`"
                                                        :alt="course.title"
                                                    />
                                                    <div v-else class="flex h-full w-full items-center justify-center">
                                                        <svg class="h-6 w-6 text-blue-400/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                                    <div class="truncate font-medium text-white transition-colors hover:text-blue-400">
                                                        {{ course.title }}
                                                    </div>
                                                    <div class="truncate text-xs text-gray-400 sm:text-sm">
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
                                            <span
                                                class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-2.5 py-0.5 text-xs font-medium text-blue-300"
                                            >
                                                {{ course.category.name }}
                                            </span>
                                        </td>

                                        <!-- Duration Cell -->
                                        <td class="px-3 py-4 text-sm text-gray-300 lg:px-4">
                                            <div class="flex items-center">
                                                <svg class="mr-1.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <div class="text-sm font-bold text-blue-400">${{ course.fee }}</div>
                                        </td>

                                        <!-- Students Cell -->
                                        <td class="px-3 py-4 lg:px-4">
                                            <div class="flex items-center text-sm text-gray-300">
                                                <svg class="mr-1.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                                    />
                                                </svg>
                                                {{ course.enrollments_count || 0 }}
                                            </div>
                                        </td>

                                        <!-- Videos Cell -->
                                        <td class="px-3 py-4 lg:px-4">
                                            <div class="space-y-1">
                                                <div v-if="course.videos_count" class="flex items-center text-xs text-green-400">
                                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        />
                                                    </svg>
                                                    {{ course.videos_count }} videos
                                                </div>
                                                <div v-else class="text-xs text-gray-500">No videos yet</div>
                                                <Link
                                                    :href="route('admin.courses.videos.page', course.id)"
                                                    class="inline-flex items-center text-xs text-blue-400 transition-colors hover:text-blue-300 sm:text-sm"
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
                                                    class="group inline-flex items-center text-xs text-blue-400 transition-colors hover:text-blue-300 sm:text-sm"
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
                                                    class="group inline-flex items-center text-xs text-red-400 transition-colors hover:text-red-300 sm:text-sm"
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
                            <div
                                class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20"
                            >
                                <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                    />
                                </svg>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-white">No courses found</h3>
                            <p class="mt-2 text-sm text-gray-400">Try adjusting your search or filter criteria.</p>
                            <div class="mt-6">
                                <Link
                                    :href="route('admin.courses.create')"
                                    class="group relative inline-flex items-center overflow-hidden rounded-xl px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105"
                                >
                                    <span
                                        class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                    ></span>
                                    <span
                                        class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"
                                    ></span>
                                    <span class="relative z-10 flex items-center">
                                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Add New Course
                                    </span>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div v-if="courses.data.length > 0" class="border-t border-white/10 px-4 py-4 sm:px-6">
                        <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
                            <div class="text-sm text-gray-400">
                                Showing
                                <span class="font-medium text-white">{{ courses.from || 0 }}</span>
                                to
                                <span class="font-medium text-white">{{ courses.to || 0 }}</span>
                                of
                                <span class="font-medium text-white">{{ courses.total || 0 }}</span>
                                results
                            </div>
                            <Pagination :links="courses.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    courses: Object,
    categories: Array,
    filters: {
        type: Object,
        default: () => ({}),
    },
});

const search = ref(props.filters?.search || '');
const selectedCategory = ref(props.filters?.category || '');

const getCategoryName = (categoryId) => {
    if (!props.categories) return '';
    const category = props.categories.find((c) => c.id === parseInt(categoryId));
    return category ? category.name : '';
};

const applyFilters = () => {
    const params = {};
    if (search.value) params.search = search.value;
    if (selectedCategory.value) params.category = selectedCategory.value;

    router.get(route('admin.courses.index'), params, {
        preserveState: true,
        replace: true,
    });
};

const resetFilters = () => {
    search.value = '';
    selectedCategory.value = '';
    applyFilters();
};

const deleteCourse = (course) => {
    if (confirm(`Are you sure you want to delete "${course.title}"?`)) {
        router.delete(route('admin.courses.destroy', course.id));
    }
};

// Debounce search - auto search after typing stops
let searchTimeout = null;
watch(search, (newValue) => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 500);
});

// Auto apply category filter when changed
watch(selectedCategory, () => {
    applyFilters();
});
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

.animation-delay-200 {
    animation-delay: 0.2s;
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
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset !important;
    -webkit-text-fill-color: white !important;
    border-color: rgba(59, 130, 246, 0.3) !important;
}
</style>
