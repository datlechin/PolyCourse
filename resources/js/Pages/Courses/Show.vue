<script setup>
import { Head, router } from '@inertiajs/vue3'
import { CheckIcon, PlayCircleIcon } from '@heroicons/vue/24/solid';
import { priceFormat, secondsToTime } from '@/helpers'
import route from 'ziggy-js/src/js'

const props = defineProps({
    course: Object,
})

const subscribe = () => {
    router.post(route('courses.subscribe', { slug: props.course.slug }))
}
</script>

<template>
    <Head :title="course.name" />
    <div class="block md:hidden text-center fixed bottom-0 left-0 w-full">
        <button class="bg-blue-500 uppercase w-full py-2 text-white">
            Đăng ký học
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-2 space-y-9">
            <h1 class="my-4 text-4xl font-bold">{{ course.name }}</h1>
            <div v-if="course.subtitle">
                {{ course.subtitle }}
            </div>
            <div v-if="course.learn_goals">
                <h2 class="text-xl font-bold">Bạn sẽ học được gì?</h2>
                <ul class="flex flex-wrap items-center mt-3">
                    <li
                        v-for="({ text }, index) in course.learn_goals"
                        :key="index"
                        class="flex items-center mb-4 basis-1/2"
                    >
                        <CheckIcon class="w-4 h-4 mr-2 text-blue-500" />
                        <span v-text="text" />
                    </li>
                </ul>
            </div>
            <div v-if="course.lessons_count > 0" class="space-y-3">
                <h2 class="text-xl font-bold">Nội dung khoá học</h2>
                <ul class="flex space-x-3">
                    <li>
                        <span class="font-bold">{{ course.lessons_count }}</span> bài học
                    </li>
                    <li>
                        •
                    </li>
                    <li>
                        Thời lượng <span class="font-bold">{{ secondsToTime(course.lessons_time_duration) }}</span>
                    </li>
                </ul>
                <ul class="space-y-2">
                    <li
                        v-for="(lesson, index) in course.lessons"
                        :key="index"
                        class="flex justify-between bg-gray-200 rounded-lg p-2.5 px-5"
                    >
                        <span class="flex items-center font-semibold">
                            <PlayCircleIcon class="w-4 h-4 mr-2 text-blue-500" />
                            {{ lesson.name }}
                        </span>
                        <span class="text-sm text-gray-600">
                            {{ secondsToTime(lesson.time_duration) }}
                        </span>
                    </li>
                </ul>
            </div>
            <div v-if="course.requirements">
                <h2 class="text-xl font-bold">Yêu cầu</h2>
                <ul class="mt-3">
                    <li
                        v-for="({ text }, index) in course.requirements"
                        :key="index"
                        class="flex items-center mb-3"
                    >
                        <CheckIcon class="w-4 h-4 mr-2 text-blue-500" />
                        <span v-text="text" />
                    </li>
                </ul>
            </div>
            <div class="block md:hidden text-center fixed bottom-0 left-0 w-full bg-white">
                <button @click="subscribe" class="bg-blue-500 hover:bg-blue-600 uppercase w-11/12 my-2.5 py-2.5 text-white rounded-full">
                    Đăng ký miễn phí
                </button>
            </div>
        </div>
        <div class="hidden col-span-1 mt-5 ml-10 md:block">
            <div class="relative cursor-pointer">
                <div
                    :style="`background-image: url(${course.thumbnail_url})`"
                    class="pt-[56%] bg-contain rounded-2xl"
                />
                <PlayCircleIcon class="w-16 h-16 text-white absolute inset-1/2 top-[32%] left-[40%]" />
                <p class="absolute bottom-0 w-full my-3 font-semibold text-center text-white">Xem giới thiệu khoá học</p>
            </div>
            <div class="mt-5 text-center">
                <h2 class="mb-4 text-3xl text-blue-500">{{ course.price === 0 ? 'Miễn phí' : priceFormat(course.price) }}</h2>
                <button @click="subscribe" class="py-2 font-semibold text-white uppercase bg-blue-500 rounded-full px-7 hover:bg-blue-700">Đăng ký học</button>
            </div>
            <div>
                <ul class="mt-5 ml-16 space-y-3 text-sm">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                        </svg>
                        <span class="ml-5">Trình độ cơ bản</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
                        </svg>
                        <span class="ml-5">Tổng số <span class="font-bold">{{ course.lessons_count }}</span> bài học</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-5 mr-1">Thời lượng</span>
                        <span class="font-bold">{{ secondsToTime(course.lessons_time_duration)}}</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>
                        <span class="ml-5">Học mọi nơi, mọi lúc</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
