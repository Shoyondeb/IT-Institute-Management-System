<!-- resources/js/Pages/Admin/Enrollments/Index.vue -->
<template>
    <AdminLayout :notificationCount="notificationCount">
        <div class="relative min-h-screen overflow-hidden bg-black py-6">
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
                <div class="py-6">
                    <!-- Header -->
                    <div class="animate-fade-in mb-6 flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                        <div>
                            <div
                                class="mb-2 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-white/90 backdrop-blur-xl"
                            >
                                <svg class="h-4 w-4 animate-pulse text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                    />
                                </svg>
                                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text font-semibold text-transparent">
                                    Admin Panel
                                </span>
                            </div>
                            <h1 class="text-2xl font-semibold text-white">Payment Verifications</h1>
                            <p class="mt-1 text-sm text-gray-400">Total {{ enrollments.total }} enrollments in the system</p>
                        </div>
                        <!-- Stats Badges -->
                        <div class="flex items-center space-x-2">
                            <span
                                class="inline-flex items-center rounded-full border border-yellow-500/20 bg-yellow-500/10 px-3 py-1 text-sm font-medium text-yellow-300"
                            >
                                <span class="mr-1 h-2 w-2 animate-pulse rounded-full bg-yellow-400"></span>
                                {{ enrollments.data?.filter((e) => e.status === 'pending').length || 0 }} Pending
                            </span>
                            <span
                                class="inline-flex items-center rounded-full border border-green-500/20 bg-green-500/10 px-3 py-1 text-sm font-medium text-green-300"
                            >
                                <span class="mr-1 h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                                {{ enrollments.data?.filter((e) => e.status === 'verified').length || 0 }} Verified
                            </span>
                            <span
                                class="inline-flex items-center rounded-full border border-red-500/20 bg-red-500/10 px-3 py-1 text-sm font-medium text-red-300"
                            >
                                <span class="mr-1 h-2 w-2 animate-pulse rounded-full bg-red-400"></span>
                                {{ enrollments.data?.filter((e) => e.status === 'rejected').length || 0 }} Rejected
                            </span>
                        </div>
                    </div>

                    <!-- Search and Filter Section -->
                    <div
                        class="animate-fade-in animation-delay-100 mb-6 rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="flex flex-col space-y-4 md:flex-row md:items-center md:space-x-4 md:space-y-0">
                            <!-- Search Input -->
                            <div class="flex-1">
                                <div class="group relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <svg
                                            class="h-5 w-5 text-gray-400 transition-colors group-hover:text-blue-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        v-model="search"
                                        type="text"
                                        placeholder="Search by student name, email or course title..."
                                        @keyup.enter="applyFilters"
                                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    />
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="w-full md:w-48">
                                <div class="relative">
                                    <select
                                        v-model="selectedStatus"
                                        @change="applyFilters"
                                        class="w-full appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    >
                                        <option value="" class="bg-gray-900">All Status</option>
                                        <option value="pending" class="bg-gray-900">Pending</option>
                                        <option value="verified" class="bg-gray-900">Verified</option>
                                        <option value="rejected" class="bg-gray-900">Rejected</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method Filter -->
                            <div class="w-full md:w-48">
                                <div class="relative">
                                    <select
                                        v-model="selectedPaymentMethod"
                                        @change="applyFilters"
                                        class="w-full appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    >
                                        <option value="" class="bg-gray-900">All Methods</option>
                                        <option value="bkash" class="bg-gray-900">bKash</option>
                                        <option value="nagad" class="bg-gray-900">Nagad</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <button
                                    @click="applyFilters"
                                    class="inline-flex items-center rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-purple-500/25"
                                >
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                    Search
                                </button>
                                <button
                                    @click="resetFilters"
                                    class="inline-flex items-center rounded-xl border border-white/10 px-5 py-3 text-sm font-medium text-gray-300 transition-all duration-300 hover:border-white/20 hover:bg-white/5 hover:text-white"
                                >
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                        />
                                    </svg>
                                    Reset
                                </button>
                            </div>
                        </div>

                        <!-- Active Filters Display -->
                        <div
                            v-if="search || selectedStatus || selectedPaymentMethod"
                            class="mt-4 flex flex-wrap items-center gap-2 border-t border-white/10 pt-4"
                        >
                            <span class="text-sm text-gray-400">Active filters:</span>
                            <span
                                v-if="search"
                                class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-1 text-xs font-medium text-blue-300"
                            >
                                Search: "{{ search }}"
                                <button
                                    @click="
                                        search = '';
                                        applyFilters();
                                    "
                                    class="ml-1.5 hover:text-blue-100"
                                >
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </span>
                            <span
                                v-if="selectedStatus"
                                class="inline-flex items-center rounded-full border border-purple-500/20 bg-purple-500/10 px-3 py-1 text-xs font-medium text-purple-300"
                            >
                                Status: {{ selectedStatus.charAt(0).toUpperCase() + selectedStatus.slice(1) }}
                                <button
                                    @click="
                                        selectedStatus = '';
                                        applyFilters();
                                    "
                                    class="ml-1.5 hover:text-purple-100"
                                >
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </span>
                            <span
                                v-if="selectedPaymentMethod"
                                class="inline-flex items-center rounded-full border border-green-500/20 bg-green-500/10 px-3 py-1 text-xs font-medium text-green-300"
                            >
                                Method: {{ selectedPaymentMethod.charAt(0).toUpperCase() + selectedPaymentMethod.slice(1) }}
                                <button
                                    @click="
                                        selectedPaymentMethod = '';
                                        applyFilters();
                                    "
                                    class="ml-1.5 hover:text-green-100"
                                >
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>

                    <!-- Enrollments Table -->
                    <div
                        class="animate-fade-in animation-delay-200 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-white/10">
                                <thead class="bg-white/5">
                                    <tr>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Student</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Course</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Payment</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Status</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr
                                        v-for="enrollment in enrollments.data"
                                        :key="enrollment.id"
                                        class="transition-all duration-300 hover:bg-white/5"
                                    >
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/30 to-purple-500/30 font-semibold text-white"
                                                >
                                                    {{ enrollment.user.name.charAt(0).toUpperCase() }}
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-white">{{ enrollment.user.name }}</div>
                                                    <div class="text-sm text-gray-400">{{ enrollment.user.email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-white">{{ enrollment.course.title }}</div>
                                            <div class="text-sm text-blue-400">${{ enrollment.course.fee }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm">
                                                <span class="font-medium text-gray-300">
                                                    {{ enrollment.payment_method === 'bkash' ? 'bKash' : 'Nagad' }}
                                                </span>
                                            </div>
                                            <div class="text-sm text-gray-400">{{ enrollment.mobile_number }}</div>
                                            <div class="font-mono text-sm text-gray-500">{{ enrollment.transaction_id }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                :class="{
                                                    'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium': true,
                                                    'border border-yellow-500/20 bg-yellow-500/10 text-yellow-300': enrollment.status === 'pending',
                                                    'border border-green-500/20 bg-green-500/10 text-green-300': enrollment.status === 'verified',
                                                    'border border-red-500/20 bg-red-500/10 text-red-300': enrollment.status === 'rejected',
                                                }"
                                            >
                                                <span
                                                    class="mr-1 h-1.5 w-1.5 rounded-full"
                                                    :class="{
                                                        'bg-yellow-400': enrollment.status === 'pending',
                                                        'bg-green-400': enrollment.status === 'verified',
                                                        'bg-red-400': enrollment.status === 'rejected',
                                                    }"
                                                ></span>
                                                {{ enrollment.status.charAt(0).toUpperCase() + enrollment.status.slice(1) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div v-if="enrollment.status === 'pending'" class="flex space-x-2">
                                                <button
                                                    @click="verify(enrollment.id)"
                                                    class="inline-flex items-center rounded-lg border border-green-500/20 bg-green-500/10 px-3 py-1.5 text-xs font-medium text-green-300 transition-all hover:border-green-500/40 hover:bg-green-500/20 hover:text-green-200"
                                                >
                                                    <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Verify
                                                </button>
                                                <button
                                                    @click="reject(enrollment.id)"
                                                    class="inline-flex items-center rounded-lg border border-red-500/20 bg-red-500/10 px-3 py-1.5 text-xs font-medium text-red-300 transition-all hover:border-red-500/40 hover:bg-red-500/20 hover:text-red-200"
                                                >
                                                    <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"
                                                        />
                                                    </svg>
                                                    Reject
                                                </button>
                                            </div>
                                            <span v-else class="text-sm text-gray-500">
                                                {{ enrollment.status === 'verified' ? '✓ Verified' : '✗ Rejected' }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Empty State -->
                        <div v-if="enrollments.data.length === 0" class="py-16 text-center">
                            <div class="mx-auto max-w-sm">
                                <div
                                    class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20"
                                >
                                    <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-white">No enrollments found</h3>
                                <p class="mt-2 text-sm text-gray-400">Try adjusting your search or filter criteria.</p>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div v-if="enrollments.data.length > 0" class="border-t border-white/10 px-4 py-4 sm:px-6">
                            <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
                                <div class="text-sm text-gray-400">
                                    Showing
                                    <span class="font-medium text-white">{{ enrollments.from || 0 }}</span>
                                    to
                                    <span class="font-medium text-white">{{ enrollments.to || 0 }}</span>
                                    of
                                    <span class="font-medium text-white">{{ enrollments.total || 0 }}</span>
                                    results
                                </div>
                                <Pagination :links="enrollments.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps<{
    enrollments: Object;
    filters?: {
        search?: string;
        status?: string;
        payment_method?: string;
    };
    notificationCount: number;
}>();

const search = ref(props.filters?.search || '');
const selectedStatus = ref(props.filters?.status || '');
const selectedPaymentMethod = ref(props.filters?.payment_method || '');

const applyFilters = () => {
    const params: Record<string, string> = {};
    if (search.value) params.search = search.value;
    if (selectedStatus.value) params.status = selectedStatus.value;
    if (selectedPaymentMethod.value) params.payment_method = selectedPaymentMethod.value;

    router.get(route('admin.enrollments.index'), params, {
        preserveState: true,
        replace: true,
    });
};

const resetFilters = () => {
    search.value = '';
    selectedStatus.value = '';
    selectedPaymentMethod.value = '';
    applyFilters();
};

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

// Debounce search - auto search after typing stops
let searchTimeout: ReturnType<typeof setTimeout> | null = null;
watch(search, () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 500);
});

// Auto apply filters when status or payment method changes
watch([selectedStatus, selectedPaymentMethod], () => {
    applyFilters();
});
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

/* Animation Classes */
.animate-float-particle {
    animation: float-particle 6s ease-in-out infinite;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
    opacity: 0;
}

.animation-delay-100 {
    animation-delay: 0.1s;
}

.animation-delay-200 {
    animation-delay: 0.2s;
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

/* Select dropdown styling */
select option {
    background-color: #1a1a1a;
    color: white;
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
