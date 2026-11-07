<!-- resources/js/Components/FileInput.vue -->
<template>
    <div class="file-input-wrapper">
        <div
            class="relative flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 p-6 transition-all hover:border-indigo-400 hover:bg-gray-50"
            :class="{ 'border-indigo-500 bg-indigo-50': isDragging }"
            @dragover.prevent="isDragging = true"
            @dragleave.prevent="isDragging = false"
            @drop.prevent="handleDrop"
        >
            <!-- Preview Image -->
            <div v-if="previewUrl" class="relative mb-3">
                <img :src="previewUrl" alt="Profile preview" class="h-32 w-32 rounded-full object-cover ring-4 ring-indigo-500/20" />
                <button
                    @click.prevent="removeImage"
                    class="absolute -right-1 -top-1 rounded-full bg-red-500 p-1 text-white shadow-lg hover:bg-red-600"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Upload Icon -->
            <div v-else class="mb-3">
                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                </svg>
            </div>

            <!-- Text -->
            <div class="text-center">
                <p v-if="!previewUrl" class="text-sm text-gray-600">
                    <span class="font-semibold text-indigo-600">Click to upload</span> or drag and drop
                </p>
                <p v-else class="text-sm text-green-600">✓ Image uploaded successfully</p>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
            </div>

            <input ref="fileInput" type="file" accept="image/*" class="absolute inset-0 cursor-pointer opacity-0" @change="handleFileChange" />
        </div>

        <!-- Error Message -->
        <p v-if="error" class="mt-2 text-sm text-red-600">
            {{ error }}
        </p>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    modelValue: {
        type: File,
        default: null,
    },
    existingImage: {
        type: String,
        default: null,
    },
});

const emit = defineEmits(['update:modelValue', 'remove']);

const fileInput = ref(null);
const isDragging = ref(false);
const previewUrl = ref(props.existingImage || null);
const error = ref('');

// Watch for existing image changes
watch(
    () => props.existingImage,
    (newVal) => {
        if (newVal) {
            previewUrl.value = newVal;
        }
    },
);

// Watch for model value changes
watch(
    () => props.modelValue,
    (newVal) => {
        if (newVal === null && !props.existingImage) {
            previewUrl.value = null;
        }
    },
);

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        validateAndUpload(file);
    }
};

const handleDrop = (event) => {
    isDragging.value = false;
    const file = event.dataTransfer.files[0];
    if (file) {
        validateAndUpload(file);
    }
};

const validateAndUpload = (file) => {
    error.value = '';

    // Validate file type
    const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    if (!validTypes.includes(file.type)) {
        error.value = 'Please upload a valid image file (JPEG, PNG, GIF)';
        return;
    }

    // Validate file size (2MB)
    if (file.size > 2 * 1024 * 1024) {
        error.value = 'Image size must be less than 2MB';
        return;
    }

    // Create preview
    const reader = new FileReader();
    reader.onload = (e) => {
        previewUrl.value = e.target.result;
    };
    reader.readAsDataURL(file);

    // Emit the file
    emit('update:modelValue', file);
};

const removeImage = () => {
    previewUrl.value = null;
    emit('update:modelValue', null);
    emit('remove');
    if (fileInput.value) {
        fileInput.value.value = '';
    }
};
</script>

<style scoped>
.file-input-wrapper {
    width: 100%;
}
</style>
