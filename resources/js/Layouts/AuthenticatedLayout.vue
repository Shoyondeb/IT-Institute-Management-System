<!-- resources/js/Layouts/AuthenticatedLayout.vue -->
<template>
    <div class="flex min-h-screen flex-col bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Fixed Navigation -->
        <nav class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200/80 bg-white/95 shadow-xl backdrop-blur-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <!-- Left side: Logo and Desktop Navigation -->
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="flex shrink-0 items-center">
                            <Link
                                :href="route('landing.Index')"
                                class="flex items-center rounded-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            >
                                <ApplicationLogo class="h-8 w-auto fill-current text-gray-800" />
                                <span
                                    class="ml-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-xl font-bold text-transparent"
                                >
                                    IT Institute
                                </span>
                            </Link>
                        </div>

                        <!-- Desktop Navigation Links -->
                        <div class="hidden sm:ml-8 sm:flex sm:space-x-1">
                            <!-- Home Link -->
                            <NavLink
                                :href="route('landing.Index')"
                                :active="route().current('landing.Index')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('landing.Index') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        />
                                    </svg>
                                    Home
                                </span>
                                <span
                                    v-if="route().current('landing.Index')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>

                            <!-- Dashboard Link (Only when logged in) -->
                            <NavLink
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                :active="route().current('dashboard')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('dashboard') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        />
                                    </svg>
                                    Dashboard
                                </span>
                                <span
                                    v-if="route().current('dashboard')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>

                            <!-- Courses Link -->
                            <NavLink
                                :href="route('courses.public.index')"
                                :active="route().current('courses.public.*')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('courses.public.*') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        />
                                    </svg>
                                    Courses
                                </span>
                                <span
                                    v-if="route().current('courses.public.*')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>

                            <!-- My Courses Link (Only when logged in) -->
                            <NavLink
                                v-if="$page.props.auth.user"
                                :href="route('my-courses')"
                                :active="route().current('my-courses')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('my-courses') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                        />
                                    </svg>
                                    My Courses
                                </span>
                                <span
                                    v-if="route().current('my-courses')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>

                            <!-- About Link -->
                            <NavLink
                                :href="route('Landing.About')"
                                :active="route().current('Landing.About')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('Landing.About') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    About
                                </span>
                                <span
                                    v-if="route().current('Landing.About')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>

                            <!-- Contact Link -->
                            <NavLink
                                :href="route('Landing.Contact')"
                                :active="route().current('Landing.Contact')"
                                class="relative rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-105 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md"
                                :class="route().current('Landing.Contact') ? 'bg-blue-50 text-blue-600 shadow-md' : ''"
                            >
                                <span class="flex items-center">
                                    <svg
                                        class="mr-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />
                                    </svg>
                                    Contact
                                </span>
                                <span
                                    v-if="route().current('Landing.Contact')"
                                    class="absolute bottom-0 left-0 right-0 mx-auto h-0.5 w-6 animate-pulse rounded-full bg-gradient-to-r from-blue-500 to-indigo-500"
                                ></span>
                            </NavLink>
                        </div>
                    </div>

                    <!-- Right side: Desktop User Menu -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <!-- Admin Badge -->
                        <div v-if="$page.props.auth.user?.role === 'admin'" class="mr-3 animate-pulse">
                            <div class="rounded-full bg-gradient-to-r from-purple-100 to-blue-100 px-3 py-1 shadow-md">
                                <span class="flex items-center text-xs font-medium text-purple-700">
                                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                        />
                                    </svg>
                                    Admin
                                </span>
                            </div>
                        </div>

                        <!-- User Dropdown -->
                        <div v-if="$page.props.auth.user" class="relative" ref="dropdownContainer">
                            <button
                                @click.stop="toggleDropdown"
                                class="group flex items-center space-x-2 rounded-full p-1.5 transition-all duration-300 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                aria-label="User menu"
                            >
                                <!-- Profile Picture -->
                                <div class="relative">
                                    <img
                                        v-if="getProfilePictureUrl($page.props.auth.user)"
                                        :src="getProfilePictureUrl($page.props.auth.user)"
                                        alt="Profile"
                                        class="h-8 w-8 rounded-full object-cover shadow-md ring-2 ring-white transition-all duration-300 group-hover:scale-105 group-hover:shadow-lg"
                                    />
                                    <div
                                        v-else
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 text-sm font-semibold text-white shadow-md transition-all duration-300 group-hover:scale-105 group-hover:shadow-lg"
                                    >
                                        {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
                                    </div>
                                </div>
                                <div class="hidden text-left md:block">
                                    <p class="text-sm font-medium text-gray-700">{{ $page.props.auth.user.name }}</p>
                                    <p class="text-xs text-gray-400">{{ $page.props.auth.user.email }}</p>
                                </div>
                                <svg
                                    class="h-4 w-4 text-gray-400 transition-all duration-300 group-hover:text-gray-600"
                                    :class="{ 'rotate-180': isDropdownOpen }"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>

                            <!-- Update only the Dropdown Menu section -->
                            <!-- Replace the existing dropdown menu with this refined version -->

                            <!-- Dropdown Menu -->
                            <Transition
                                enter-active-class="transition duration-200 ease-out"
                                enter-from-class="transform scale-95 opacity-0 translate-y-2"
                                enter-to-class="transform scale-100 opacity-100 translate-y-0"
                                leave-active-class="transition duration-150 ease-in"
                                leave-from-class="transform scale-100 opacity-100 translate-y-0"
                                leave-to-class="transform scale-95 opacity-0 translate-y-2"
                            >
                                <div
                                    v-if="isDropdownOpen"
                                    class="absolute right-0 mt-2 w-80 origin-top-right rounded-2xl bg-white py-2 shadow-2xl ring-1 ring-black/5"
                                >
                                    <!-- User Info with Profile Picture -->
                                    <div class="border-b border-gray-100 px-4 py-3">
                                        <div class="flex items-center">
                                            <img
                                                v-if="getProfilePictureUrl($page.props.auth.user)"
                                                :src="getProfilePictureUrl($page.props.auth.user)"
                                                alt="Profile"
                                                class="h-12 w-12 rounded-full object-cover ring-2 ring-blue-500/20"
                                            />
                                            <div
                                                v-else
                                                class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 text-lg font-semibold text-white shadow-lg"
                                            >
                                                {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-semibold text-gray-900">{{ $page.props.auth.user.name }}</p>
                                                <p class="truncate text-xs text-gray-500">{{ $page.props.auth.user.email }}</p>
                                                <div v-if="$page.props.auth.user?.role === 'admin'" class="mt-1">
                                                    <span
                                                        class="inline-flex items-center rounded-full bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-700"
                                                    >
                                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                                            />
                                                        </svg>
                                                        Administrator
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- My Account & Admin Panel - Two main buttons (Elegant & Subtle) -->
                                    <div class="border-b border-gray-100 px-3 py-3">
                                        <!-- My Account Button - Subtle hover effect -->
                                        <Link
                                            :href="route('profile.edit')"
                                            class="group flex items-center rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition-all duration-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600"
                                        >
                                            <svg
                                                class="mr-3 h-4 w-4 text-gray-400 transition-colors group-hover:text-blue-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                />
                                            </svg>
                                            <span>My Account</span>
                                            <span
                                                class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs text-gray-500 transition-colors group-hover:bg-blue-100 group-hover:text-blue-600"
                                                >Profile</span
                                            >
                                        </Link>

                                        <!-- Admin Panel Button - Subtle hover effect (Only for admins) -->
                                        <Link
                                            v-if="$page.props.auth.user?.role === 'admin'"
                                            :href="route('admin.dashboard')"
                                            class="group mt-2 flex items-center rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition-all duration-200 hover:border-purple-300 hover:bg-purple-50 hover:text-purple-600"
                                        >
                                            <svg
                                                class="mr-3 h-4 w-4 text-gray-400 transition-colors group-hover:text-purple-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                                />
                                            </svg>
                                            <span>Admin Panel</span>
                                            <span
                                                class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs text-gray-500 transition-colors group-hover:bg-purple-100 group-hover:text-purple-600"
                                                >Admin</span
                                            >
                                        </Link>
                                    </div>

                                    <!-- Quick Links -->
                                    <div class="px-3 py-2">
                                        <div class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-gray-400">Quick Links</div>

                                        <!-- My Courses -->
                                        <DropdownLink
                                            :href="route('my-courses')"
                                            class="flex items-center rounded-xl px-3 py-2 text-sm text-gray-700 transition-all duration-200 hover:bg-gray-50 hover:pl-4"
                                        >
                                            <svg class="mr-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                                />
                                            </svg>
                                            My Courses
                                            <span class="ml-auto text-xs text-gray-400">📚</span>
                                        </DropdownLink>
                                    </div>

                                    <!-- Logout -->
                                    <div class="border-t border-gray-100 px-3 py-2">
                                        <form @submit.prevent="logout">
                                            <button
                                                type="submit"
                                                class="flex w-full items-center rounded-xl px-3 py-2 text-sm text-red-600 transition-all duration-200 hover:bg-red-50 hover:pl-4"
                                            >
                                                <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                                    />
                                                </svg>
                                                Sign Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </Transition>
                        </div>

                        <!-- Guest Display - Simple and Clean -->
                        <div v-else class="flex items-center space-x-3">
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-gray-400 to-gray-500 text-sm font-semibold text-white shadow-md"
                            >
                                G
                            </div>
                            <span class="text-sm font-medium text-gray-700">Guest</span>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="rounded-lg p-2 text-gray-500 transition-all duration-200 hover:bg-gray-100 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                                :class="{ hidden: showingNavigationDropdown, block: !showingNavigationDropdown }"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                                :class="{ hidden: !showingNavigationDropdown, block: showingNavigationDropdown }"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <Transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0"
            >
                <div
                    v-show="showingNavigationDropdown"
                    class="fixed inset-x-0 top-16 border-t border-gray-200 bg-white/95 shadow-lg backdrop-blur-sm sm:hidden"
                >
                    <div class="space-y-1 px-4 pb-3 pt-2">
                        <div class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Navigation</div>

                        <ResponsiveNavLink
                            :href="route('landing.Index')"
                            :active="route().current('landing.Index')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                            Home
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                            Dashboard
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            :href="route('courses.public.index')"
                            :active="route().current('courses.public.*')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                />
                            </svg>
                            Courses
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="$page.props.auth.user"
                            :href="route('my-courses')"
                            :active="route().current('my-courses')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                />
                            </svg>
                            My Courses
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            :href="route('Landing.About')"
                            :active="route().current('Landing.About')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            About
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            :href="route('Landing.Contact')"
                            :active="route().current('Landing.Contact')"
                            class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-blue-50 hover:pl-4"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                            Contact
                        </ResponsiveNavLink>

                        <!-- Admin Panel for Mobile -->
                        <ResponsiveNavLink
                            v-if="$page.props.auth.user?.role === 'admin'"
                            :href="route('admin.dashboard')"
                            :active="route().current('admin.*')"
                            class="flex items-center rounded-lg bg-gradient-to-r from-purple-600 to-blue-600 px-3 py-2 text-white transition-all duration-300 hover:scale-105"
                        >
                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Admin Panel
                            <span class="ml-auto rounded-full bg-white/20 px-2 py-0.5 text-xs">Admin</span>
                        </ResponsiveNavLink>
                    </div>

                    <!-- Mobile User Info -->
                    <div v-if="$page.props.auth.user" class="border-t border-gray-200 bg-gray-50 px-4 py-4">
                        <div class="flex items-center">
                            <img
                                v-if="getProfilePictureUrl($page.props.auth.user)"
                                :src="getProfilePictureUrl($page.props.auth.user)"
                                alt="Profile"
                                class="h-10 w-10 rounded-full object-cover ring-2 ring-blue-500/20"
                            />
                            <div
                                v-else
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-600 font-semibold text-white"
                            >
                                {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-gray-800">{{ $page.props.auth.user.name }}</div>
                                <div class="text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                                <div v-if="$page.props.auth.user?.role === 'admin'" class="mt-1">
                                    <span class="inline-flex items-center rounded-full bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-700">
                                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                            />
                                        </svg>
                                        Administrator
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 space-y-1">
                            <ResponsiveNavLink
                                :href="route('profile.edit')"
                                :active="route().current('profile.edit')"
                                class="flex items-center rounded-lg px-3 py-2 transition-all duration-300 hover:bg-gray-100 hover:pl-4"
                            >
                                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                My Account
                            </ResponsiveNavLink>

                            <button
                                @click="logout"
                                class="flex w-full items-center rounded-lg px-3 py-2 text-left text-sm font-medium text-red-600 transition-all duration-300 hover:bg-red-50 hover:pl-4"
                            >
                                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>
                                Sign Out
                            </button>
                        </div>
                    </div>

                    <!-- Guest Mobile Info -->
                    <div v-else class="border-t border-gray-200 bg-gray-50 px-4 py-4">
                        <div class="flex flex-col space-y-2">
                            <ResponsiveNavLink
                                :href="route('login')"
                                class="flex items-center rounded-lg px-3 py-2 text-indigo-600 transition-all duration-300 hover:bg-indigo-50 hover:pl-4"
                            >
                                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                    />
                                </svg>
                                Login
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('register')"
                                class="flex items-center rounded-lg bg-gradient-to-r from-indigo-600 to-blue-600 px-3 py-2 text-white transition-all duration-300 hover:scale-105"
                            >
                                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                                    />
                                </svg>
                                Register
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </Transition>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 pt-16">
            <!-- Page Header -->
            <header v-if="$slots.header" class="bg-white/80 shadow-sm backdrop-blur-sm">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Main Content -->
            <main class="py-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <slot />
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="mt-auto border-t border-gray-800 bg-black">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
                    <!-- Brand Column -->
                    <div class="lg:col-span-1">
                        <Link :href="route('dashboard')" class="flex items-center">
                            <ApplicationLogo class="h-8 w-auto fill-current text-white" />
                            <span class="ml-3 text-xl font-bold text-white">IT Institute</span>
                        </Link>
                        <p class="mt-4 text-sm leading-relaxed text-gray-400">
                            Empowering the next generation of IT professionals through quality education and hands-on training.
                        </p>
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-500 transition-all duration-300 hover:scale-110 hover:text-blue-400">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 transition-all duration-300 hover:scale-110 hover:text-blue-400">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 transition-all duration-300 hover:scale-110 hover:text-pink-400">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 transition-all duration-300 hover:scale-110 hover:text-blue-400">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Quick Links</h3>
                        <ul class="mt-4 space-y-3">
                            <li>
                                <Link :href="route('dashboard')" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >Dashboard</Link
                                >
                            </li>
                            <li>
                                <Link
                                    :href="route('courses.public.index')"
                                    class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >All Courses</Link
                                >
                            </li>
                            <li>
                                <Link
                                    :href="route('my-courses')"
                                    class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >My Courses</Link
                                >
                            </li>
                            <li>
                                <Link
                                    :href="route('landing.Index')"
                                    class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >Home</Link
                                >
                            </li>
                            <li>
                                <Link
                                    :href="route('Landing.About')"
                                    class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >About</Link
                                >
                            </li>
                            <li>
                                <Link
                                    :href="route('Landing.Contact')"
                                    class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >Contact</Link
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Categories -->
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Top Categories</h3>
                        <ul class="mt-4 space-y-3">
                            <li>
                                <a href="#" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white">Web Development</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white">Data Science</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white">Cybersecurity</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white">Cloud Computing</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-400 transition-all duration-300 hover:pl-2 hover:text-white"
                                    >Mobile Development</a
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Contact Us</h3>
                        <ul class="mt-4 space-y-3">
                            <li class="flex items-start text-sm text-gray-400">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Dishari 36, Hawapara<br />Sylhet 3150, Bangladesh</span>
                            </li>
                            <li class="flex items-center text-sm text-gray-400">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>
                                <a href="tel:+8801795547756" class="transition-all duration-300 hover:scale-105 hover:text-white">+8801795547756</a>
                            </li>
                            <li class="flex items-center text-sm text-gray-400">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                                <a href="mailto:shoyondeb18246@itinstitute.com" class="transition-all duration-300 hover:scale-105 hover:text-white"
                                    >shoyondeb18246@itinstitute.com</a
                                >
                            </li>
                        </ul>

                        <!-- Newsletter -->
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold text-white">Stay Updated</h4>
                            <p class="mt-2 text-sm text-gray-400">Subscribe to our newsletter for latest courses and updates.</p>
                            <form class="mt-3 flex">
                                <input
                                    type="email"
                                    placeholder="Your email"
                                    class="flex-1 rounded-l-lg border border-gray-700 bg-gray-800 px-4 py-2 text-sm text-white placeholder-gray-500 transition-all duration-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                                <button
                                    type="submit"
                                    class="rounded-r-lg bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-sm font-medium text-white transition-all duration-300 hover:scale-105 hover:from-blue-700 hover:to-indigo-700"
                                >
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="mt-8 border-t border-gray-800 pt-8">
                    <div class="flex flex-col items-center justify-between md:flex-row">
                        <p class="text-sm text-gray-500">&copy; {{ new Date().getFullYear() }} IT Institute. All rights reserved.</p>
                        <div class="mt-4 flex space-x-6 text-sm text-gray-500 md:mt-0">
                            <a href="#" class="transition-all duration-300 hover:scale-105 hover:text-white">Privacy Policy</a>
                            <a href="#" class="transition-all duration-300 hover:scale-105 hover:text-white">Terms of Service</a>
                            <a href="#" class="transition-all duration-300 hover:scale-105 hover:text-white">Cookie Policy</a>
                            <a href="#" class="transition-all duration-300 hover:scale-105 hover:text-white">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { onBeforeUnmount, onMounted, ref } from 'vue';

const page = usePage();
const showingNavigationDropdown = ref(false);
const isDropdownOpen = ref(false);
const dropdownContainer = ref<HTMLElement | null>(null);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const closeDropdown = () => {
    isDropdownOpen.value = false;
};

// Helper function to get profile picture URL
const getProfilePictureUrl = (user: any) => {
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

// Close dropdown when clicking outside
const handleClickOutside = (event: MouseEvent) => {
    if (dropdownContainer.value && !dropdownContainer.value.contains(event.target as Node)) {
        closeDropdown();
    }
};

// Close dropdown on escape key
const handleEscapeKey = (event: KeyboardEvent) => {
    if (event.key === 'Escape') {
        closeDropdown();
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
    document.addEventListener('keydown', handleEscapeKey);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
    document.removeEventListener('keydown', handleEscapeKey);
});

const logout = () => {
    router.post(route('logout'));
};
</script>
