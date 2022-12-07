<script setup>
import { Head } from '@inertiajs/vue3'
import CourseList from '@/components/CourseList.vue'
import PostList from '@/components/PostList.vue'

defineProps({
    courses: Array,
    posts: Array,
})
</script>

<template>
    <Head title="Trang chủ" />
    <div class="space-y-7">
        <CourseList :courses="courses" />
        <PostList :posts="posts" />
    </div>
</template>
