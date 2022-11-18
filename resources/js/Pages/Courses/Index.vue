<script setup>
import CourseList from "@/components/CourseList.vue";

defineProps({
    courses: Array,
})
</script>

<template>
    <div>
        <div class="mb-12">
            <h1 class="font-bold text-3xl">Khoá học</h1>
            <div class="mt-5">
                <p>Các khóa học được thiết kế phù hợp cho cả người mới, nhiều khóa học miễn phí, chất lượng, nội dung dễ hiểu.</p>
            </div>
        </div>
        <CourseList :courses="courses" />
    </div>
</template>
