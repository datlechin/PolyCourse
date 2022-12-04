<script setup>
import { Head, Link } from '@inertiajs/vue3'
import route from 'ziggy-js/src/js'

defineProps({
    user: Object,
})
</script>

<template>
    <Head :title="user.name" />
    <div class="w-full">
        <div class="mb-28 pt-60 -m-3 rounded-b-2xl relative bg-cover bg-center bg-no-repeat bg-[url('https://assets.laracasts.com/images/wallpapers/thumbnails/inspire-me.png')]">
            <div class="absolute top-44 left-28 md:-bottom-20 md:left-12 flex flex-col md:flex-row">
                <img :src="user.avatar_url" :alt="user.name" class="rounded-full w-28 md:w-36 border-2 border-white">
                <h2 class="font-bold text-2xl -ml-6 mt-2 md:mt-20 md:ml-4">{{ user.name }}</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 md:gap-6">
            <div class="col-span-2 mb-6 md:mb-0">
                <div class="shadow rounded-lg p-4 w-full">
                    <h3 class="font-bold text-lg">Giới thiệu</h3>
                    <div class="mt-3 text-sm text-center">
                        {{ user.bio }}
                    </div>
                </div>
                <div></div>
            </div>
            <div class="col-span-3">
                <div class="shadow rounded-lg p-5">
                    <h3 class="font-bold text-lg">Khoá học đã tham gia</h3>
                    <ul class="space-y-5 mt-3">
                        <li
                            v-for="(course, index) in user.courses"
                            :key="index"
                            class="flex border-b pb-5 last:border-b-0 last:pb-0"
                        >
                            <img :src="course.thumbnail_url" :alt="course.name" class="rounded-xl w-1/3">
                            <div class="ml-3">
                                <h2 class="font-bold mb-1">
                                    <Link :href="route('courses.show', { slug: course.slug })">
                                        {{ course.name }}
                                    </Link>
                                </h2>
                                <p class="text-sm">{{ course.subtitle }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
