<!-- resources/js/pages/Landing/About.vue -->
<template>
    <AuthenticatedLayout>
        <div class="relative min-h-screen overflow-hidden bg-black py-16">
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
                    v-for="n in 25"
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
                <!-- Page Header -->
                <div class="animate-fade-in text-center">
                    <div
                        class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-white/90 backdrop-blur-xl transition-all duration-300 hover:shadow-xl hover:shadow-purple-500/10"
                    >
                        <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent"> About Us </span>
                    </div>
                    <h1 class="text-5xl font-bold text-white sm:text-6xl">
                        About Our
                        <span class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                            >Institute</span
                        >
                    </h1>
                    <p class="mx-auto mt-4 max-w-2xl text-xl text-gray-400">
                        Empowering the next generation of IT professionals with world-class education
                    </p>
                </div>

                <!-- Mission & Vision Section -->
                <div class="animate-slide-up mt-16 grid gap-12 lg:grid-cols-2" style="animation-delay: 0.2s">
                    <!-- Mission -->
                    <div class="group relative">
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-2xl transition-opacity duration-700 group-hover:opacity-100"
                        ></div>
                        <div
                            class="relative rounded-3xl border border-white/10 bg-white/5 p-10 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <div class="mb-6 inline-flex rounded-2xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 p-4">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h2 class="mb-4 text-3xl font-bold text-white">Our Mission</h2>
                            <p class="text-lg leading-relaxed text-gray-300">
                                At IT Institute, we are committed to providing high-quality education that bridges the gap between academic learning
                                and industry requirements. Our mission is to empower individuals with the skills and knowledge they need to succeed in
                                the ever-evolving world of technology.
                            </p>
                            <div class="mt-8 space-y-4">
                                <div v-for="(item, index) in missionItems" :key="index" class="group/item flex items-start space-x-4">
                                    <div class="mt-1 flex-shrink-0">
                                        <div
                                            class="rounded-lg border border-white/10 bg-gradient-to-r from-blue-500/20 to-purple-500/20 p-1.5 transition-transform duration-300 group-hover/item:scale-110"
                                        >
                                            <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-gray-300 transition-colors duration-300 group-hover/item:text-white">{{ item }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vision/Image -->
                    <div class="animate-float-card group relative">
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-500/10 to-pink-500/10 opacity-0 blur-2xl transition-opacity duration-700 group-hover:opacity-100"
                        ></div>
                        <div
                            class="relative overflow-hidden rounded-3xl border border-white/10 transition-all duration-500 group-hover:border-white/20"
                        >
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                            ></div>
                            <img
                                src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop"
                                alt="About us"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                            />
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-8">
                                <div class="flex items-center gap-3">
                                    <svg class="h-6 w-6 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span class="font-medium text-white">Committed to Excellence</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Core Values Section -->
                <div class="mt-24">
                    <div class="animate-fade-in text-center" style="animation-delay: 0.4s">
                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-white/90 backdrop-blur-xl"
                        >
                            <svg class="h-4 w-4 animate-pulse text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text font-semibold text-transparent">
                                Our Core Values
                            </span>
                        </div>
                        <h2 class="text-4xl font-bold text-white">
                            What Drives <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Us</span>
                        </h2>
                        <p class="mt-4 text-lg text-gray-400">The principles that guide everything we do</p>
                    </div>

                    <div class="mt-12 grid gap-8 md:grid-cols-3">
                        <div
                            v-for="(value, index) in coreValues"
                            :key="index"
                            class="animate-slide-up group relative"
                            :style="{ animationDelay: 0.6 + index * 0.1 + 's' }"
                        >
                            <div
                                class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-2xl transition-opacity duration-700 group-hover:opacity-100"
                            ></div>
                            <div
                                class="relative rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <!-- Icon with animated gradient -->
                                <div
                                    class="relative mb-6 inline-flex overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 p-4 transition-transform duration-500 group-hover:scale-110"
                                >
                                    <div class="absolute inset-0 animate-pulse bg-gradient-to-r from-blue-500/30 to-purple-500/30"></div>
                                    <component :is="value.icon" class="relative z-10 h-8 w-8 text-white" />
                                </div>
                                <h3 class="mb-3 text-2xl font-semibold text-white">{{ value.title }}</h3>
                                <p class="leading-relaxed text-gray-400">{{ value.description }}</p>

                                <!-- Animated indicator -->
                                <div
                                    class="mt-6 h-1 w-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-700 group-hover:w-full"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="animate-slide-up mt-24" style="animation-delay: 0.8s">
                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 p-12 backdrop-blur-xl transition-all duration-500 hover:border-white/20"
                    >
                        <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                            <div v-for="(stat, index) in stats" :key="index" class="group text-center">
                                <div
                                    class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-4xl font-bold text-transparent md:text-5xl"
                                >
                                    {{ stat.value }}
                                </div>
                                <div class="mt-2 text-sm text-gray-400 transition-colors duration-300 group-hover:text-white">
                                    {{ stat.label }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="mt-24">
                    <div class="animate-fade-in text-center" style="animation-delay: 1s">
                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-white/90 backdrop-blur-xl"
                        >
                            <svg class="h-4 w-4 animate-pulse text-pink-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
                                />
                            </svg>
                            <span class="bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text font-semibold text-transparent"> Meet Our Team </span>
                        </div>
                        <h2 class="text-4xl font-bold text-white">
                            Our <span class="bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text text-transparent">Experts</span>
                        </h2>
                        <p class="mt-4 text-lg text-gray-400">Passionate professionals dedicated to your success</p>
                    </div>

                    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                        <div
                            v-for="(member, index) in teamMembers"
                            :key="index"
                            class="animate-slide-up group relative"
                            :style="{ animationDelay: 1.2 + index * 0.1 + 's' }"
                        >
                            <div
                                class="absolute inset-0 rounded-3xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-2xl transition-opacity duration-700 group-hover:opacity-100"
                            ></div>
                            <div
                                class="relative rounded-3xl border border-white/10 bg-white/5 p-6 text-center backdrop-blur-xl transition-all duration-500 hover:scale-105 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                            >
                                <div
                                    class="relative mx-auto h-32 w-32 overflow-hidden rounded-full border-2 border-white/10 transition-all duration-500 group-hover:border-white/20"
                                >
                                    <img
                                        :src="member.image"
                                        :alt="member.name"
                                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                    ></div>
                                </div>
                                <h3 class="mt-4 text-lg font-semibold text-white">{{ member.name }}</h3>
                                <p class="text-sm text-blue-400">{{ member.role }}</p>
                                <p class="mt-2 text-sm text-gray-400">{{ member.bio }}</p>

                                <!-- Social icons -->
                                <div class="mt-4 flex justify-center gap-3">
                                    <a
                                        v-for="(social, idx) in member.socials"
                                        :key="idx"
                                        :href="social.url"
                                        class="transform text-gray-500 transition-colors duration-300 hover:scale-110 hover:text-white"
                                    >
                                        <component :is="social.icon" class="h-4 w-4" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="animate-slide-up mt-24" style="animation-delay: 1.4s">
                    <div
                        class="rounded-4xl relative overflow-hidden border border-white/10 bg-gradient-to-br from-blue-600/10 via-purple-600/10 to-pink-600/10 p-12 text-center backdrop-blur-xl md:p-16"
                    >
                        <!-- Decorative elements -->
                        <div class="absolute -right-40 -top-40 h-80 w-80 rounded-full bg-blue-500/10 blur-3xl"></div>
                        <div class="absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-pink-500/10 blur-3xl"></div>
                        <div
                            class="absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-purple-500/5 blur-3xl"
                        ></div>

                        <div class="relative">
                            <div
                                class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-2 text-sm text-white/90 backdrop-blur-xl"
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
                            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                                Ready to Start Your
                                <span
                                    class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                                    >Journey</span
                                >?
                            </h2>
                            <p class="mx-auto max-w-2xl text-xl text-gray-300">Join thousands of students who are building their careers in IT</p>
                            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                                <Link
                                    v-if="$page.props.auth.user"
                                    :href="route('dashboard')"
                                    class="group relative inline-flex items-center overflow-hidden rounded-full px-10 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-110"
                                >
                                    <span
                                        class="animate-gradient-x absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                    ></span>
                                    <span
                                        class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"
                                    ></span>
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
                                    <span
                                        class="absolute inset-[2px] rounded-full bg-black transition-all duration-500 group-hover:bg-opacity-0"
                                    ></span>
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
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

// Mission items
const missionItems = [
    'Industry-relevant curriculum designed by experts',
    'Hands-on practical training with real-world projects',
    'Career guidance and job placement assistance',
    'Continuous learning and skill development',
];

// Core Values
const coreValues = [
    {
        icon: 'ShieldIcon',
        title: 'Excellence',
        description: 'We strive for excellence in everything we do, from teaching to student support and beyond.',
    },
    {
        icon: 'LightbulbIcon',
        title: 'Innovation',
        description: 'We embrace innovation and continuously update our courses to stay current with industry trends.',
    },
    {
        icon: 'UsersIcon',
        title: 'Community',
        description: 'We foster a supportive community where students can learn, grow, and succeed together.',
    },
];

// Stats
const stats = [
    { value: '5K+', label: 'Students' },
    { value: '50+', label: 'Courses' },
    { value: '30+', label: 'Instructors' },
    { value: '95%', label: 'Success Rate' },
];

// Team Members
const teamMembers = [
    {
        name: 'Dr. Sarah Ahmed',
        role: 'Founder & CEO',
        bio: '20+ years in IT education',
        image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&h=150&fit=crop&crop=face',
        socials: [
            { icon: 'LinkedinIcon', url: '#' },
            { icon: 'TwitterIcon', url: '#' },
        ],
    },
    {
        name: 'Prof. James Wilson',
        role: 'Head of Academics',
        bio: 'PhD in Computer Science',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
        socials: [
            { icon: 'LinkedinIcon', url: '#' },
            { icon: 'TwitterIcon', url: '#' },
        ],
    },
    {
        name: 'Dr. Maria Khan',
        role: 'Senior Instructor',
        bio: 'AI & Machine Learning Expert',
        image: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face',
        socials: [
            { icon: 'LinkedinIcon', url: '#' },
            { icon: 'TwitterIcon', url: '#' },
        ],
    },
    {
        name: 'David Chen',
        role: 'Career Counselor',
        bio: 'Helping students succeed',
        image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
        socials: [
            { icon: 'LinkedinIcon', url: '#' },
            { icon: 'TwitterIcon', url: '#' },
        ],
    },
];
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

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
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

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
    opacity: 0;
}

.animate-slide-up {
    animation: slide-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float-card {
    animation: float-card 3s ease-in-out infinite;
}

/* Pulse Animation */
.animate-pulse {
    animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
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

/* Glassmorphism */
.backdrop-blur-xl {
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

/* Hover transitions */
.transition-all {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Gradient text */
.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}
</style>
