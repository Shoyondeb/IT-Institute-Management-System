<!-- resources/js/pages/Landing/Contact.vue -->
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
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent"> Get in Touch </span>
                    </div>
                    <h1 class="text-5xl font-bold text-white sm:text-6xl">
                        Contact
                        <span class="animate-gradient-x bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent"
                            >Us</span
                        >
                    </h1>
                    <p class="mx-auto mt-4 max-w-2xl text-xl text-gray-400">Have questions? We'd love to hear from you. Our team is ready to help.</p>
                </div>

                <div class="mt-16 grid gap-12 lg:grid-cols-2">
                    <!-- Contact Information -->
                    <div class="animate-slide-up" style="animation-delay: 0.2s">
                        <div
                            class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <h3 class="mb-4 text-2xl font-semibold text-white">Get in Touch</h3>
                            <p class="leading-relaxed text-gray-400">Fill out the form and our team will get back to you as soon as possible.</p>

                            <div class="mt-10 space-y-6">
                                <div
                                    v-for="(contact, index) in contactInfo"
                                    :key="index"
                                    class="group flex items-start space-x-4 rounded-2xl p-4 transition-all duration-300 hover:bg-white/5"
                                >
                                    <div class="relative flex-shrink-0">
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/20 to-purple-500/20 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <div
                                            class="relative rounded-xl border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20 p-3 transition-transform duration-300 group-hover:scale-110"
                                        >
                                            <component :is="contact.icon" class="h-6 w-6 text-white" />
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">{{ contact.label }}</p>
                                        <p class="text-gray-400">{{ contact.value }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="mt-10 border-t border-white/10 pt-8">
                                <p class="mb-4 text-sm text-gray-400">Follow us on social media</p>
                                <div class="flex gap-4">
                                    <a
                                        v-for="(social, index) in socialLinks"
                                        :key="index"
                                        :href="social.url"
                                        target="_blank"
                                        class="group relative rounded-xl border border-white/10 bg-white/5 p-3 transition-all duration-300 hover:scale-110 hover:border-white/20 hover:shadow-xl hover:shadow-purple-500/20"
                                    >
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <component
                                            :is="social.icon"
                                            class="relative h-5 w-5 text-gray-400 transition-colors duration-300 group-hover:text-white"
                                        />
                                    </a>
                                </div>
                            </div>

                            <!-- Map -->
                            <div
                                class="group mt-8 overflow-hidden rounded-2xl border border-white/10 transition-all duration-500 hover:border-white/20"
                            >
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                    ></div>
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2752.0989067876912!2d91.88879680957662!3d24.891207777817108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3751ab5d11f3ecfb%3A0xba536bc3d6f54073!2sPraxis!5e1!3m2!1sen!2sbd!4v1783322574023!5m2!1sen!2sbd"
                                        width="100%"
                                        height="250"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        class="grayscale filter transition-all duration-700 hover:grayscale-0"
                                    >
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="animate-slide-up" style="animation-delay: 0.4s">
                        <div
                            class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/10"
                        >
                            <h3 class="mb-4 text-2xl font-semibold text-white">Send us a Message</h3>
                            <p class="mb-6 text-sm text-gray-400">We'll get back to you within 24 hours</p>

                            <form @submit.prevent="submitForm" class="space-y-5">
                                <!-- Success Message -->
                                <div
                                    v-if="showSuccess"
                                    class="animate-slide-down flex items-center gap-3 rounded-xl border border-green-500/20 bg-green-500/10 p-4"
                                >
                                    <svg class="h-5 w-5 flex-shrink-0 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span class="text-green-400">{{ page.props.flash.success }}</span>
                                </div>

                                <div>
                                    <label for="name" class="mb-1.5 block text-sm font-medium text-gray-300">Full Name</label>
                                    <div class="group relative">
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <input
                                            id="name"
                                            v-model="form.name"
                                            type="text"
                                            required
                                            class="relative w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-white placeholder-gray-500 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            placeholder="John Doe"
                                        />
                                        <div v-if="form.errors.name" class="mt-1.5 flex items-center gap-1.5 text-sm text-red-400">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.name }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="mb-1.5 block text-sm font-medium text-gray-300">Email Address</label>
                                    <div class="group relative">
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <input
                                            id="email"
                                            v-model="form.email"
                                            type="email"
                                            required
                                            class="relative w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-white placeholder-gray-500 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            placeholder="john@example.com"
                                        />
                                        <div v-if="form.errors.email" class="mt-1.5 flex items-center gap-1.5 text-sm text-red-400">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.email }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="subject" class="mb-1.5 block text-sm font-medium text-gray-300">Subject</label>
                                    <div class="group relative">
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <input
                                            id="subject"
                                            v-model="form.subject"
                                            type="text"
                                            required
                                            class="relative w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-white placeholder-gray-500 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            placeholder="I want to learn more about..."
                                        />
                                        <div v-if="form.errors.subject" class="mt-1.5 flex items-center gap-1.5 text-sm text-red-400">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.subject }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="message" class="mb-1.5 block text-sm font-medium text-gray-300">Message</label>
                                    <div class="group relative">
                                        <div
                                            class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                        ></div>
                                        <textarea
                                            id="message"
                                            v-model="form.message"
                                            rows="4"
                                            required
                                            class="relative w-full resize-none rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-white placeholder-gray-500 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                            placeholder="Your message here..."
                                        ></textarea>
                                        <div v-if="form.errors.message" class="mt-1.5 flex items-center gap-1.5 text-sm text-red-400">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{ form.errors.message }}
                                        </div>
                                    </div>
                                </div>

                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="group relative w-full overflow-hidden rounded-xl px-6 py-4 text-base font-medium text-white transition-all duration-500 hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-50 disabled:hover:scale-100"
                                >
                                    <span
                                        class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                                    ></span>
                                    <span
                                        class="absolute inset-[2px] rounded-xl bg-black transition-all duration-500 group-hover:bg-opacity-0"
                                    ></span>
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        <span v-if="!form.processing">
                                            Send Message
                                            <svg
                                                class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1 group-hover:rotate-[-45deg]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2.5"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                                />
                                            </svg>
                                        </span>
                                        <span v-else class="flex items-center gap-2">
                                            <svg class="inline h-5 w-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                                />
                                            </svg>
                                            Sending...
                                        </span>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const page = usePage();

// Success message state
const showSuccess = ref(false);

watch(
    () => page.props.flash?.success,
    (success) => {
        if (success) {
            showSuccess.value = true;
            setTimeout(() => {
                showSuccess.value = false;
            }, 4000);
        }
    },
);

// Form handling
const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submitForm = () => {
    form.post(route('contact.send'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};

// Contact Information
const contactInfo = [
    {
        icon: 'LocationIcon',
        label: 'Address',
        value: 'Zindabazar, Sylhet, Bangladesh',
    },
    {
        icon: 'PhoneIcon',
        label: 'Phone',
        value: '+880 1795-547756',
    },
    {
        icon: 'EmailIcon',
        label: 'Email',
        value: 'shoyondeb18246@itinstitute.com',
    },
];

// Social Links
const socialLinks = [
    {
        icon: 'FacebookIcon',
        url: '#',
    },
    {
        icon: 'TwitterIcon',
        url: '#',
    },
    {
        icon: 'LinkedinIcon',
        url: '#',
    },
    {
        icon: 'InstagramIcon',
        url: '#',
    },
    {
        icon: 'YoutubeIcon',
        url: '#',
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

@keyframes slide-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
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

.animate-slide-up {
    animation: slide-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-slide-down {
    animation: slide-down 0.6s ease-out forwards;
    opacity: 0;
}

/* Pulse Animation */
.animate-pulse {
    animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
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

/* Focus visible */
input:focus-visible,
textarea:focus-visible {
    outline: none;
}
</style>
