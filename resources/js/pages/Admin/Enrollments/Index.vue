<!-- resources/js/Pages/Admin/Enrollments/Index.vue -->
<template>
    <AdminLayout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="mb-6 text-2xl font-semibold text-gray-900">Payment Verifications</h1>

                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Student</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Course</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Payment</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="enrollment in enrollments.data" :key="enrollment.id">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ enrollment.user.name }}</div>
                                    <div class="text-sm text-gray-500">{{ enrollment.user.email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ enrollment.course.title }}</div>
                                    <div class="text-sm text-gray-500">${{ enrollment.course.fee }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <span class="font-medium">{{ enrollment.payment_method === 'bkash' ? 'bKash' : 'Nagad' }}</span>
                                    </div>
                                    <div class="text-sm text-gray-500">{{ enrollment.mobile_number }}</div>
                                    <div class="text-sm text-gray-500">{{ enrollment.transaction_id }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="{
                                            'rounded-full px-2 py-1 text-xs': true,
                                            'bg-yellow-100 text-yellow-800': enrollment.status === 'pending',
                                            'bg-green-100 text-green-800': enrollment.status === 'verified',
                                            'bg-red-100 text-red-800': enrollment.status === 'rejected',
                                        }"
                                    >
                                        {{ enrollment.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2" v-if="enrollment.status === 'pending'">
                                        <button @click="verify(enrollment.id)" class="text-sm text-green-600 hover:text-green-900">Verify</button>
                                        <button @click="reject(enrollment.id)" class="text-sm text-red-600 hover:text-red-900">Reject</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps<{
    enrollments: Object;
}>();

const verify = (id: number) => {
    if (confirm('Verify this payment?')) {
        router.put(route('admin.enrollments.verify', id));
    }
};

const reject = (id: number) => {
    if (confirm('Reject this payment?')) {
        router.put(route('admin.enrollments.reject', id));
    }
};
</script>
