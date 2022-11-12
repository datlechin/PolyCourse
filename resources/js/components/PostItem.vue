<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    post: Object,
})
</script>

<template>
    <div>
        <Link :href="`/blog/${post.slug}`">
            <img src="https://files.fullstack.edu.vn/f8-prod/blog_posts/65/6139fe28a9844.png" :alt="post.title" class="rounded-[16px]">
        </Link>
        <h3 class="font-semibold truncate my-3">
            <Link :href="`/blog/${post.slug}`" v-text="post.title" />
        </h3>
        <div class="flex items-center text-sm">
            <Link>
                <img :src="post.user.avatar_url" :alt="post.user.name" class="rounded-full w-5 h-5 mr-2" />
            </Link>
            <Link>
                <strong class="text-gray-600" v-text="post.user.name" />
                <span class="mx-2">·</span>
                <span class="text-gray-400">6 phút đọc</span>
            </Link>
        </div>
    </div>
</template>
