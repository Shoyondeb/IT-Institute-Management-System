<!-- resources/js/Components/DescriptionModal.vue -->
<template>
    <TransitionRoot appear :show="open" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-50">
            <!-- Backdrop -->
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/70 backdrop-blur-sm" />
            </TransitionChild>

            <!-- Modal Panel -->
            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-3xl transform overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-indigo-950 to-purple-900 p-6 shadow-2xl ring-1 ring-white/20 backdrop-blur-2xl transition-all"
                        >
                            <!-- Header -->
                            <div class="mb-6 flex items-start justify-between">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg shadow-indigo-500/30"
                                    >
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <DialogTitle as="h3" class="text-xl font-bold text-white"> Course Description </DialogTitle>
                                        <p class="text-sm text-indigo-300">{{ title }}</p>
                                    </div>
                                </div>
                                <button
                                    @click="closeModal"
                                    class="rounded-full p-2 text-indigo-400 transition-all hover:bg-white/10 hover:text-white"
                                >
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Content -->
                            <div class="relative">
                                <div class="absolute -left-4 top-0 h-full w-1 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"></div>
                                <div class="pl-4">
                                    <div class="description-content custom-scrollbar max-h-[60vh] overflow-y-auto pr-2">
                                        <div
                                            v-html="formattedDescription"
                                            class="prose prose-invert prose-sm md:prose-base max-w-none text-indigo-100/90"
                                        ></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="mt-6 flex justify-end border-t border-white/10 pt-4">
                                <button
                                    @click="closeModal"
                                    class="rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-2.5 text-sm font-medium text-white shadow-lg shadow-indigo-500/30 transition-all hover:scale-105 hover:shadow-indigo-500/50"
                                >
                                    Close
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup lang="ts">
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { computed } from 'vue';

const props = defineProps<{
    open: boolean;
    description: string;
    title?: string;
}>();

const emit = defineEmits<{
    (e: 'close'): void;
}>();

const closeModal = () => {
    emit('close');
};

// Format description with proper HTML structure
const formattedDescription = computed(() => {
    let content = props.description || '';

    // Split into sections by double newlines
    const sections = content.split(/\n\s*\n/);

    if (sections.length > 1) {
        return sections
            .map((section) => {
                const trimmed = section.trim();
                if (!trimmed) return '';

                const lines = trimmed.split('\n');
                const firstLine = lines[0]?.trim() || '';

                // Detect headings
                const isHeading =
                    firstLine === firstLine.toUpperCase() ||
                    firstLine.endsWith(':') ||
                    /^(what|why|how|when|where|course|learning|outcomes|requirements|prerequisites|benefits)/i.test(firstLine);

                if (isHeading && lines.length > 1) {
                    const heading = firstLine.replace(/[: ]+$/, '');
                    const contentText = lines.slice(1).join(' ').trim();
                    return `<h4>${heading}</h4><p>${contentText}</p>`;
                }

                return `<p>${trimmed}</p>`;
            })
            .join('');
    }

    // Single section
    return content
        .split('\n')
        .filter((line) => line.trim())
        .map((line) => `<p>${line.trim()}</p>`)
        .join('');
});
</script>

<style scoped>
.description-content {
    & > * + * {
        margin-top: 0.75rem;
    }

    h4 {
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: rgb(165, 180, 252);
        margin-top: 1.25rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;

        &::before {
            content: '';
            display: inline-block;
            width: 0.25rem;
            height: 1rem;
            border-radius: 999px;
            background: linear-gradient(to bottom, rgb(99, 102, 241), rgb(168, 85, 247));
            flex-shrink: 0;
        }
    }

    p {
        margin: 0.5rem 0;
        line-height: 1.75;
        color: rgba(224, 231, 255, 0.9);
    }

    ul,
    ol {
        list-style: none;
        padding-left: 0;
        margin: 0.5rem 0;

        li {
            padding-left: 1.5rem;
            position: relative;
            margin: 0.25rem 0;
            line-height: 1.6;
            color: rgba(224, 231, 255, 0.9);

            &::before {
                content: '▹';
                position: absolute;
                left: 0;
                color: rgb(165, 180, 252);
                font-weight: 600;
            }
        }
    }

    strong,
    b {
        color: white;
        font-weight: 600;
    }

    pre,
    code {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 0.5rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        color: rgb(196, 181, 253);
        font-family: 'Courier New', monospace;
    }

    blockquote {
        border-left: 2px solid rgb(99, 102, 241);
        padding-left: 1rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        margin: 1rem 0;
        background: rgba(99, 102, 241, 0.05);
        border-radius: 0.5rem;
        color: rgb(196, 181, 253);
    }

    a {
        color: rgb(129, 140, 248);
        text-decoration: underline;
        text-underline-offset: 2px;
        transition: color 0.2s;

        &:hover {
            color: rgb(165, 180, 252);
        }
    }
}

.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.3);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(99, 102, 241, 0.5);
}
</style>
