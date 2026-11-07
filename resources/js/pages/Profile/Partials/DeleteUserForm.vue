<!-- resources/js/Pages/Profile/Partials/DeleteUserForm.vue -->
<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.clearErrors();
    form.reset();
};
</script>

<template>
    <div class="space-y-4">
        <div class="rounded-xl border border-red-500/20 bg-red-500/10 p-4">
            <div class="flex items-start">
                <svg class="mr-3 h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                    />
                </svg>
                <div>
                    <p class="text-sm text-gray-300">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please
                        download any data or information that you wish to retain.
                    </p>
                </div>
            </div>
        </div>

        <DangerButton
            @click="confirmUserDeletion"
            class="rounded-xl bg-gradient-to-r from-red-500 to-pink-500 px-6 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-red-500/25"
        >
            Delete Account
        </DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="relative rounded-3xl border border-white/10 bg-black p-6 backdrop-blur-xl">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-lg font-medium text-white">Are you sure you want to delete your account?</h2>
                        <p class="mt-2 text-sm text-gray-400">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to
                            confirm you would like to permanently delete your account.
                        </p>
                    </div>
                    <button @click="closeModal" class="rounded-md text-gray-400 transition-colors hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6">
                    <InputLabel for="password" value="Password" class="text-gray-300" />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                        placeholder="Enter your password"
                        @keyup.enter="deleteUser"
                    />
                    <InputError :message="form.errors.password" class="mt-1.5" />
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <SecondaryButton
                        @click="closeModal"
                        class="rounded-xl border border-white/10 bg-white/5 px-6 py-2.5 text-sm font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-white/20 hover:bg-white/10 hover:text-white"
                    >
                        Cancel
                    </SecondaryButton>
                    <DangerButton
                        class="rounded-xl bg-gradient-to-r from-red-500 to-pink-500 px-6 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-red-500/25 disabled:cursor-not-allowed disabled:opacity-50"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </div>
</template>
