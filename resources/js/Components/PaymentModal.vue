<!-- resources/js/Components/PaymentModal.vue -->
<template>
    <div v-if="open" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="$emit('close')"></div>

            <!-- Modal -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md sm:p-6"
            >
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Complete Enrollment</h3>

                    <div class="space-y-4">
                        <!-- Payment Method -->
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Payment Method *</label>
                            <div class="flex space-x-3">
                                <button
                                    @click="form.payment_method = 'bkash'"
                                    :class="[
                                        'flex-1 rounded border px-4 py-2',
                                        form.payment_method === 'bkash' ? 'border-indigo-500 bg-indigo-50' : 'border-gray-300',
                                    ]"
                                >
                                    bKash
                                </button>
                                <button
                                    @click="form.payment_method = 'nagad'"
                                    :class="[
                                        'flex-1 rounded border px-4 py-2',
                                        form.payment_method === 'nagad' ? 'border-green-500 bg-green-50' : 'border-gray-300',
                                    ]"
                                >
                                    Nagad
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mobile Number *</label>
                            <input
                                v-model="form.mobile_number"
                                type="text"
                                class="mt-1 w-full rounded border border-gray-300 px-3 py-2"
                                placeholder="01XXXXXXXXX"
                                required
                            />
                        </div>

                        <!-- Transaction ID -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Transaction ID *</label>
                            <input
                                v-model="form.transaction_id"
                                type="text"
                                class="mt-1 w-full rounded border border-gray-300 px-3 py-2"
                                placeholder="Enter transaction ID"
                                required
                            />
                        </div>

                        <!-- Instructions -->
                        <div class="rounded bg-blue-50 p-3 text-sm text-blue-800">
                            Send ${{ course.fee }} via {{ form.payment_method || 'selected method' }} and enter details above. Enrollment will be
                            active after admin verification.
                            <p>Pay to 01797035708/01312784114</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex justify-end space-x-3">
                    <button
                        @click="$emit('close')"
                        class="rounded border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Cancel
                    </button>
                    <button
                        @click="submit"
                        :disabled="!form.payment_method || !form.mobile_number || !form.transaction_id"
                        class="rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 disabled:opacity-50"
                    >
                        Submit Enrollment
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps<{
    open: boolean;
    course: {
        id: number;
        fee: number;
    };
}>();

const emit = defineEmits(['close']);

const form = reactive({
    payment_method: '',
    mobile_number: '',
    transaction_id: '',
});

const submit = () => {
    router.post(route('enrollments.enroll', props.course.id), form, {
        onSuccess: () => {
            emit('close');
        },
    });
};
</script>
