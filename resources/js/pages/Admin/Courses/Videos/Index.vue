<!-- resources/js/Pages/Admin/Courses/Videos/Index.vue -->
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
                <!-- Gradient Header -->
                <div
                    class="animate-fade-in relative mb-8 overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-blue-600/20 via-purple-600/20 to-pink-600/20 p-8 shadow-2xl backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-purple-500/10"
                >
                    <div class="absolute inset-0 opacity-20">
                        <div class="animate-float absolute -left-20 -top-20 h-64 w-64 rounded-full bg-blue-500 blur-3xl"></div>
                        <div class="animate-float-delayed absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-purple-600 blur-3xl"></div>
                    </div>

                    <!-- Decorative dots -->
                    <div class="absolute right-4 top-4 opacity-20">
                        <div class="grid grid-cols-4 gap-1">
                            <div v-for="i in 16" :key="i" class="h-1.5 w-1.5 rounded-full bg-white"></div>
                        </div>
                    </div>

                    <div class="relative">
                        <!-- Breadcrumb -->
                        <nav class="mb-6 flex items-center space-x-2 text-sm">
                            <Link :href="route('admin.courses.index')" class="text-gray-400 transition-colors hover:text-white"> Courses </Link>
                            <span class="text-gray-600">/</span>
                            <Link :href="route('admin.courses.edit', course.id)" class="text-gray-400 transition-colors hover:text-white">
                                {{ truncateText(course.title, 30) }}
                            </Link>
                            <span class="text-gray-600">/</span>
                            <span class="font-medium text-white">Videos</span>
                        </nav>

                        <!-- Course Header -->
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div class="mb-6 lg:mb-0">
                                <div
                                    class="mb-2 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                                >
                                    <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                        />
                                    </svg>
                                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                        Video Management
                                    </span>
                                </div>
                                <h1 class="text-3xl font-bold text-white">Manage Videos</h1>
                                <p class="mt-2 max-w-2xl text-gray-300">{{ course.description }}</p>

                                <!-- Course Stats -->
                                <div class="mt-6 flex flex-wrap gap-3">
                                    <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 backdrop-blur-sm">
                                        <span class="text-sm font-medium text-gray-300">{{ course.category.name }}</span>
                                    </div>
                                    <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 backdrop-blur-sm">
                                        <span class="text-sm font-medium text-gray-300">${{ course.fee }}</span>
                                    </div>
                                    <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 backdrop-blur-sm">
                                        <span class="text-sm font-medium text-gray-300">{{ course.videos.length }} videos</span>
                                    </div>
                                    <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 backdrop-blur-sm">
                                        <span class="text-sm font-medium text-gray-300">{{ course.duration }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <Link
                                    :href="route('admin.courses.index')"
                                    class="group flex items-center rounded-xl border border-white/10 bg-white/5 px-5 py-3 text-white backdrop-blur-sm transition-all hover:border-white/20 hover:bg-white/10"
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
                                    class="group relative inline-flex items-center overflow-hidden rounded-xl px-5 py-3 font-medium text-white shadow-lg transition-all duration-300 hover:scale-105"
                                >
                                    <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500"></span>
                                    <span
                                        class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"
                                    ></span>
                                    <span class="relative z-10 flex items-center">
                                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                            />
                                        </svg>
                                        Edit Course
                                    </span>
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
                        <div
                            class="animate-fade-in animation-delay-100 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        >
                            <div class="border-b border-white/10 bg-gradient-to-r from-emerald-500/20 to-teal-500/20 px-8 py-6">
                                <div class="flex items-center">
                                    <div class="mr-4 rounded-xl bg-white/10 p-2.5">
                                        <svg class="h-6 w-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                        <p class="mt-1 text-sm text-emerald-300">Add a new video lesson to this course</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-8">
                                <CourseVideoUpload :course-id="course.id" @video-uploaded="handleVideoUploaded" />
                            </div>
                        </div>

                        <!-- Existing Videos Card -->
                        <div
                            class="animate-fade-in animation-delay-200 mt-8 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        >
                            <div class="border-b border-white/10 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 px-8 py-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="mr-4 rounded-xl bg-white/10 p-2.5">
                                            <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <p class="mt-1 text-sm text-indigo-300">{{ course.videos.length }} video(s) uploaded</p>
                                        </div>
                                    </div>
                                    <div v-if="course.videos.length > 0" class="text-sm font-medium text-indigo-300">
                                        ⏱️ {{ calculateTotalDuration() }}
                                    </div>
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
                        <div
                            class="animate-fade-in animation-delay-300 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        >
                            <div class="border-b border-white/10 bg-gradient-to-r from-purple-500/20 to-pink-500/20 px-6 py-6">
                                <div class="flex items-center">
                                    <div class="mr-4 rounded-xl bg-white/10 p-2.5">
                                        <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <div class="mb-6 overflow-hidden rounded-xl border border-white/10 shadow-lg">
                                    <div class="relative h-48 w-full">
                                        <img
                                            v-if="course.image"
                                            :src="`/storage/${course.image}`"
                                            :alt="course.title"
                                            class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                                        />
                                        <div v-else class="flex h-full w-full items-center justify-center bg-gradient-to-br from-white/5 to-white/10">
                                            <svg class="h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                                />
                                            </svg>
                                        </div>
                                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                            <h3 class="text-lg font-bold text-white">{{ truncateText(course.title, 40) }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Course Details -->
                                <div class="space-y-4">
                                    <div class="rounded-xl border border-blue-500/20 bg-blue-500/10 p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg class="mr-3 h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                                    />
                                                </svg>
                                                <span class="text-sm text-gray-400">Category</span>
                                            </div>
                                            <span class="font-semibold text-white">{{ course.category.name }}</span>
                                        </div>
                                    </div>

                                    <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/10 p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg class="mr-3 h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                <span class="text-sm text-gray-400">Duration</span>
                                            </div>
                                            <span class="font-semibold text-white">{{ course.duration }}</span>
                                        </div>
                                    </div>

                                    <div class="rounded-xl border border-amber-500/20 bg-amber-500/10 p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg class="mr-3 h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                <span class="text-sm text-gray-400">Course Fee</span>
                                            </div>
                                            <span class="text-xl font-bold text-white">${{ course.fee }}</span>
                                        </div>
                                    </div>

                                    <div class="rounded-xl border border-purple-500/20 bg-purple-500/10 p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg class="mr-3 h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                                <span class="text-sm text-gray-400">Total Videos</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-xl font-bold text-white">{{ course.videos.length }}</span>
                                                <div v-if="course.videos.length > 0" class="ml-2 h-2 w-2 rounded-full bg-green-500"></div>
                                                <div v-else class="ml-2 h-2 w-2 rounded-full bg-gray-600"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- View Course Button -->
                                <div class="mt-8">
                                    <Link
                                        :href="route('courses.public.show', course.id)"
                                        target="_blank"
                                        class="group relative flex w-full items-center justify-center overflow-hidden rounded-xl px-6 py-3 font-medium text-white shadow-lg transition-all duration-300 hover:scale-105"
                                    >
                                        <span
                                            class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                        ></span>
                                        <span
                                            class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"
                                        ></span>
                                        <span class="relative z-10 flex items-center">
                                            <svg
                                                class="mr-2 h-5 w-5 transition-transform group-hover:scale-110"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                />
                                            </svg>
                                            Preview Course
                                        </span>
                                    </Link>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats Card -->
                        <div
                            class="animate-fade-in animation-delay-400 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        >
                            <div class="border-b border-white/10 bg-gradient-to-r from-teal-500/20 to-emerald-500/20 px-6 py-6">
                                <div class="flex items-center">
                                    <div class="mr-4 rounded-xl bg-white/10 p-2.5">
                                        <svg class="h-6 w-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                    <div class="rounded-xl border border-white/10 bg-white/5 p-4 text-center">
                                        <div class="text-3xl font-bold text-white">{{ course.videos.length }}</div>
                                        <div class="text-sm text-gray-400">Total Videos</div>
                                    </div>

                                    <div v-if="course.videos.length > 0" class="rounded-xl border border-blue-500/20 bg-blue-500/10 p-4 text-center">
                                        <div class="text-2xl font-bold text-blue-400">{{ calculateTotalDuration() }}</div>
                                        <div class="text-sm text-gray-400">Total Duration</div>
                                    </div>

                                    <div class="rounded-xl border border-green-500/20 bg-green-500/10 p-4 text-center">
                                        <div class="text-2xl font-bold text-green-400">{{ course.videos.filter((v) => v.is_active).length }}</div>
                                        <div class="text-sm text-gray-400">Active Videos</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div
                            class="animate-fade-in animation-delay-500 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                        >
                            <div class="border-b border-white/10 bg-gradient-to-r from-orange-500/20 to-red-500/20 px-6 py-6">
                                <div class="flex items-center">
                                    <div class="mr-4 rounded-xl bg-white/10 p-2.5">
                                        <svg class="h-6 w-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/5 p-4 transition-all hover:border-white/20 hover:bg-white/10"
                                    >
                                        <div class="flex items-center">
                                            <div class="mr-3 rounded-xl bg-blue-500/20 p-2">
                                                <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-medium text-white">Edit Course Details</h3>
                                                <p class="text-sm text-gray-400">Update course information</p>
                                            </div>
                                        </div>
                                        <svg
                                            class="h-5 w-5 text-gray-500 transition-transform group-hover:translate-x-1"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </Link>

                                    <Link
                                        :href="route('admin.courses.index')"
                                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/5 p-4 transition-all hover:border-white/20 hover:bg-white/10"
                                    >
                                        <div class="flex items-center">
                                            <div class="mr-3 rounded-xl bg-gray-500/20 p-2">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-medium text-white">All Courses</h3>
                                                <p class="text-sm text-gray-400">Browse all courses</p>
                                            </div>
                                        </div>
                                        <svg
                                            class="h-5 w-5 text-gray-500 transition-transform group-hover:translate-x-1"
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

@keyframes float {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes float-delayed {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
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

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 3s ease-in-out infinite 1.5s;
}

.animation-delay-100 {
    animation-delay: 0.1s;
}

.animation-delay-200 {
    animation-delay: 0.2s;
}

.animation-delay-300 {
    animation-delay: 0.3s;
}

.animation-delay-400 {
    animation-delay: 0.4s;
}

.animation-delay-500 {
    animation-delay: 0.5s;
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
</style>
