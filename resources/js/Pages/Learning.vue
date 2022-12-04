<script setup>
import { defineLayout , Link , usePage } from '@inertiajs/vue3'
import { PlayCircleIcon } from '@heroicons/vue/24/solid'
import LearningLayout from '@/components/LearningLayout.vue'
import route from 'ziggy-js/src/js'
import { secondsToTime, dateFormat } from '@/helpers'
import ReviewList from '@/components/ReviewList.vue'

defineLayout(LearningLayout)

defineProps({
    course: Object,
})
</script>

<template>
    <div class="grid grid-cols-4">
        <div class="col-span-1">
            <div class="fixed top-14 w-80">
                <div class="py-3 px-5 font-semibold shadow">
                    Nội dung khoá học
                </div>
                <ul class="overflow-y-auto h-screen scrollbar">
                    <li
                        v-for="(lesson, index) in course.lessons"
                        :key="index"
                        class="py-3 px-5 hover:bg-gray-200"
                    >
                        <Link :href="route('learning', { course: course.slug, lesson: lesson.id})">
                            <div>
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
            <iframe :src="course.lesson.youtube_url" height="170%" width="100%" />
            <div class="mx-20 my-8">
                <h1 class="font-bold text-3xl">{{ course.lesson.name }}</h1>
                <div class="text-sm text-gray-600 mt-2">Cập nhật {{ dateFormat(course.lesson.updated_at) }}</div>
                <div class="prose mt-8">
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
