<script setup>
import { CheckIcon, PlayCircleIcon } from "@heroicons/vue/24/solid";

defineProps({
    course: Object,
})
</script>

<template>
    <div class="grid grid-cols-3">
        <div class="col-span-2 space-y-9">
            <h1 class="text-4xl font-bold my-4">{{ course.name }}</h1>
            <div v-if="course.subtitle">
                {{ course.subtitle }}
            </div>
            <div v-if="course.learn_goals">
                <h2 class="font-bold text-xl">Bạn sẽ học được gì?</h2>
                <ul class="mt-3 flex items-center flex-wrap">
                    <li
                        v-for="({ text }, index) in course.learn_goals"
                        :key="index"
                        class="basis-1/2 flex items-center mb-4"
                    >
                        <CheckIcon class="mr-2 text-blue-500 w-4 h-4" />
                        <span v-text="text" />
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold">Nội dung khoá học</h2>
            </div>
            <div v-if="course.requirements">
                <h2 class="text-xl font-bold">Yêu cầu</h2>
                <ul class="mt-3">
                    <li
                        v-for="({ text }, index) in course.requirements"
                        :key="index"
                        class="flex items-center mb-3"
                    >
                        <CheckIcon class="mr-2 text-blue-500 w-4 h-4" />
                        <span v-text="text" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-1 ml-10 mt-5">
            <div class="relative cursor-pointer">
                <div
                    :style="`background-image: url(${course.thumbnail_url})`"
                    class="pt-[56%] bg-contain rounded-2xl"
                />
                <PlayCircleIcon class="w-16 h-16 text-white absolute inset-1/2 top-[32%] left-[40%]" />
                <p class="absolute w-full text-center my-3 text-white font-semibold bottom-0">Xem giới thiệu khoá học</p>
            </div>
            <div class="text-center mt-5">
                <h2 class="text-3xl text-blue-500 mb-4">{{ course.price === 0 ? 'Miễn phí' : course.price }}</h2>
                <button class="bg-blue-500 uppercase font-semibold text-white px-7 py-2 rounded-full hover:bg-blue-700">Đăng ký học</button>
            </div>
        </div>
    </div>
</template>
