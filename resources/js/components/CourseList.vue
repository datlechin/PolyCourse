<script setup>
import { Link } from '@inertiajs/vue3'
import { ChevronRightIcon } from "@heroicons/vue/24/outline"
import route from 'ziggy-js/src/js'
import CourseItem from '@/components/CourseItem.vue'

defineProps({
    courses: Array,
})
</script>

<template>
    <div>
        <div class="flex justify-between">
            <h2 class="mb-3 text-2xl font-bold">Khoá học</h2>
            <Link
                v-if="!$page.component.startsWith('Courses')"
                :href="route('courses.index')"
                class="group flex items-center text-blue-500 hover:translate-x-0.5 font-semibold hover:underline"
            >
                Xem tất cả
                <ChevronRightIcon class="w-4 h-4 group-hover:translate-x-0.5" />
            </Link>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <CourseItem
                v-for="(course, index) in courses"
                :key="index"
                :course="course"
            />
        </div>
    </div>
</template>
