<script setup>
import { defineLayout, Link } from '@inertiajs/vue3'
import { PlayCircleIcon } from '@heroicons/vue/24/solid'
import LearningLayout from '@/components/LearningLayout.vue'
import route from "ziggy-js/src/js";

defineLayout(LearningLayout)

defineProps({
    course: Object,
})
</script>

<template>
    <div class="grid grid-cols-4">
        <div class="col-span-1 overflow-auto">
            <div class="py-3 px-5 font-semibold">
                Nội dung khoá học
            </div>
            <ul class="overflow-y-clip">
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
                            <span class="text-sm">{{ lesson.time_duration }}</span>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>
        <div class="col-span-3">
            <iframe :src="course.lesson.youtube_url" height="100%" width="100%" />
        </div>
    </div>
</template>
