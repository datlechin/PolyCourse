<script setup>
import { defineLayout, Link } from '@inertiajs/vue3'
import { PlayCircleIcon } from '@heroicons/vue/24/solid'
import LearningLayout from '@/components/LearningLayout.vue'
import route from 'ziggy-js/src/js'
import { secondsToTime, dateFormat } from '@/helpers'

defineLayout(LearningLayout)

defineProps({
    course: Object,
})
</script>

<template>
    <div class="grid md:grid-cols-4">
        <div class="md:col-span-1">
            <div class="md:fixed md:top-14 md:w-80">
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
        <div class="-order-1 md:col-span-3 h-full">
            <div>
                <iframe class="w-full h-96 md:h-[500px]" :src="course.lesson.youtube_url"/>
                <div class="mx-5 my-8 md:mx-20 md:my-8">
                    <h1 class="font-bold text-2xl md:text-3xl">{{ course.lesson.name }}</h1>
                    <div class="text-sm text-gray-600 mt-2">Cập nhật {{ dateFormat(course.lesson.updated_at) }}</div>
                    <div class="prose mt-8">
                        {{ course.lesson.content }}
                    </div>
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
