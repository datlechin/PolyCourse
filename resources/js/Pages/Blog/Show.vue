<script setup>
import { Link, Head } from '@inertiajs/vue3'
import { BookmarkIcon, EllipsisHorizontalIcon } from '@heroicons/vue/24/outline'
import { dateFormat } from "@/helpers"

defineProps({
    post: Object,
})
</script>

<template>
    <Head :title="post.title" />
    <div class="w-full md:w-3/5 mx-auto">
        <h1 class="text-4xl font-bold my-7">{{ post.title }}</h1>
        <div class="flex items-center justify-between mb-7">
            <div class="flex">
                <Link href="">
                    <img :src="post.author.avatar_url" :alt="post.author.name" class="w-12 h-12 rounded-full">
                </Link>
                <div class="ml-3">
                    <Link href="">
                        <p class="font-semibold">{{ post.author.name }}</p>
                    </Link>
                    <p class="text-sm text-gray-500">
                        {{ dateFormat(post.created_at) }}
                        <span class="px-1">·</span>
                        2 phút đọc
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="px-2 py-1 cursor-pointer">
                    <BookmarkIcon class="w-5 h-5 text-gray-500 hover:text-gray-900" />
                </div>
                <div class="px-2 py-1 cursor-pointer">
                    <EllipsisHorizontalIcon class="w-5 h-5 text-gray-500 hover:text-gray-900" />
                </div>
            </div>
        </div>
        <div class="text-base">
            {{ post.content }}
        </div>
    </div>
</template>
