<!-- resources/js/Components/TypingText.vue -->
<template>
    <span>
        <span>{{ displayedText }}</span>
        <span class="animate-blink" v-if="!isComplete">|</span>
    </span>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';

const props = defineProps<{
    text: string;
    speed?: number;
    delay?: number;
}>();

const displayedText = ref('');
const isComplete = ref(false);

onMounted(() => {
    setTimeout(() => {
        let index = 0;
        const interval = setInterval(() => {
            if (index <= props.text.length) {
                displayedText.value = props.text.slice(0, index);
                index++;
            } else {
                clearInterval(interval);
                isComplete.value = true;
            }
        }, props.speed || 50);
    }, props.delay || 500);
});
</script>

<style scoped>
@keyframes blink {
    0%,
    50% {
        opacity: 1;
    }
    51%,
    100% {
        opacity: 0;
    }
}

.animate-blink {
    animation: blink 0.8s step-end infinite;
    display: inline-block;
    font-weight: 300;
    color: #60a5fa;
}
</style>
