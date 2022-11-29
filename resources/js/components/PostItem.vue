<script setup>
import { Link } from "@inertiajs/vue3";
import route from "ziggy-js/src/js";

defineProps({
    post: Object,
})
</script>

<template>
    <div>
        <Link :href="route('blog.show', { slug: post.slug })">
            <img :src="post.thumbnail_url" :alt="post.title" class="w-full h-36 rounded-2xl">
        </Link>
        <h3 class="font-semibold truncate mt-3 mb-2">
            <Link :href="route('blog.show', { slug: post.slug })" v-text="post.title" />
        </h3>
        <div class="flex items-center text-xs">
            <Link :href="route('profile', { username: post.author.username })" class="flex items-center">
                <img :src="post.author.avatar_url" :alt="post.author.name" class="rounded-full w-5 h-5 mr-2" />
                <strong class="text-gray-600" v-text="post.author.name" />
            </Link>
            <span class="mx-2">·</span>
            <span class="text-gray-400">{{ post.read_duration }} phút đọc</span>
        </div>
    </div>
</template>
