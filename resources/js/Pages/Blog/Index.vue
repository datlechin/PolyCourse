<script setup>
import { Link, Head } from '@inertiajs/vue3'
import { dateFormat } from '@/helpers'
import route from 'ziggy-js/src/js'

defineProps({
    posts: Object,
})
</script>

<template>
    <div>
        <Head title="Blog" />
        <div>
            <div class="mt-3 mb-12">
                <h2 class="mb-3 text-2xl font-bold">Bài viết nổi bật</h2>
                <p>Tổng hợp các bài viết chia sẻ về kinh nghiệm tự học lập trình online và các kỹ thuật lập trình web.</p>
            </div>
            <div
                v-for="(post, index) in posts.data"
                :key="index"
            >
                <div class="p-8 mb-5 border-2 border-gray-200 rounded-lg md:w-10/12">
                    <div class="flex items-center mb-2">
                        <div class="flex items-center">
                            <img class="w-8 h-8 rounded-full" :src="post.author.avatar_url" :alt="post.author.name">
                            <span class="ml-2">{{ post.author.name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center md:flex-row md:justify-between">
                        <div class="pr-8">
                            <Link :href="route('blog.show', { slug: post.slug })">
                                <h2 class="text-2xl font-bold">{{ post.title }}</h2>
                            </Link>
                            <p class="mt-3 text-base">{{ post.excerpt }}</p>
                        </div>
                        <div>
                            <Link :href="route('blog.show', { slug: post.slug })">
                                <img class="my-5 rounded-lg w-80 h-35" :src="post.thumbnail_url" :alt="post.title">
                            </Link>
                        </div>
                    </div>
                    <div class="flex mt-3 text-sm text-gray-400">
                        <span>{{ dateFormat(post.created_at) }}</span>
                        <span class="mx-3">•</span>
                        <span>{{ post.read_duration }} phút đọc</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
