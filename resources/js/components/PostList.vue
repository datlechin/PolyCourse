<script setup>
import { Link } from '@inertiajs/vue3'
import { ChevronRightIcon } from '@heroicons/vue/24/outline'
import route from 'ziggy-js/src/js'
import PostItem from '@/components/PostItem.vue'

defineProps({
    posts: Array,
})
</script>

<template>
    <div>
        <div class="flex justify-between py-4">
            <h2 class="font-bold text-2xl">Bài viết nổi bật</h2>
            <Link :href="route('blog.index')" class="group flex items-center text-blue-500 font-semibold hover:underline hover:translate-x-0.5">
                Xem tất cả
                <ChevronRightIcon class="w-4 h-4 group-hover:translate-x-0.5" />
            </Link>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <PostItem
                v-for="(post, index) in posts"
                :key="index"
                :post="post"
            />
        </div>
    </div>
</template>
