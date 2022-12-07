<script setup>
import { defineLayout, Link , Head } from '@inertiajs/vue3'
import { PlayCircleIcon } from '@heroicons/vue/24/solid'
import LearningLayout from '@/components/LearningLayout.vue'
import route from 'ziggy-js/src/js'
import { secondsToTime, dateFormat } from '@/helpers'
import ReviewList from '@/components/ReviewList.vue'

defineLayout(LearningLayout)

defineProps({
    course: Object,
    lesson: Object,
})
</script>

<template>
    <Head :title="course.lesson.name" />
    <div class="grid md:grid-cols-4">
        <div class="md:col-span-1">
            <div class="w-full md:fixed md:top-14">
                <div class="py-3 px-5 font-semibold shadow">
                    Nội dung khoá học
                </div>
                <ul class="h-screen overflow-y-auto scrollbar">
                    <li
                        v-for="(lesson, index) in course.lessons"
                        :key="index"
                        class="px-5 py-3 hover:bg-gray-200"
                        :class="{ 'bg-gray-200': lesson.id === course.lesson.id }"
                    >
                        <Link :href="route('learning', { course: course.slug, lesson: lesson.id})">
                            <div :class="{ 'font-semibold': lesson.id === course.lesson.id }">
                                {{ index + 1 }}.
                                {{ lesson.name }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <PlayCircleIcon class="w-3 h-3 mr-1" />
                                <span class="text-sm">{{ secondsToTime(lesson.time_duration) }}</span>
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="-order-1 md:col-span-3">
            <div class="h-full">
                <iframe class="md:h-[500px] w-full" :src="course.lesson.youtube_url" :title="course.lesson.name" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="mx-5 my-8 md:mx-20 md:my-8">
                    <h1 class="font-bold text-2xl md:text-3xl">{{ course.lesson.name }}</h1>
                    <div class="text-sm text-gray-600 mt-2">Cập nhật {{ dateFormat(course.lesson.updated_at) }}</div>
                    <div class="prose mt-8">
                        {{ course.lesson.content }}
                    </div>
                    <ReviewList :reviews="course.reviews" />
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.scrollbar::-webkit-scrollbar {
    width: 5px;
}

.scrollbar::-webkit-scrollbar-thumb {
    @apply bg-gray-400 rounded-lg;
}

.scrollbar::-webkit-scrollbar-thumb:hover {
    background: #c0a0b9;
}
</style>
