<!-- resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue -->
<script setup>
import FileInput from '@/Components/FileInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name || '',
    email: user.email || '',
    profile_picture: null,
});

const getProfilePictureUrl = (user) => {
    if (!user) return null;
    if (user.profile_picture) {
        if (user.profile_picture.startsWith('http://') || user.profile_picture.startsWith('https://')) {
            return user.profile_picture;
        }
        return `/storage/${user.profile_picture}`;
    }
    if (user.profile_picture_url) {
        return user.profile_picture_url;
    }
    return null;
};

const isRemovingImage = ref(false);

watch(
    () => form.errors,
    (errors) => {
        if (errors.name || errors.email) {
            console.log('Form validation errors:', errors);
        }
    },
    { deep: true },
);

const submit = () => {
    if (isRemovingImage.value) {
        form.profile_picture = null;
    }

    form.transform((data) => ({
        ...data,
        _method: 'PATCH',
    })).post(route('profile.update'), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            isRemovingImage.value = false;
        },
        onError: (errors) => {
            console.log('Form submission errors:', errors);
        },
    });
};

const removeProfilePicture = () => {
    if (confirm('Are you sure you want to remove your profile picture?')) {
        isRemovingImage.value = true;
        form.profile_picture = null;
        submit();
    }
};
</script>

<template>
    <form @submit.prevent="submit" class="space-y-5">
        <!-- Profile Picture -->
        <div>
            <InputLabel value="Profile Picture" class="text-gray-300" />
            <div v-if="getProfilePictureUrl(user) && !form.profile_picture" class="mb-3">
                <div class="relative inline-block">
                    <img
                        :src="getProfilePictureUrl(user)"
                        alt="Profile Picture"
                        class="h-20 w-20 rounded-full object-cover ring-2 ring-blue-500/20"
                    />
                    <button
                        @click.prevent="removeProfilePicture"
                        type="button"
                        class="absolute -right-1 -top-1 rounded-full bg-red-500 p-0.5 text-white shadow-lg hover:bg-red-600"
                    >
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <FileInput v-model="form.profile_picture" :existing-image="getProfilePictureUrl(user)" />
            <InputError class="mt-1.5" :message="form.errors.profile_picture" />
            <p class="mt-1 text-xs text-gray-500">Upload a profile picture (max 2MB)</p>
        </div>

        <!-- Name Field -->
        <div>
            <InputLabel for="name" value="Name" class="text-gray-300" />
            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
            <InputError class="mt-1.5" :message="form.errors.name" />
        </div>

        <!-- Email Field -->
        <div>
            <InputLabel for="email" value="Email" class="text-gray-300" />
            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                v-model="form.email"
                required
                autocomplete="username"
            />
            <InputError class="mt-1.5" :message="form.errors.email" />
        </div>

        <div v-if="mustVerifyEmail && user.email_verified_at === null">
            <p class="mt-2 text-sm text-gray-400">
                Your email address is unverified.
                <Link
                    :href="route('verification.send')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-blue-400 underline hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Click here to re-send the verification email.
                </Link>
            </p>
            <div v-show="status === 'verification-link-sent'" class="mt-2 text-sm font-medium text-green-400">
                A new verification link has been sent to your email address.
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <PrimaryButton
                :disabled="form.processing"
                class="relative overflow-hidden rounded-xl px-6 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105"
            >
                <span
                    class="animate-gradient-x absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-[length:200%_200%]"
                ></span>
                <span class="absolute inset-[2px] rounded-xl bg-black transition-all duration-300 group-hover:bg-opacity-0"></span>
                <span class="relative z-10">Save</span>
            </PrimaryButton>
            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-green-400">Saved.</p>
            </Transition>
        </div>
    </form>
</template>

<style scoped>
@keyframes gradient-x {
    0%,
    100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}
</style>
