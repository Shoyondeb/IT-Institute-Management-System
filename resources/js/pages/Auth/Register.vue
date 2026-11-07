<!-- resources/js/Pages/Auth/Register.vue -->
<script setup>
import FileInput from '@/Components/FileInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    profile_picture: null,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        forceFormData: true,
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="relative min-h-screen overflow-hidden bg-black">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute -right-20 top-20 h-96 w-96 animate-pulse rounded-full bg-purple-600/20 blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 h-96 w-96 animate-pulse rounded-full bg-blue-600/20 blur-3xl" style="animation-delay: 2s"></div>
                <div class="absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-600/10 blur-3xl"></div>
            </div>

            <!-- Grid Pattern -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.03%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>

            <!-- Floating Particles -->
            <div class="absolute inset-0 overflow-hidden">
                <div v-for="n in 20" :key="n"
                     class="absolute rounded-full animate-float-particle"
                     :class="[
                         n % 3 === 0 ? 'bg-gradient-to-r from-blue-400/20 to-purple-400/20' :
                         n % 3 === 1 ? 'bg-gradient-to-r from-purple-400/20 to-pink-400/20' :
                         'bg-gradient-to-r from-pink-400/20 to-red-400/20'
                     ]"
                     :style="{
                         left: Math.random() * 100 + '%',
                         top: Math.random() * 100 + '%',
                         animationDelay: Math.random() * 8 + 's',
                         animationDuration: 4 + Math.random() * 6 + 's',
                         width: (Math.random() * 4 + 2) + 'px',
                         height: (Math.random() * 4 + 2) + 'px'
                     }">
                </div>
            </div>

            <div class="relative flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
                <div class="w-full max-w-md">
                    <!-- Logo/Brand -->
                    <div class="mb-8 text-center">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl">
                            <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                Create Account
                            </span>
                        </div>
                        <h2 class="text-3xl font-bold text-white">Get Started</h2>
                        <p class="mt-2 text-sm text-gray-400">Join our community and start learning today</p>
                    </div>

                    <!-- Register Form -->
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-xl shadow-2xl transition-all duration-500 hover:border-white/20 hover:shadow-purple-500/5">
                        <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-5">
                            <!-- Name -->
                            <div>
                                <InputLabel for="name" value="Full Name" class="text-sm font-medium text-gray-300" />
                                <div class="relative mt-1.5">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="block w-full rounded-xl border border-white/10 bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                        placeholder="Enter your full name"
                                    />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.name" />
                            </div>

                            <!-- Email -->
                            <div>
                                <InputLabel for="email" value="Email Address" class="text-sm font-medium text-gray-300" />
                                <div class="relative mt-1.5">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="block w-full rounded-xl border border-white/10 bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                        v-model="form.email"
                                        required
                                        autocomplete="username"
                                        placeholder="Enter your email address"
                                    />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.email" />
                            </div>

                            <!-- Password -->
                            <div>
                                <InputLabel for="password" value="Password" class="text-sm font-medium text-gray-300" />
                                <div class="relative mt-1.5">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="block w-full rounded-xl border border-white/10 bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                        v-model="form.password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Enter your password"
                                    />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.password" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <InputLabel for="password_confirmation" value="Confirm Password" class="text-sm font-medium text-gray-300" />
                                <div class="relative mt-1.5">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="block w-full rounded-xl border border-white/10 bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                        v-model="form.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Confirm your password"
                                    />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.password_confirmation" />
                            </div>

                            <!-- Profile Picture -->
                            <div>
                                <InputLabel value="Profile Picture" class="text-sm font-medium text-gray-300" />
                                <div class="mt-1.5">
                                    <FileInput v-model="form.profile_picture" class="w-full" />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.profile_picture" />
                                <p class="mt-1 text-xs text-gray-500">Upload a profile picture (max 2MB, optional)</p>
                            </div>

                            <!-- Submit -->
                            <div class="pt-4">
                                <PrimaryButton
                                    class="relative w-full overflow-hidden rounded-xl px-6 py-3.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 animate-gradient-x bg-[length:200%_200%]"></span>
                                    <span class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"></span>
                                    <span class="relative z-10 flex items-center justify-center">
                                        <svg v-if="form.processing" class="mr-2 h-4 w-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        <svg v-else class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        {{ form.processing ? 'Creating Account...' : 'Create Account' }}
                                    </span>
                                </PrimaryButton>
                            </div>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-sm text-gray-400">
                                    Already have an account?
                                    <Link
                                        :href="route('login')"
                                        class="font-medium text-blue-400 transition-colors hover:text-blue-300 hover:underline"
                                    >
                                        Sign in
                                    </Link>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Animation Keyframes */
@keyframes float-particle {
    0%, 100% {
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
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
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

/* Input autofill styles */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset !important;
    -webkit-text-fill-color: white !important;
    border-color: rgba(59, 130, 246, 0.3) !important;
}
</style>
