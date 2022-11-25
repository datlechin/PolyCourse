<script setup>
import { Link } from "@inertiajs/vue3";
import { UserGroupIcon } from "@heroicons/vue/24/solid";

defineProps({
    course: Object,
})
</script>

<template>
    <div>
        <Link :href="`/courses/${course.slug}`">
            <img :src="course.thumbnail_url" :alt="course.name" class="w-full rounded-[16px]">
        </Link>
        <h3 class="font-semibold truncate my-3">
            <Link :href="`/courses/${course.slug}`" v-text="course.name" />
        </h3>
        <div class="flex items-center text-gray-500">
            <UserGroupIcon class="w-4 h-4 mr-1" />
           <span class="text-xs">{{ course.students_count }} học viên</span>
        </div>
    </div>
</template>
