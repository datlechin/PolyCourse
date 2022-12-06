<script setup>
import { ref } from 'vue'
import { StarIcon } from '@heroicons/vue/24/solid'
import { Link } from '@inertiajs/vue3'
import { ChevronLeftIcon } from '@heroicons/vue/24/solid'
import route from 'ziggy-js/src/js'
import ReviewForm from '@/components/ReviewForm.vue'

defineProps({
    course: Object,
})

const isOpenReviewModal = ref(false)
</script>

<template>
    <header class="sticky top-0 flex items-center justify-between h-12 bg-gray-800 px-7">
        <div class="flex items-center">
            <Link :href="route('home')" class="mr-7">
                <ChevronLeftIcon class="w-5 h-5 text-white" />
            </Link>
            <div class="flex items-center">
                <img src="@/../images/logo.png" alt="" class="w-8 h-8 rounded-lg">
                <span class="ml-3 font-bold text-white" v-text="course.name" />
            </div>
        </div>
        <div>
            <div @click="isOpenReviewModal = true" v-if="!course.is_reviewed" class="flex items-center text-white cursor-pointer">
                <StarIcon class="w-4 h-4" />
                <span class="ml-2 text-sm">Đánh giá</span>
            </div>
        </div>
    </header>
    <main>
        <slot />
        <ReviewForm v-if="isOpenReviewModal && !course.is_reviewed" :course="course" />
    </main>

    <footer>
    </footer>
</template>
