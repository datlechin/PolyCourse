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
    <div class="grid grid-cols-4">
        <div class="col-span-1">
            <div class="fixed top-14 w-80">
                <div class="px-5 py-3 font-semibold shadow">
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
        <div class="col-span-3">
            <iframe class="mx-auto" :src="course.lesson.youtube_url" height="480" width="99%" />
            <div class="mx-10 my-8">
                <h1 class="text-3xl font-bold">{{ course.lesson.name }}</h1>
                <div class="mt-2 text-sm text-gray-600">Cập nhật {{ dateFormat(course.lesson.updated_at) }}</div>
                <div class="mt-8 prose">
                    {{ course.lesson.content }}
                </div>
                <ReviewList :reviews="course.reviews" />
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
