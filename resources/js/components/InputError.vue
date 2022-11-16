<script setup>
defineProps({
    message: String,
})
</script>

<template>
    <div
        v-if="message"
        v-text="message"
        class="text-sm text-red-600 my-1.5 mx-0.5"
    />
</template>
