<script setup>
import { StarIcon } from '@heroicons/vue/24/solid'
import { Link } from '@inertiajs/vue3'
import { ChevronLeftIcon } from '@heroicons/vue/24/solid'
import route from 'ziggy-js/src/js'
import ReviewForm from '@/components/ReviewForm.vue'

defineProps({
    course: Object,
})
</script>

<template>
    <header class="sticky top-0 flex justify-between items-center bg-gray-800 h-12 px-7">
        <div class="flex items-center">
            <Link :href="route('home')" class="mr-7">
                <ChevronLeftIcon class="text-white w-5 h-5" />
            </Link>
            <div class="flex items-center">
                <img src="@/../images/logo.png" alt="" class="w-8 h-8 rounded-lg">
                <span class="text-white font-bold ml-3" v-text="course.name" />
            </div>
        </div>
        <div>
            <div v-if="!course.is_reviewed" class="flex items-center text-white cursor-pointer">
                <StarIcon class="w-4 h-4" />
                <span class="text-sm ml-2">Đánh giá</span>
            </div>
        </div>
    </header>
    <main>
        <slot />
        <ReviewForm v-if="!course.is_reviewed" :course="course" />
    </main>

    <footer>
    </footer>
</template>
