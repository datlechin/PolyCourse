<script setup>
import CourseItem from "@/components/CourseItem.vue";

defineProps({
    courses: Array,
})
</script>

<template>
    <div>
        <CourseItem
            v-for="(course, index) in courses"
            :key="index"
            :course="course"
        />
    </div>
</template>
