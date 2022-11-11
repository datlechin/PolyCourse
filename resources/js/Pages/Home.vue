<script setup>
import CourseList from "@/components/CourseList.vue";
import PostList from "@/components/PostList.vue";

const props = defineProps({
    courses: Array,
    posts: Array,
})
</script>

<template>
    <div class="bg-gray-500">
        <CourseList :courses="courses" />
        <PostList :posts="posts" />
    </div>
</template>
