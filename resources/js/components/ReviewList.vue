<script setup>
import ReviewItem from '@/components/ReviewItem.vue'

defineProps({
    reviews: Array,
})
</script>

<template>
    <div>
        <ReviewItem
            v-for="(review, index) in reviews"
            :key="index"
            :review="review"
        />
    </div>
</template>
