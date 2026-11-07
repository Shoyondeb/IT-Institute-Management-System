<template>
    <Link :href="route('courses.public.show', course.id)" class="group block overflow-hidden rounded-xl bg-white shadow-lg transition-all hover:shadow-xl">
        <div class="relative h-48 overflow-hidden">
            <img
                v-if="course.thumbnail"
                :src="course.thumbnail"
                :alt="course.title"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
            />
            <div v-else class="flex h-full w-full items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600">
                <span class="text-4xl font-bold text-white">{{ course.title.charAt(0) }}</span>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 transition-opacity group-hover:opacity-100"></div>
        </div>

        <div class="p-5">
            <div class="flex items-start justify-between">
                <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">{{ course.title }}</h3>
                <span v-if="course.price" class="ml-2 rounded-full bg-indigo-100 px-3 py-1 text-sm font-semibold text-indigo-700">
                    ${{ course.price }}
                </span>
                <span v-else class="ml-2 rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                    Free
                </span>
            </div>

            <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ course.description || 'No description available' }}</p>

            <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-4">
                <div class="flex items-center space-x-1 text-sm text-gray-500">
                    <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span>{{ course.rating || '4.5' }}</span>
                    <span class="mx-1">·</span>
                    <span>{{ course.students_count || 0 }} students</span>
                </div>

                <div v-if="course.category" class="text-xs text-gray-400">
                    {{ course.category.name }}
                </div>
            </div>

            <div class="mt-3 flex items-center justify-between">
                <div v-if="course.instructor" class="flex items-center space-x-2">
                    <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-semibold text-indigo-600">
                        {{ course.instructor.name?.charAt(0) || 'I' }}
                    </div>
                    <span class="text-sm text-gray-600">{{ course.instructor.name || 'Instructor' }}</span>
                </div>

                <span class="text-sm font-medium text-indigo-600 opacity-0 transition-opacity group-hover:opacity-100">
                    View Course →
                </span>
            </div>
        </div>
    </Link>
</template>

<script setup>
defineProps({
    course: {
        type: Object,
        required: true,
        default: () => ({
            id: null,
            title: '',
            description: '',
            thumbnail: null,
            price: null,
            rating: null,
            students_count: 0,
            category: null,
            instructor: null
        })
    }
});
</script>

<style scoped>
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
