<script setup>
import { BookmarkIcon , EllipsisHorizontalIcon } from '@heroicons/vue/24/outline'
import { Link, Head } from '@inertiajs/vue3'
import { dateFormat } from '@/helpers'
import route from "ziggy-js/src/js"

defineProps({
    posts: Object,
})

</script>

<template>
    <div>
        <Head title="Blog" />
        <div>
            <div class="mb-12 mt-3">
                <h2 class="text-2xl font-bold mb-3">Bài viết nổi bật</h2>
                <p>Tổng hợp các bài viết chia sẻ về kinh nghiệm tự học lập trình online và các kỹ thuật lập trình web.</p>
            </div>
            <div
                v-for="(post, index) in posts.data"
                :key="index"
            >
                <div class="border-2 border-gray-200 rounded-lg p-8 mb-5 w-10/12">
                    <div class="flex items-center mb-2">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full" :src="post.author.avatar_url" :alt="post.author.name">
                            <span class="ml-2">{{ post.author.name }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="pr-8">
                            <Link :href="route('blog.show', { slug: post.slug })">
                                <h2 class="text-2xl font-bold">{{ post.title }}</h2>
                            </Link>
                            <p class="mt-3 text-base">{{ post.excerpt }}</p>
                        </div>
                        <div class="">
                            <Link :href="route('blog.show', { slug: post.slug })">
                                <img class="rounded-lg w-80 h-35" :src="post.thumbnail_url" alt="">
                            </Link>
                        </div>
                    </div>
                    <div class="flex text-gray-400 text-sm">
                        <span>{{ dateFormat(post.created_at) }}</span>
                        <span class="mx-3">•</span>
                        <span>{{ post.read_duration }} phút đọc</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
