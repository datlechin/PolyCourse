<script setup>
import { Link } from '@inertiajs/vue3'
import { StarIcon } from '@heroicons/vue/24/solid'
import { dateFormat } from '@/helpers'
import route from "ziggy-js/src/js";

defineProps({
    review: Object,
})
</script>

<template>
    <div class="flex pb-4 border-b last:border-b-0">
        <div class="mr-4">
            <Link :href="route('profile', { username: review.author.username })">
                <img
                    :src="review.author.avatar_url"
                    :alt="review.author.name"
                    class="w-12 h-12 rounded-full"
                >
            </Link>
        </div>
        <div>
            <Link :href="route('profile', { username: review.author.username })" class="font-bold">{{ review.author.name }}</Link>
            <div class="flex items-center">
                <template
                    v-for="i in 5"
                    :key="i"
                >
                    <StarIcon
                        class="w-4 h-4 text-yellow-400"
                        :class="{ 'text-gray-300': i > review.rating }"
                    />
                </template>
                <span class="ml-2 text-sm text-gray-500">{{ dateFormat(review.created_at) }}</span>
            </div>
            <div class="my-2">
                {{ review.content }}
            </div>
        </div>
    </div>
</template>
