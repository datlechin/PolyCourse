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
            <div class="absolute flex flex-col top-44 left-28 md:-bottom-20 md:left-12 md:flex-row">
                <img :src="user.avatar_url" :alt="user.name" class="border-2 border-white rounded-full w-28 md:w-36">
                <h2 class="mt-2 -ml-6 text-2xl font-bold md:mt-20 md:ml-4">{{ user.name }}</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 md:gap-6">
            <div class="col-span-2 mb-6 md:mb-0">
                <div class="w-full p-4 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Giới thiệu</h3>
                    <div class="mt-3 text-sm text-center">
                        {{ user.bio }}
                    </div>
                </div>
                <div></div>
            </div>
            <div class="col-span-3">
                <div class="p-5 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Khoá học đã tham gia</h3>
                    <ul class="mt-3 space-y-5">
                        <li
                            v-for="(course, index) in user.courses"
                            :key="index"
                            class="flex pb-5 border-b last:border-b-0 last:pb-0"
                        >
                            <img :src="course.thumbnail_url" :alt="course.name" class="w-1/3 rounded-xl">
                            <div class="ml-3">
                                <h2 class="mb-1 font-bold">
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
