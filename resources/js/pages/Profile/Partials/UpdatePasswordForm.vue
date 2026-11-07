<!-- resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue -->
<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <form @submit.prevent="updatePassword" class="space-y-5">
        <div>
            <InputLabel for="current_password" value="Current Password" class="text-gray-300" />
            <TextInput
                id="current_password"
                ref="currentPasswordInput"
                v-model="form.current_password"
                type="password"
                class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                autocomplete="current-password"
            />
            <InputError :message="form.errors.current_password" class="mt-1.5" />
        </div>

        <div>
            <InputLabel for="password" value="New Password" class="text-gray-300" />
            <TextInput
                id="password"
                ref="passwordInput"
                v-model="form.password"
                type="password"
                class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                autocomplete="new-password"
            />
            <InputError :message="form.errors.password" class="mt-1.5" />
        </div>

        <div>
            <InputLabel for="password_confirmation" value="Confirm Password" class="text-gray-300" />
            <TextInput
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                autocomplete="new-password"
            />
            <InputError :message="form.errors.password_confirmation" class="mt-1.5" />
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
