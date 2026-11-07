<!-- resources/js/Pages/Admin/Users/Index.vue -->
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
                            <h1 class="text-2xl font-semibold text-white">User Management</h1>
                            <p class="mt-1 text-sm text-gray-400">Total {{ users.total || 0 }} users in the system</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span
                                class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-1 text-sm font-medium text-blue-300"
                            >
                                <span class="mr-1 h-2 w-2 animate-pulse rounded-full bg-blue-400"></span>
                                {{ users.data?.filter((u) => u.role === 'admin').length || 0 }} Admins
                            </span>
                            <span
                                class="inline-flex items-center rounded-full border border-green-500/20 bg-green-500/10 px-3 py-1 text-sm font-medium text-green-300"
                            >
                                <span class="mr-1 h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                                {{ users.data?.filter((u) => u.role === 'student').length || 0 }} Students
                            </span>
                        </div>
                    </div>

                    <!-- Flash Messages -->
                    <div v-if="$page.props.flash?.success" class="animate-fade-in animation-delay-100 mb-4">
                        <div class="rounded-xl border border-green-500/20 bg-green-500/10 p-4 backdrop-blur-sm">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-400">{{ $page.props.flash.success }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="$page.props.flash?.error" class="animate-fade-in animation-delay-100 mb-4">
                        <div class="rounded-xl border border-red-500/20 bg-red-500/10 p-4 backdrop-blur-sm">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-400">{{ $page.props.flash.error }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search and Filter Section -->
                    <div
                        class="animate-fade-in animation-delay-200 mb-6 rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
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
                                        placeholder="Search by name or email..."
                                        @keyup.enter="applyFilters"
                                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pl-12 text-white placeholder-gray-400 shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    />
                                </div>
                            </div>

                            <!-- Role Filter -->
                            <div class="w-full md:w-48">
                                <div class="relative">
                                    <select
                                        v-model="selectedRole"
                                        @change="applyFilters"
                                        class="w-full appearance-none rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-10 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    >
                                        <option value="" class="bg-gray-900">All Roles</option>
                                        <option value="admin" class="bg-gray-900">Admin</option>
                                        <option value="student" class="bg-gray-900">Student</option>
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
                        <div v-if="search || selectedRole" class="mt-4 flex flex-wrap items-center gap-2 border-t border-white/10 pt-4">
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
                                v-if="selectedRole"
                                class="inline-flex items-center rounded-full border border-purple-500/20 bg-purple-500/10 px-3 py-1 text-xs font-medium text-purple-300"
                            >
                                Role: {{ selectedRole.charAt(0).toUpperCase() + selectedRole.slice(1) }}
                                <button
                                    @click="
                                        selectedRole = '';
                                        applyFilters();
                                    "
                                    class="ml-1.5 hover:text-purple-100"
                                >
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div
                        class="animate-fade-in animation-delay-300 overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl transition-all duration-500 hover:border-white/20 hover:shadow-2xl hover:shadow-purple-500/5"
                    >
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-white/10">
                                <thead class="bg-white/5">
                                    <tr>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">ID</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">User</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Email</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Role</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Joined</th>
                                        <th class="px-6 py-3.5 text-left text-xs font-medium uppercase tracking-wider text-gray-400">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr
                                        v-for="user in users.data"
                                        :key="user.id"
                                        class="transition-all duration-300 hover:bg-white/5"
                                        :class="{ 'border-l-2 border-blue-400 bg-blue-500/5': user.id === currentUser }"
                                    >
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-400">#{{ user.id }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/30 to-purple-500/30 font-semibold text-white"
                                                >
                                                    {{ user.name.charAt(0).toUpperCase() }}
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-white">
                                                        {{ user.name }}
                                                        <span
                                                            v-if="user.id === currentUser"
                                                            class="ml-2 inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-2 py-0.5 text-xs font-medium text-blue-300"
                                                        >
                                                            You
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-400">{{ user.email }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                :class="{
                                                    'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium': true,
                                                    'border border-purple-500/20 bg-purple-500/10 text-purple-300': user.role === 'admin',
                                                    'border border-blue-500/20 bg-blue-500/10 text-blue-300': user.role === 'student',
                                                }"
                                            >
                                                <span v-if="user.role === 'admin'" class="mr-1 h-1.5 w-1.5 rounded-full bg-purple-400"></span>
                                                <span v-else class="mr-1 h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                                                {{ user.role.charAt(0).toUpperCase() + user.role.slice(1) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center text-sm text-gray-400">
                                                <svg class="mr-1.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>
                                                {{ user.created_at }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button
                                                v-if="user.id !== currentUser"
                                                @click="openRoleModal(user)"
                                                class="group inline-flex items-center rounded-xl border border-blue-500/20 bg-blue-500/10 px-3 py-1.5 text-sm font-medium text-blue-300 transition-all hover:border-blue-500/40 hover:bg-blue-500/20 hover:text-blue-200"
                                            >
                                                <svg
                                                    class="mr-1.5 h-4 w-4 transition-transform group-hover:scale-110"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                                    />
                                                </svg>
                                                Change Role
                                            </button>
                                            <span v-else class="text-sm text-gray-500">Current User</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Empty State -->
                        <div v-if="!users.data || users.data.length === 0" class="py-16 text-center">
                            <div class="mx-auto max-w-sm">
                                <div
                                    class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/20 to-purple-500/20"
                                >
                                    <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                        />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-white">No users found</h3>
                                <p class="mt-2 text-sm text-gray-400">Try adjusting your search or filter criteria.</p>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div v-if="users.data && users.data.length > 0" class="border-t border-white/10 px-4 py-4 sm:px-6">
                            <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
                                <div class="text-sm text-gray-400">
                                    Showing
                                    <span class="font-medium text-white">{{ users.from || 0 }}</span>
                                    to
                                    <span class="font-medium text-white">{{ users.to || 0 }}</span>
                                    of
                                    <span class="font-medium text-white">{{ users.total || 0 }}</span>
                                    results
                                </div>
                                <Pagination :links="users.links" />
                            </div>
                        </div>
                    </div>

                    <!-- Role Change Modal -->
                    <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="fixed inset-0 bg-black/70 backdrop-blur-sm transition-opacity" @click="closeModal"></div>
                            <div
                                class="animate-fade-in relative w-full max-w-md transform overflow-hidden rounded-3xl border border-white/10 bg-black p-6 text-left shadow-2xl backdrop-blur-xl transition-all"
                            >
                                <div class="flex items-start justify-between">
                                    <h3 class="text-xl font-semibold text-white">Change User Role</h3>
                                    <button @click="closeModal" class="rounded-md text-gray-400 transition-colors hover:text-white">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="mt-4">
                                    <div class="flex items-center space-x-3 rounded-xl border border-white/10 bg-white/5 p-4">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-blue-500/30 to-purple-500/30 font-semibold text-white"
                                        >
                                            {{ selectedUser?.name?.charAt(0).toUpperCase() || 'U' }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">{{ selectedUser?.name }}</p>
                                            <p class="text-sm text-gray-400">{{ selectedUser?.email }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label class="text-sm font-medium text-gray-300">Current Role</label>
                                        <div class="mt-1 rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-sm text-gray-300">
                                            {{ selectedUser?.role?.charAt(0).toUpperCase() + selectedUser?.role?.slice(1) }}
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="role" class="block text-sm font-medium text-gray-300">Select New Role</label>
                                        <select
                                            v-model="selectedRoleValue"
                                            id="role"
                                            class="mt-1 block w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2.5 text-white shadow-sm transition-all duration-300 hover:border-white/20 focus:border-blue-500/50 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                        >
                                            <option value="student" class="bg-gray-900">Student</option>
                                            <option value="admin" class="bg-gray-900">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-6 flex space-x-3">
                                    <button
                                        @click="updateRole"
                                        :disabled="isUpdating"
                                        class="flex-1 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg transition-all hover:scale-105 hover:shadow-purple-500/25 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 disabled:hover:scale-100"
                                    >
                                        <span v-if="!isUpdating">Update Role</span>
                                        <span v-else class="flex items-center justify-center">
                                            <svg class="inline h-4 w-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                                />
                                            </svg>
                                            <span class="ml-2">Updating...</span>
                                        </span>
                                    </button>
                                    <button
                                        @click="closeModal"
                                        class="flex-1 rounded-xl border border-white/10 px-4 py-2.5 text-sm font-medium text-gray-300 transition-all hover:border-white/20 hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200"
                                    >
                                        Cancel
                                    </button>
                                </div>
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
    users: {
        data: Array<{
            id: number;
            name: string;
            email: string;
            role: string;
            created_at: string;
        }>;
        links: Array<any>;
        from: number;
        to: number;
        total: number;
    };
    currentUser: number;
    notificationCount?: number;
    filters?: {
        search?: string;
        role?: string;
    };
}>();

const search = ref(props.filters?.search || '');
const selectedRole = ref(props.filters?.role || '');
const showModal = ref(false);
const selectedUser = ref<any>(null);
const selectedRoleValue = ref('student');
const isUpdating = ref(false);
const notificationCount = ref(props.notificationCount || 0);

const applyFilters = () => {
    const params: Record<string, string> = {};
    if (search.value) params.search = search.value;
    if (selectedRole.value) params.role = selectedRole.value;

    router.get(route('admin.users.index'), params, {
        preserveState: true,
        replace: true,
    });
};

const resetFilters = () => {
    search.value = '';
    selectedRole.value = '';
    applyFilters();
};

const openRoleModal = (user: any) => {
    selectedUser.value = user;
    selectedRoleValue.value = user.role;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    selectedUser.value = null;
    selectedRoleValue.value = 'student';
    isUpdating.value = false;
};

const updateRole = () => {
    if (!selectedUser.value) return;

    isUpdating.value = true;

    const currentFilters: Record<string, string> = {};
    if (search.value) currentFilters.search = search.value;
    if (selectedRole.value) currentFilters.role = selectedRole.value;

    router.put(
        `/admin/users/${selectedUser.value.id}`,
        {
            role: selectedRoleValue.value,
        },
        {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                closeModal();
                router.get(route('admin.users.index'), currentFilters, {
                    preserveState: true,
                    replace: true,
                });
            },
            onError: (errors) => {
                console.error('Error updating role:', errors);
                isUpdating.value = false;
            },
        },
    );
};

let searchTimeout: ReturnType<typeof setTimeout> | null = null;
watch(search, () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 500);
});

watch(selectedRole, () => {
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

.animation-delay-300 {
    animation-delay: 0.3s;
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
