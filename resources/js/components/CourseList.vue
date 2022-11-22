<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { ChevronRightIcon } from "@heroicons/vue/24/outline"
import CourseItem from "@/components/CourseItem.vue";

defineProps({
    courses: Array,
})
</script>

<template>
    <div>
        <div class="flex justify-between">
            <h2 class="font-bold text-2xl mb-3">Khoá học</h2>
            <Link
                v-if="!$page.component.startsWith('Courses')"
                href="/courses"
                class="flex items-center text-blue-500 font-semibold hover:underline"
            >
                Xem tất cả
                <ChevronRightIcon class="w-4 h-4" />
            </Link>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <CourseItem
                v-for="(course, index) in courses"
                :key="index"
                :course="course"
            />
        </div>
    </div>
</template>
