<script setup>
import { Link, Head } from '@inertiajs/inertia-vue3'
import { BookmarkIcon, EllipsisHorizontalIcon } from "@heroicons/vue/24/outline";
import { dateFormat } from "@/helpers";

defineProps({
    post: Object,
})
</script>

<template>
    <Head :title="post.title" />
    <div class="w-3/5 mx-auto">
        <h1 class="font-bold text-4xl my-7">{{ post.title }}</h1>
        <div class="flex justify-between items-center mb-7">
            <div class="flex">
                <Link href="">
                    <img :src="post.athor.avatar_url" :alt="post.athor.name" class="rounded-full w-12 h-12">
                </Link>
                <div class="ml-3">
                    <Link href="">
                        <p class="font-semibold">{{ post.athor.name }}</p>
                    </Link>
                    <p class="text-sm text-gray-500">
                        {{ dateFormat(post.created_at) }}
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
        <div class="text-base">
            {{ post.content }}
        </div>
    </div>
</template>
