<!-- resources/js/pages/Landing/Index.vue -->
<template>
    <AuthenticatedLayout>
        <!-- Hero Section - Enhanced -->
        <section class="relative -mt-6 flex min-h-screen items-center overflow-hidden bg-black">
            <!-- Animated Background - More dynamic -->
            <div class="absolute inset-0">
                <!-- Orbiting gradient orbs -->
                <div class="animate-orbit-slow absolute left-1/4 top-1/4 h-96 w-96 rounded-full bg-purple-600/20 blur-3xl"></div>
                <div class="animate-orbit-reverse absolute bottom-1/4 right-1/4 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
                <div
                    class="animate-pulse-glow absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-600/10 blur-3xl"
                ></div>

                <!-- Animated grid with perspective -->
                <div class="perspective-1000 absolute inset-0">
                    <div
                        class="bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.05%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rotate-x-12 absolute inset-0 scale-150 transform"
                    ></div>
                </div>
            </div>

            <!-- Floating Particles - More sophisticated -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    v-for="n in 30"
                    :key="n"
                    class="animate-float-particle absolute rounded-full"
                    :class="[
                        n % 3 === 0
                            ? 'bg-gradient-to-r from-blue-400/30 to-purple-400/30'
                            : n % 3 === 1
                              ? 'bg-gradient-to-r from-purple-400/30 to-pink-400/30'
                              : 'bg-gradient-to-r from-pink-400/30 to-red-400/30',
                    ]"
                    :style="{
                        left: Math.random() * 100 + '%',
                        top: Math.random() * 100 + '%',
                        animationDelay: Math.random() * 8 + 's',
                        animationDuration: 4 + Math.random() * 6 + 's',
                        width: Math.random() * 6 + 2 + 'px',
                        height: Math.random() * 6 + 2 + 'px',
                        boxShadow: '0 0 20px rgba(139, 92, 246, 0.3)',
                    }"
                ></div>
            </div>

            <div class="relative mx-auto w-full max-w-7xl px-4 py-24 sm:px-6 lg:px-8 lg:py-32">
                <div class="text-center">
                    <!-- Animated Badge - Enhanced with glow -->
                    <div
                        class="animate-slide-down mb-8 inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-white/90 shadow-2xl shadow-purple-500/10 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:shadow-purple-500/20"
                    >
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-400"></span>
                        </span>
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                            🚀 Empowering the next generation of IT professionals
                        </span>
                    </div>

                    <!-- Main Heading - With 3D text effect -->
                    <h1 class="animate-fade-in text-5xl font-bold tracking-tight sm:text-6xl lg:text-8xl">
                        <span class="text-white">Build Your Future in</span>
                        <br />
                        <span class="relative mt-2 inline-block">
                            <span
                                class="animate-gradient-x relative bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                            >
                                IT
                            </span>
                            <!-- Animated underline -->
                            <svg class="absolute -bottom-3 left-0 h-3 w-full" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="underlineGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color: #60a5fa; stop-opacity: 0.8" />
                                        <stop offset="50%" style="stop-color: #a78bfa; stop-opacity: 0.8" />
                                        <stop offset="100%" style="stop-color: #f472b6; stop-opacity: 0.8" />
                                    </linearGradient>
                                </defs>
                                <path
                                    d="M0 5 Q25 -2 50 5 T100 5"
                                    stroke="url(#underlineGrad)"
                                    stroke-width="3"
                                    fill="none"
                                    class="animate-draw-line"
                                />
                            </svg>
                        </span>
                    </h1>

                    <p class="animate-fade-in animation-delay-200 mx-auto mt-8 max-w-3xl text-xl leading-relaxed text-gray-300">
                        Master the skills that matter. Our comprehensive IT courses are designed to prepare you for a successful career in technology.
                    </p>

                    <!-- CTA Buttons - Enhanced -->
                    <div class="animate-fade-in animation-delay-400 mt-10 flex flex-wrap items-center justify-center gap-4">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="group relative inline-flex items-center overflow-hidden rounded-full px-8 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-110"
                        >
                            <span
                                class="animate-gradient-x absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                            ></span>
                            <span class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"></span>
                            <span class="relative z-10 flex items-center gap-2">
                                Go to Dashboard
                                <svg
                                    class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-2 group-hover:rotate-[-45deg]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </Link>
                        <template v-else>
                            <Link
                                :href="route('register')"
                                class="group relative inline-flex items-center overflow-hidden rounded-full px-8 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-110"
                            >
                                <span
                                    class="animate-gradient-x absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                ></span>
                                <span class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Get Started
                                    <svg
                                        class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-2 group-hover:rotate-[-45deg]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </Link>
                            <Link
                                :href="route('login')"
                                class="group relative inline-flex items-center rounded-full border-2 border-white/20 px-8 py-4 text-base font-medium text-white backdrop-blur-sm transition-all duration-500 hover:scale-110 hover:border-white/50 hover:bg-white/10"
                            >
                                Login
                            </Link>
                        </template>
                        <Link
                            :href="route('courses.public.index')"
                            class="group relative inline-flex items-center rounded-full border-2 border-white/20 px-8 py-4 text-base font-medium text-white backdrop-blur-sm transition-all duration-500 hover:scale-110 hover:border-white/50 hover:bg-white/10"
                        >
                            Browse Courses
                            <svg
                                class="ml-2 h-5 w-5 transition-transform duration-300 group-hover:translate-x-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </Link>
                    </div>

                    <!-- Stats - Enhanced with 3D cards -->
                    <div class="mx-auto mt-20 grid max-w-3xl grid-cols-1 gap-6 sm:grid-cols-3">
                        <div
                            v-for="(stat, index) in statsCards"
                            :key="index"
                            class="animate-float-card group relative"
                            :style="{ animationDelay: index * 0.2 + 's' }"
                        >
                            <div
                                class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/20 to-purple-500/20 opacity-0 blur-2xl transition-all duration-500 group-hover:scale-110 group-hover:opacity-100"
                            ></div>
                            <div
                                class="relative cursor-pointer rounded-2xl border border-white/10 bg-white/5 px-6 py-6 backdrop-blur-xl transition-all duration-500 hover:scale-110 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/20"
                            >
                                <div class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-4xl font-bold text-transparent">
                                    {{ stat.value }}+
                                </div>
                                <div class="mt-1 text-sm text-gray-300">{{ stat.label }}</div>
                                <div class="absolute -right-2 -top-2 h-16 w-16 rounded-full bg-purple-500/10 blur-xl"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Scroll indicator -->
                    <div class="mt-16 animate-bounce">
                        <svg class="mx-auto h-6 w-6 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Courses - Enhanced -->
        <section class="relative overflow-hidden bg-gradient-to-b from-black via-gray-900/90 to-black py-24">
            <!-- Background effects -->
            <div class="absolute inset-0">
                <div class="absolute left-0 top-0 h-px w-full bg-gradient-to-r from-transparent via-purple-500/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-blue-500/30 to-transparent"></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center">
                    <div
                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-gray-300 backdrop-blur-xl transition-all duration-300 hover:shadow-xl hover:shadow-purple-500/10"
                    >
                        <svg class="h-4 w-4 animate-pulse text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text font-semibold text-transparent">
                            Top Rated Courses
                        </span>
                    </div>
                    <h2 class="text-5xl font-bold text-white">
                        Featured <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Courses</span>
                    </h2>
                    <p class="mt-4 text-xl text-gray-400">Discover our most popular courses and start learning today</p>
                </div>

                <!-- Course Grid -->
                <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="(course, index) in featuredCourses"
                        :key="course.id"
                        class="animate-fade-in"
                        :style="{ animationDelay: index * 0.1 + 's' }"
                    >
                        <CourseCard :course="course" />
                    </div>
                </div>
                <div class="mt-16 rounded-3xl border border-white/10 bg-white/5 py-20 text-center backdrop-blur-xl">
                    <svg class="mx-auto h-16 w-16 animate-pulse text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                    </svg>
                    <p class="mt-4 text-lg text-gray-400">No courses available yet. Check back soon!</p>
                </div>

                <!-- View All Button -->
                <div class="mt-12 text-center">
                    <Link
                        :href="route('courses.public.index')"
                        class="group inline-flex items-center rounded-full border border-white/20 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10 px-10 py-4 text-base font-medium text-white backdrop-blur-sm transition-all duration-500 hover:scale-105 hover:border-white/40 hover:shadow-2xl hover:shadow-purple-500/20"
                    >
                        View All Courses
                        <svg
                            class="ml-2 h-5 w-5 transition-all duration-300 group-hover:translate-x-2 group-hover:rotate-[-45deg]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Why Choose Us - Enhanced -->
        <section class="relative bg-gradient-to-b from-black via-gray-900/50 to-black py-24">
            <div class="absolute inset-0">
                <div
                    class="absolute left-1/2 top-1/2 h-[800px] w-[800px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gradient-to-r from-blue-600/5 to-purple-600/5 blur-3xl"
                ></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <div
                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-gray-300 backdrop-blur-xl"
                    >
                        <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent"> Why Choose Us </span>
                    </div>
                    <h2 class="text-5xl font-bold text-white">
                        Why Choose Our <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Institute</span>?
                    </h2>
                    <p class="mt-4 text-xl text-gray-400">We provide the best learning experience for our students</p>
                </div>

                <div class="mt-16 grid gap-8 md:grid-cols-3">
                    <div
                        v-for="(feature, index) in features"
                        :key="index"
                        class="animate-fade-in group relative rounded-3xl border border-white/10 bg-gradient-to-b from-white/5 to-white/0 p-10 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        :style="{ animationDelay: index * 0.15 + 's' }"
                    >
                        <!-- Glowing background -->
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/0 via-purple-500/0 to-pink-500/0 opacity-0 transition-all duration-500 group-hover:opacity-10"
                        ></div>

                        <div class="relative">
                            <!-- Icon with animated gradient -->
                            <div
                                class="relative mb-6 inline-flex overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 p-4 transition-transform duration-500 group-hover:scale-110"
                            >
                                <div class="absolute inset-0 animate-pulse bg-gradient-to-r from-blue-500/20 to-purple-500/20"></div>
                                <component :is="feature.icon" class="relative z-10 h-8 w-8 text-white" />
                            </div>

                            <h3 class="mb-4 text-2xl font-semibold text-white">{{ feature.title }}</h3>
                            <p class="text-lg leading-relaxed text-gray-400">{{ feature.description }}</p>

                            <!-- Animated learn more -->
                            <div
                                class="mt-6 flex items-center text-sm text-blue-400 opacity-0 transition-all duration-500 group-hover:translate-x-2 group-hover:opacity-100"
                            >
                                Learn more
                                <svg
                                    class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:translate-x-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section - Enhanced -->
        <section class="relative overflow-hidden bg-black py-24">
            <!-- Animated background -->
            <div class="absolute inset-0">
                <div
                    class="absolute left-1/2 top-1/2 h-[1000px] w-[1000px] -translate-x-1/2 -translate-y-1/2 animate-pulse rounded-full bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 blur-3xl"
                ></div>
                <div class="animate-orbit-slow absolute -right-40 -top-40 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
                <div class="animate-orbit-reverse absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-pink-500/10 blur-3xl"></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="rounded-4xl relative overflow-hidden border border-white/10 bg-gradient-to-br from-blue-600/10 via-purple-600/10 to-pink-600/10 p-16 text-center backdrop-blur-xl md:p-20"
                >
                    <!-- Decorative elements -->
                    <div class="absolute -right-40 -top-40 h-80 w-80 rounded-full bg-blue-500/10 blur-3xl"></div>
                    <div class="absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-pink-500/10 blur-3xl"></div>

                    <!-- Floating particles -->
                    <div
                        v-for="n in 10"
                        :key="n"
                        class="animate-float-particle absolute h-1 w-1 rounded-full bg-white/20"
                        :style="{
                            left: Math.random() * 100 + '%',
                            top: Math.random() * 100 + '%',
                            animationDelay: Math.random() * 5 + 's',
                            animationDuration: 3 + Math.random() * 4 + 's',
                        }"
                    ></div>

                    <div class="relative">
                        <div
                            class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-gray-300 backdrop-blur-xl"
                        >
                            <svg class="h-4 w-4 animate-pulse text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text font-semibold text-transparent">
                                Join Our Community
                            </span>
                        </div>

                        <h2 class="mb-6 text-5xl font-bold text-white md:text-6xl">
                            Ready to Start Your
                            <span class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                                >Journey</span
                            >?
                        </h2>

                        <p class="mx-auto mt-4 max-w-2xl text-xl leading-relaxed text-gray-300">
                            Join thousands of students who are building their careers in IT
                        </p>

                        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                            <Link
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                class="group relative inline-flex items-center overflow-hidden rounded-full px-10 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-110"
                            >
                                <span
                                    class="animate-gradient-x absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                ></span>
                                <span class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Go to Dashboard
                                    <svg
                                        class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-2 group-hover:rotate-[-45deg]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </Link>
                            <Link
                                v-else
                                :href="route('register')"
                                class="group relative inline-flex items-center overflow-hidden rounded-full px-10 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-110"
                            >
                                <span
                                    class="animate-gradient-x absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                ></span>
                                <span class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Get Started Today
                                    <svg
                                        class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-2 group-hover:rotate-[-45deg]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

<script setup>
import CourseCard from '@/Components/CourseCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

// Stats data
const statsCards = computed(() => {
    const stats = page.props.stats || {};
    return [
        { value: stats.total_courses || 100, label: 'Courses' },
        { value: stats.total_students || 300, label: 'Students' },
        { value: stats.total_categories || 14, label: 'Categories' },
    ];
});

// Featured courses
const featuredCourses = computed(() => {
    return page.props.featuredCourses || [];
});

// Features data with icons
const features = [
    {
        icon: 'BookOpenIcon',
        title: 'Expert Instructors',
        description: 'Learn from industry professionals with years of experience in their fields.',
    },
    {
        icon: 'CodeIcon',
        title: 'Practical Learning',
        description: 'Hands-on projects and real-world scenarios to prepare you for the industry.',
    },
    {
        icon: 'BriefcaseIcon',
        title: 'Career Support',
        description: 'Job placement assistance, resume building, and interview preparation.',
    },
];
</script>

<style scoped>
/* Animation Keyframes */
@keyframes float-particle {
    0%,
    100% {
        transform: translateY(0px) translateX(0px) rotate(0deg);
        opacity: 0.3;
    }
    25% {
        transform: translateY(-30px) translateX(10px) rotate(90deg);
        opacity: 0.8;
    }
    50% {
        transform: translateY(-10px) translateX(-10px) rotate(180deg);
        opacity: 0.5;
    }
    75% {
        transform: translateY(-40px) translateX(5px) rotate(270deg);
        opacity: 0.9;
    }
}

@keyframes orbit-slow {
    0% {
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    33% {
        transform: translate(30px, -20px) scale(1.2);
        opacity: 0.6;
    }
    66% {
        transform: translate(-20px, 10px) scale(0.8);
        opacity: 0.4;
    }
    100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
}

@keyframes orbit-reverse {
    0% {
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    33% {
        transform: translate(-30px, 20px) scale(1.2);
        opacity: 0.6;
    }
    66% {
        transform: translate(20px, -10px) scale(0.8);
        opacity: 0.4;
    }
    100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
}

@keyframes pulse-glow {
    0%,
    100% {
        opacity: 0.3;
        transform: scale(1);
    }
    50% {
        opacity: 0.6;
        transform: scale(1.1);
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

@keyframes draw-line {
    0% {
        stroke-dashoffset: 200;
    }
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes float-card {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Animation Classes */
.animate-float-particle {
    animation: float-particle 6s ease-in-out infinite;
}

.animate-orbit-slow {
    animation: orbit-slow 8s ease-in-out infinite;
}

.animate-orbit-reverse {
    animation: orbit-reverse 8s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 4s ease-in-out infinite;
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-draw-line {
    stroke-dasharray: 200;
    stroke-dashoffset: 200;
    animation: draw-line 2s ease-out forwards;
}

.animate-float-card {
    animation: float-card 3s ease-in-out infinite;
}

/* Fade In Animations */
.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
    opacity: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-down {
    animation: slideDown 0.6s ease-out forwards;
    opacity: 0;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Delay Classes */
.animation-delay-200 {
    animation-delay: 0.2s;
}

.animation-delay-400 {
    animation-delay: 0.4s;
}

/* Perspective */
.perspective-1000 {
    perspective: 1000px;
}

/* Rounded corners */
.rounded-4xl {
    border-radius: 2.5rem;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #0a0a0a;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}

/* Smooth scroll */
html {
    scroll-behavior: smooth;
}

/* Glassmorphism improvements */
.backdrop-blur-xl {
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

/* Hover effects */
.hover\:scale-110:hover {
    transform: scale(1.1);
}

.hover\:scale-105:hover {
    transform: scale(1.05);
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
