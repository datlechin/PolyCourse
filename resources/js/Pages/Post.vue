<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { BookmarkIcon, EllipsisHorizontalIcon } from "@heroicons/vue/24/outline";

defineProps({
    post: Object,
})
</script>

<template>
    <div class="w-3/5 mx-auto">
        <h1 class="font-bold text-4xl my-7">{{ post.title }}</h1>
        <div class="flex justify-between items-center mb-7">
            <div class="flex">
                <Link href="">
                    <img :src="post.user.avatar_url" :alt="post.user.name" class="rounded-full w-12 h-12">
                </Link>
                <div class="ml-3">
                    <Link href="">
                        <p class="font-semibold">{{ post.user.name }}</p>
                    </Link>
                    <p class="text-sm text-gray-500">
                        {{ post.created_at }}
                        <span class="px-1">·</span>
                        2 phút đọc
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="cursor-pointer px-2 py-1">
                    <BookmarkIcon class="text-gray-500 h-5 w-5 hover:text-gray-900" />
                </div>
                <div class="cursor-pointer px-2 py-1">
                    <EllipsisHorizontalIcon class="text-gray-500 h-5 w-5 hover:text-gray-900" />
                </div>
            </div>
        </div>
        <div class="text-lg">
            {{ post.content }}
        </div>
    </div>
</template>
