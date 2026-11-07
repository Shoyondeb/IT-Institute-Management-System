<!-- resources/js/Pages/Courses/Show.vue -->
<template>
    <AuthenticatedLayout>
        <div class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-950 to-purple-900">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="animate-fade-in mb-6" aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center space-x-2 text-sm">
                        <li>
                            <Link :href="route('courses.public.index')" class="hover:shadow-glow text-indigo-300 transition-all hover:text-white">
                                <svg class="inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    />
                                </svg>
                                Courses
                            </Link>
                        </li>
                        <li><span class="text-indigo-400">/</span></li>
                        <li>
                            <Link
                                :href="route('courses.public.index', { category: course.category.parent_id })"
                                class="hover:shadow-glow text-indigo-300 transition-all hover:text-white"
                            >
                                {{ course.category.parent.name }}
                            </Link>
                        </li>
                        <li><span class="text-indigo-400">/</span></li>
                        <li class="line-clamp-1 font-medium text-white">{{ course.title }}</li>
                    </ol>
                </nav>

                <!-- Course Details -->
                <div
                    class="overflow-hidden rounded-3xl bg-white/10 shadow-2xl ring-1 ring-white/20 backdrop-blur-2xl transition-all hover:shadow-indigo-500/20"
                >
                    <div class="flex flex-col lg:flex-row">
                        <!-- Course Image -->
                        <div class="relative lg:w-2/5 xl:w-1/3">
                            <div class="h-64 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 lg:h-full">
                                <img
                                    v-if="course.image"
                                    :src="`/storage/${course.image}`"
                                    :alt="course.title"
                                    class="h-full w-full object-cover transition-all duration-700 hover:rotate-1 hover:scale-110"
                                />
                                <div v-else class="flex h-full w-full flex-col items-center justify-center">
                                    <div class="relative">
                                        <div class="animate-ping-slow absolute inset-0 rounded-full bg-white/20"></div>
                                        <svg class="relative h-24 w-24 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Animated Badges -->
                            <div class="absolute left-4 top-4 flex flex-wrap gap-2">
                                <span
                                    class="animate-slide-in-left rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 px-3 py-1.5 text-xs font-semibold text-white shadow-lg shadow-indigo-500/50 backdrop-blur-sm"
                                >
                                    {{ course.category.parent.name }}
                                </span>
                                <span
                                    class="animate-slide-in-left animation-delay-100 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1.5 text-xs font-semibold text-white shadow-lg shadow-pink-500/50 backdrop-blur-sm"
                                >
                                    {{ course.category.name }}
                                </span>
                            </div>

                            <!-- Animated Rating -->
                            <div
                                class="absolute bottom-4 left-4 rounded-full bg-white/20 px-4 py-2 text-sm font-medium text-white shadow-lg ring-1 ring-white/20 backdrop-blur-sm"
                            >
                                <span class="animate-pulse text-yellow-400">★</span> 4.8
                                <span class="ml-1 text-white/60">(124)</span>
                            </div>

                            <!-- Animated Duration -->
                            <div
                                class="absolute bottom-4 right-4 rounded-full bg-black/40 px-4 py-2 text-sm font-medium text-white shadow-lg ring-1 ring-white/20 backdrop-blur-sm"
                            >
                                <svg class="animate-spin-slow mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                {{ course.duration }}
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="flex-1 p-6 md:p-8">
                            <div class="mb-4 flex flex-wrap items-start justify-between gap-4">
                                <div class="min-w-0 flex-1">
                                    <h1 class="text-2xl font-bold text-white md:text-3xl lg:text-4xl">
                                        {{ course.title }}
                                    </h1>
                                    <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-indigo-200">
                                        <span class="flex items-center">
                                            <svg class="mr-1.5 h-4 w-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                />
                                            </svg>
                                            Instructor: John Doe
                                        </span>
                                        <span class="hidden text-indigo-400 sm:block">•</span>
                                        <span class="flex items-center">
                                            <svg class="mr-1.5 h-4 w-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                                />
                                            </svg>
                                            1,234 Students
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 text-right">
                                    <div
                                        class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-3xl font-bold text-transparent md:text-4xl"
                                    >
                                        ৳{{ course.fee }}
                                    </div>
                                </div>
                            </div>

                            <!-- Description Section with Pop-up -->
                            <div class="mb-6">
                                <h3 class="mb-2 text-sm font-semibold uppercase tracking-wider text-indigo-300">Course Description</h3>
                                <div class="relative">
                                    <div class="absolute -left-4 top-0 h-full w-1 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"></div>
                                    <div class="pl-4">
                                        <div class="relative">
                                            <p class="line-clamp-3 text-sm leading-relaxed text-indigo-100/90 md:text-base">
                                                {{ course.description }}
                                            </p>
                                            <button
                                                @click="showDescriptionModal = true"
                                                class="group mt-2 inline-flex items-center text-sm font-medium text-indigo-400 transition-colors hover:text-white"
                                            >
                                                <span>Read More</span>
                                                <svg
                                                    class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 grid grid-cols-1 gap-3 sm:grid-cols-3">
                                <div
                                    class="group relative overflow-hidden rounded-2xl bg-white/5 p-4 ring-1 ring-white/10 transition-all hover:scale-105 hover:bg-white/10 hover:ring-indigo-500"
                                >
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 opacity-0 transition-opacity group-hover:opacity-100"
                                    ></div>
                                    <div class="relative flex items-center">
                                        <div class="mr-3 rounded-full bg-indigo-600/30 p-2">
                                            <svg class="h-5 w-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-indigo-300">Duration</p>
                                            <p class="text-sm font-medium text-white">{{ course.duration }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="group relative overflow-hidden rounded-2xl bg-white/5 p-4 ring-1 ring-white/10 transition-all hover:scale-105 hover:bg-white/10 hover:ring-indigo-500"
                                >
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 opacity-0 transition-opacity group-hover:opacity-100"
                                    ></div>
                                    <div class="relative flex items-center">
                                        <div class="mr-3 rounded-full bg-purple-600/30 p-2">
                                            <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-indigo-300">Category</p>
                                            <p class="text-sm font-medium text-white">{{ course.category.name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="group relative overflow-hidden rounded-2xl bg-white/5 p-4 ring-1 ring-white/10 transition-all hover:scale-105 hover:bg-white/10 hover:ring-indigo-500"
                                >
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 opacity-0 transition-opacity group-hover:opacity-100"
                                    ></div>
                                    <div class="relative flex items-center">
                                        <div class="mr-3 rounded-full bg-pink-600/30 p-2">
                                            <svg class="h-5 w-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                                                />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-indigo-300">Videos</p>
                                            <p class="text-sm font-medium text-white">{{ course.videos_count || 0 }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Enrollment Button -->
                            <div class="border-t border-white/10 pt-6">
                                <div v-if="$page.props.auth.user">
                                    <div v-if="!isEnrolled">
                                        <button
                                            @click="showPaymentModal = true"
                                            class="group relative inline-flex w-full items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-8 py-4 font-semibold text-white shadow-2xl shadow-indigo-500/30 transition-all hover:scale-105 hover:shadow-indigo-500/50 md:w-auto"
                                        >
                                            <span
                                                class="absolute inset-0 bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-700 opacity-0 transition-opacity group-hover:opacity-100"
                                            ></span>
                                            <span class="relative z-10 flex items-center text-base md:text-lg">
                                                <svg class="mr-2 h-5 w-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"
                                                    />
                                                </svg>
                                                Enroll Now
                                                <svg
                                                    class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-2"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                                                    />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div v-else>
                                        <div v-if="enrollmentStatus === 'pending'" class="text-center">
                                            <span
                                                class="inline-flex items-center rounded-2xl bg-yellow-500/20 px-6 py-3 font-semibold text-yellow-200 ring-1 ring-yellow-500/30 backdrop-blur-sm"
                                            >
                                                <svg class="mr-2 h-5 w-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                Payment Verification Pending
                                            </span>
                                            <p class="mt-2 text-sm text-indigo-200">Your enrollment is awaiting admin verification</p>
                                        </div>
                                        <div v-else-if="enrollmentStatus === 'verified'" class="text-center">
                                            <span
                                                class="inline-flex items-center rounded-2xl bg-emerald-500/20 px-6 py-3 font-semibold text-emerald-200 ring-1 ring-emerald-500/30 backdrop-blur-sm"
                                            >
                                                <svg class="mr-2 h-5 w-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                Successfully Enrolled
                                            </span>
                                            <p class="mt-2 text-sm text-indigo-200">You can now access the course content</p>
                                        </div>
                                        <div v-else-if="enrollmentStatus === 'rejected'" class="text-center">
                                            <span
                                                class="inline-flex items-center rounded-2xl bg-red-500/20 px-6 py-3 font-semibold text-red-200 ring-1 ring-red-500/30 backdrop-blur-sm"
                                            >
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
                                            <p class="mt-2 text-sm text-indigo-200">Please contact admin for assistance</p>
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <Link
                                        :href="route('login')"
                                        class="group inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-4 font-semibold text-white shadow-2xl shadow-indigo-500/30 transition-all hover:scale-105 hover:shadow-indigo-500/50 md:w-auto"
                                    >
                                        <svg class="mr-2 h-5 w-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                            />
                                        </svg>
                                        Login to Enroll
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================ -->
                <div v-if="isEnrolled && enrollmentStatus === 'verified'" class="animate-float-up animation-delay-200 mt-8">
                    <div class="overflow-hidden rounded-3xl bg-white/10 shadow-2xl ring-1 ring-white/20 backdrop-blur-2xl">
                        <div class="border-b border-white/10 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 px-6 py-4">
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div>
                                    <h2 class="flex items-center text-lg font-semibold text-white">
                                        <svg class="mr-2 h-5 w-5 animate-pulse text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                                            />
                                        </svg>
                                        Course Videos
                                    </h2>
                                    <p class="text-sm text-indigo-200">Watch the course videos in order</p>
                                </div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="rounded-full bg-indigo-500/30 px-4 py-1.5 text-sm font-medium text-white ring-1 ring-indigo-500/30">
                                        {{ sortedVideos.length }} Videos
                                    </span>
                                    <span
                                        v-if="currentVideoIndex !== null"
                                        class="rounded-full bg-emerald-500/30 px-4 py-1.5 text-sm font-medium text-white ring-1 ring-emerald-500/30"
                                    >
                                        {{ currentVideoIndex + 1 }} / {{ sortedVideos.length }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div v-if="videos && videos.length > 0">
                                <!-- Video Player -->
                                <div v-if="selectedVideo" class="mb-6 overflow-hidden rounded-2xl bg-black shadow-2xl ring-1 ring-white/10">
                                    <div class="relative">
                                        <video
                                            v-if="selectedVideo.video_path"
                                            :key="videoKey"
                                            controls
                                            controlslist="nodownload noremoteplayback noplaybackrate"
                                            disablepictureinpicture
                                            class="h-auto max-h-[500px] w-full"
                                            ref="videoPlayerRef"
                                            @loadedmetadata="onVideoLoaded"
                                            @ended="onVideoEnded"
                                            @timeupdate="onTimeUpdate"
                                            @play="onVideoPlay"
                                            @pause="onVideoPause"
                                            @error="onVideoError"
                                            @contextmenu.prevent
                                        >
                                            <source :src="getSecureVideoUrl(selectedVideo.video_path)" type="video/mp4" />
                                            Your browser does not support the video tag.
                                        </video>

                                        <!-- Watermark Overlay -->
                                        <div class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-5">
                                            <div class="rotate-[-25deg] select-none text-4xl font-bold text-white">
                                                {{ course.title }}
                                            </div>
                                        </div>

                                        <!-- Download Prevention Overlay -->
                                        <div
                                            class="pointer-events-none absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-black/80 to-transparent"
                                        ></div>
                                    </div>
                                </div>

                                <!-- SKIP CONTROLS - WITH COMPLETE EVENT STOPPAGE -->
                                <div v-if="selectedVideo" class="mb-4 flex items-center justify-center gap-4" @click.stop>
                                    <button
                                        @click.stop="skipBackward"
                                        @mousedown.stop
                                        class="rounded-full bg-white/10 px-4 py-2 text-white transition-all hover:scale-105 hover:bg-white/20"
                                    >
                                        <span class="flex items-center gap-2">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7"
                                                />
                                            </svg>
                                            10s
                                        </span>
                                    </button>
                                    <span class="text-white/40">|</span>
                                    <span class="flex items-center gap-2 text-sm text-white/60">
                                        <kbd class="rounded bg-white/10 px-2 py-1 text-xs">←</kbd>
                                        <span>or</span>
                                        <kbd class="rounded bg-white/10 px-2 py-1 text-xs">J</kbd>
                                        <span class="mx-1 text-white/30">•</span>
                                        <kbd class="rounded bg-white/10 px-2 py-1 text-xs">→</kbd>
                                        <span>or</span>
                                        <kbd class="rounded bg-white/10 px-2 py-1 text-xs">L</kbd>
                                    </span>
                                    <span class="text-white/40">|</span>
                                    <button
                                        @click.stop="skipForward"
                                        @mousedown.stop
                                        class="rounded-full bg-white/10 px-4 py-2 text-white transition-all hover:scale-105 hover:bg-white/20"
                                    >
                                        <span class="flex items-center gap-2">
                                            10s
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>

                                <!-- Current Video Info with Navigation -->
                                <div
                                    v-if="selectedVideo"
                                    class="mb-6 rounded-2xl bg-gradient-to-r from-indigo-600/20 to-purple-600/20 p-4 ring-1 ring-white/10"
                                >
                                    <div class="flex flex-wrap items-start justify-between gap-4">
                                        <div class="min-w-0 flex-1">
                                            <h3 class="flex items-center text-base font-semibold text-white md:text-lg">
                                                <span
                                                    class="mr-3 inline-block h-6 w-1 flex-shrink-0 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"
                                                ></span>
                                                <span class="truncate">{{ selectedVideo.title }}</span>
                                            </h3>
                                            <div class="mt-2 flex flex-wrap items-center gap-4 text-sm text-indigo-200">
                                                <span class="flex items-center">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                        />
                                                    </svg>
                                                    Duration: {{ selectedVideo.duration || 'N/A' }}
                                                </span>
                                                <span class="hidden text-indigo-400 sm:block">•</span>
                                                <span class="flex items-center">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                                        />
                                                    </svg>
                                                    Lesson {{ currentVideoIndex !== null ? currentVideoIndex + 1 : '?' }} of {{ sortedVideos.length }}
                                                </span>
                                                <span class="hidden text-indigo-400 sm:block">•</span>
                                                <span class="flex items-center text-indigo-300">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                        />
                                                    </svg>
                                                    {{ formatTime(currentTime) }} / {{ formatTime(videoDuration) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex flex-shrink-0 gap-2">
                                            <button
                                                @click="playPreviousVideo"
                                                :disabled="!hasPreviousVideo"
                                                class="rounded-xl bg-white/10 px-3 py-1.5 text-sm text-white transition-all hover:bg-white/20 disabled:cursor-not-allowed disabled:opacity-50 md:px-4 md:py-2"
                                            >
                                                Previous
                                            </button>
                                            <button
                                                @click="playNextVideo"
                                                :disabled="!hasNextVideo"
                                                class="rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-3 py-1.5 text-sm text-white transition-all hover:shadow-lg disabled:cursor-not-allowed disabled:opacity-50 md:px-4 md:py-2"
                                            >
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Video List -->
                                <div class="custom-scrollbar max-h-[400px] space-y-3 overflow-y-auto pr-2">
                                    <div
                                        v-for="(video, index) in sortedVideos"
                                        :key="video.id"
                                        @click="selectVideo(video)"
                                        :class="[
                                            'group cursor-pointer rounded-2xl border-2 p-4 transition-all hover:shadow-xl',
                                            selectedVideo?.id === video.id
                                                ? 'border-indigo-500 bg-indigo-500/20 shadow-lg shadow-indigo-500/20'
                                                : 'border-white/10 bg-white/5 hover:border-indigo-500/50 hover:bg-white/10',
                                        ]"
                                    >
                                        <div class="flex items-start justify-between gap-4">
                                            <div class="min-w-0 flex-1">
                                                <div class="flex items-center space-x-3">
                                                    <div
                                                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full font-bold"
                                                        :class="
                                                            selectedVideo?.id === video.id
                                                                ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/30'
                                                                : 'bg-white/10 text-indigo-300'
                                                        "
                                                    >
                                                        {{ video.order }}
                                                    </div>
                                                    <div class="min-w-0">
                                                        <h4 class="truncate font-medium text-white transition-colors group-hover:text-indigo-200">
                                                            {{ video.title }}
                                                        </h4>
                                                        <p class="text-sm text-indigo-200/60">Duration: {{ video.duration || 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-shrink-0 items-center space-x-2">
                                                <span
                                                    v-if="selectedVideo?.id === video.id"
                                                    class="inline-flex items-center rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 px-3 py-1 text-xs font-medium text-white shadow-lg shadow-indigo-500/30"
                                                >
                                                    <span class="mr-1.5 inline-block h-2 w-2 animate-pulse rounded-full bg-white"></span>
                                                    Playing
                                                </span>
                                                <span v-else-if="isVideoWatched(video)" class="text-emerald-400">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                        />
                                                    </svg>
                                                </span>
                                                <svg
                                                    class="h-5 w-5 text-indigo-400 transition-transform group-hover:translate-x-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else class="py-16 text-center">
                                <div class="relative inline-block">
                                    <div class="animate-ping-slow absolute inset-0 rounded-full bg-indigo-500/20"></div>
                                    <svg class="relative h-16 w-16 text-indigo-400/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-white">No videos available</h3>
                                <p class="mt-2 text-sm text-indigo-200">The course videos are not available yet.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Modal -->
                <PaymentModal :open="showPaymentModal" :course="course" @close="showPaymentModal = false" />

                <!-- Description Pop-up Modal -->
                <DescriptionModal
                    :open="showDescriptionModal"
                    :description="course.description"
                    :title="course.title"
                    @close="showDescriptionModal = false"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import DescriptionModal from '@/Components/DescriptionModal.vue';
import PaymentModal from '@/Components/PaymentModal.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { computed, nextTick, onBeforeUnmount, onMounted, ref } from 'vue';

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
const showDescriptionModal = ref(false);
const selectedVideo = ref<(typeof props.videos)[0] | null>(null);
const currentVideoIndex = ref<number | null>(null);
const videoPlayerRef = ref<HTMLVideoElement | null>(null);
const isPlaying = ref(false);
const currentTime = ref(0);
const videoDuration = ref(0);
const watchedVideos = ref<Set<number>>(new Set());
const isVideoLoading = ref(false);
const autoPlayTimer = ref<number | null>(null);
const videoKey = ref(0);
const skipAmount = 10;

const sortedVideos = computed(() => {
    if (!props.videos) return [];
    return [...props.videos].sort((a, b) => a.order - b.order);
});

const hasNextVideo = computed(() => {
    if (currentVideoIndex.value === null) return false;
    return currentVideoIndex.value < sortedVideos.value.length - 1;
});

const hasPreviousVideo = computed(() => {
    if (currentVideoIndex.value === null) return false;
    return currentVideoIndex.value > 0;
});

const formatTime = (seconds: number) => {
    if (!seconds || isNaN(seconds)) return '0:00';
    const mins = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${mins}:${secs.toString().padStart(2, '0')}`;
};

const skipForward = (event) => {
    if (event) event.stopPropagation();
    if (videoPlayerRef.value) {
        const video = videoPlayerRef.value;
        video.currentTime = Math.min(video.currentTime + 10, video.duration || 0);
    }
};
const skipBackward = (event) => {
    if (event) event.stopPropagation();
    if (videoPlayerRef.value) {
        const video = videoPlayerRef.value;
        video.currentTime = Math.max(video.currentTime - 10, 0);
    }
};

// KEYBOARD SHORTCUTS
const handleKeydown = (event: KeyboardEvent) => {
    if (event.target instanceof HTMLInputElement || event.target instanceof HTMLTextAreaElement || event.target instanceof HTMLSelectElement) {
        return;
    }

    if (event.key === 'ArrowRight' || event.key === 'l' || event.key === 'L') {
        event.preventDefault();
        skipForward();
    }

    if (event.key === 'ArrowLeft' || event.key === 'j' || event.key === 'J') {
        event.preventDefault();
        skipBackward();
    }

    if (event.key === ' ' || event.key === 'Space') {
        event.preventDefault();
        if (videoPlayerRef.value) {
            if (videoPlayerRef.value.paused) {
                videoPlayerRef.value.play();
            } else {
                videoPlayerRef.value.pause();
            }
        }
    }
};

const getSecureVideoUrl = (videoPath: string) => {
    if (!videoPath) return '';
    if (videoPath.startsWith('http://') || videoPath.startsWith('https://')) {
        const url = new URL(videoPath);
        url.searchParams.set('token', generateToken());
        return url.toString();
    }
    const baseUrl = `/storage/${videoPath}`;
    const secureUrl = new URL(baseUrl, window.location.origin);
    secureUrl.searchParams.set('token', generateToken());
    secureUrl.searchParams.set('user_id', getUserId());
    secureUrl.searchParams.set('course_id', props.course.id.toString());
    secureUrl.searchParams.set('expires', Date.now() + 3600000);
    return secureUrl.toString();
};

const generateToken = () => {
    return btoa(`${Date.now()}-${getUserId()}-${props.course.id}`);
};

const getUserId = () => {
    if (props.$page && props.$page.props && props.$page.props.auth && props.$page.props.auth.user) {
        return props.$page.props.auth.user.id || 'guest';
    }
    return 'guest';
};

const playNextVideo = () => {
    if (!hasNextVideo.value || currentVideoIndex.value === null) return;
    selectVideoByIndex(currentVideoIndex.value + 1);
};

const playPreviousVideo = () => {
    if (!hasPreviousVideo.value || currentVideoIndex.value === null) return;
    selectVideoByIndex(currentVideoIndex.value - 1);
};

const selectVideoByIndex = (index: number) => {
    if (index < 0 || index >= sortedVideos.value.length) return;
    const video = sortedVideos.value[index];
    if (video) selectVideo(video);
};

const onVideoLoaded = (event: Event) => {
    const video = event.target as HTMLVideoElement;
    videoDuration.value = video.duration || 0;
    isVideoLoading.value = false;
    if (video) {
        video.play().catch(() => {
            isPlaying.value = false;
        });
    }
};

const onVideoEnded = () => {
    if (selectedVideo.value) {
        watchedVideos.value.add(selectedVideo.value.id);
    }
    if (hasNextVideo.value) {
        if (autoPlayTimer.value) clearTimeout(autoPlayTimer.value);
        autoPlayTimer.value = setTimeout(() => {
            playNextVideo();
        }, 2000);
    }
};

const onTimeUpdate = (event: Event) => {
    const video = event.target as HTMLVideoElement;
    currentTime.value = video.currentTime || 0;
    if (selectedVideo.value && videoDuration.value > 0) {
        const progress = video.currentTime / videoDuration.value;
        if (progress >= 0.9) {
            watchedVideos.value.add(selectedVideo.value.id);
        }
    }
};

const onVideoPlay = () => {
    isPlaying.value = true;
    if (autoPlayTimer.value) {
        clearTimeout(autoPlayTimer.value);
        autoPlayTimer.value = null;
    }
};

const onVideoPause = () => {
    isPlaying.value = false;
};
const onVideoError = (event: Event) => {
    console.error('Video loading error:', event);
    isVideoLoading.value = false;
};

const isVideoWatched = (video: any) => watchedVideos.value.has(video.id);

const selectVideo = (video: (typeof props.videos)[0]) => {
    if (isVideoLoading.value) return;
    if (autoPlayTimer.value) {
        clearTimeout(autoPlayTimer.value);
        autoPlayTimer.value = null;
    }
    if (videoPlayerRef.value) {
        videoPlayerRef.value.pause();
        videoPlayerRef.value.currentTime = 0;
        videoPlayerRef.value.src = '';
        videoPlayerRef.value.load();
    }
    selectedVideo.value = video;
    const index = sortedVideos.value.findIndex((v) => v.id === video.id);
    currentVideoIndex.value = index;
    currentTime.value = 0;
    videoDuration.value = 0;
    isPlaying.value = false;
    isVideoLoading.value = true;
    videoKey.value++;
    nextTick(() => {
        if (videoPlayerRef.value) {
            const videoElement = videoPlayerRef.value;
            videoElement.src = getSecureVideoUrl(video.video_path);
            videoElement.load();
            setTimeout(() => {
                if (videoElement) {
                    videoElement.play().catch(() => {
                        isPlaying.value = false;
                    });
                }
            }, 100);
        }
    });
};

onMounted(() => {
    if (props.isEnrolled && props.enrollmentStatus === 'verified' && props.videos && props.videos.length > 0) {
        const sorted = sortedVideos.value;
        if (sorted.length > 0) selectVideo(sorted[0]);
    }
    document.addEventListener('keydown', handleKeydown, true);
});

onBeforeUnmount(() => {
    if (autoPlayTimer.value) {
        clearTimeout(autoPlayTimer.value);
        autoPlayTimer.value = null;
    }
    if (videoPlayerRef.value) {
        videoPlayerRef.value.pause();
        videoPlayerRef.value.currentTime = 0;
        videoPlayerRef.value.src = '';
        videoPlayerRef.value.load();
        videoPlayerRef.value = null;
    }
    document.removeEventListener('keydown', handleKeydown, true);
});
</script>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@keyframes floatUp {
    from {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
@keyframes pingSlow {
    0% {
        transform: scale(1);
        opacity: 0.3;
    }
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}
@keyframes spinSlow {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out forwards;
}
.animate-float-up {
    animation: floatUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    opacity: 0;
}
.animate-slide-in-left {
    animation: slideInLeft 0.6s ease-out forwards;
    opacity: 0;
}
.animate-ping-slow {
    animation: pingSlow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
.animate-spin-slow {
    animation: spinSlow 3s linear infinite;
}
.animation-delay-100 {
    animation-delay: 100ms;
}
.animation-delay-200 {
    animation-delay: 200ms;
}

.hover\:shadow-glow:hover {
    text-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
}

.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.3);
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(99, 102, 241, 0.5);
}

video {
    background: #000;
    position: relative;
}
video::-webkit-media-controls-panel {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
}
video::-webkit-media-controls-download-button {
    display: none !important;
}
video::-webkit-media-controls-enclosure {
    overflow: hidden;
}
video::-webkit-media-controls-picture-in-picture-button {
    display: none !important;
}
video::-webkit-media-controls-remote-playback-button {
    display: none !important;
}
video {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-user-drag: none;
}

.pointer-events-none {
    pointer-events: none;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

kbd {
    font-family: monospace;
    font-size: 0.75rem;
    padding: 0.125rem 0.5rem;
    border-radius: 0.25rem;
    background: rgba(255, 255, 255, 0.1);
}
</style>
