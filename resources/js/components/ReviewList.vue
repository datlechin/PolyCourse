<script setup>
import ReviewItem from '@/components/ReviewItem.vue'

defineProps({
    reviews: Array,
})
</script>

<template>
    <div class="mt-12 space-y-6 border-t pt-7">
        <ReviewItem
            v-for="(review, index) in reviews"
            :key="index"
            :review="review"
        />
    </div>
</template>
