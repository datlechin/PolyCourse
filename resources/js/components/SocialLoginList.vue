<script setup>
import FacebookIcon from '@/icons/FacebookIcon.vue'
import TwitterIcon from '@/icons/TwitterIcon.vue'
import GithubIcon from '@/icons/GithubIcon.vue'
import route from 'ziggy-js/src/js'

const socials = [
    {
        name: 'Facebook',
        url: route('socialite.redirect', { provider: 'facebook' }),
        icon: FacebookIcon,
        color: 'text-blue-600'
    },
    {
        name: 'Twitter',
        url: route('socialite.redirect', { provider: 'twitter' }),
        icon: TwitterIcon,
        color: 'text-blue-500'
    },
    {
        name: 'Github',
        url: route('socialite.redirect', { provider: 'github' }),
        icon: GithubIcon,
        color: 'text-gray-900'
    }
];
</script>

<template>
    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 text-gray-500 bg-white">Hoặc đăng nhập bằng</span>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-3 mt-6">
            <div
                v-for="(social, index) in socials"
                :key="index"
            >
                <a :href="social.url" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    <span class="sr-only">Đăng nhập bằng {{ social.name }}</span>
                    <component :is="social.icon" :class="['w-5 h-5', social.color]" />
                </a>
            </div>
        </div>
    </div>
</template>
