<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'
import { computed , ref } from 'vue'
import MobileMenu from './MobileMenu.vue'
import route from "ziggy-js/src/js";

const user = computed(() => usePage().props.value.auth.user);
let userDropdown = ref(false)
let mobileMenu = ref(false)
</script>

<template>
    <nav class="bg-white flex items-center justify-between h-[66px] border-b px-6">
        <div class="flex items-center">
            <div class="block md:hidden">
                <button class="mobile-menu-button" @click="mobileMenu = !mobileMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:block md:hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <Link :href="route('home')" class="hidden md:block">
                <img src="@/../images/logo.png" alt="Logo" class="w-[38px] rounded-lg">
            </Link>
            <h4 class="ml-4 font-bold hidden md:block">Học lập trình để đi làm</h4>
        </div>
        <div class="hidden md:flex items-center border-2 border-gray-200 rounded-full h-10 w-[420px] pr-4 pl-2">
            <MagnifyingGlassIcon class="w-5 text-gray-500" />
            <input type="text" placeholder="Tìm kiếm khóa học, bài viết, video, ..." class="h-full focus:ring-0 border-0 px-1 w-full">
        </div>
        <div class="flex items-center space-x-5">
            <div>
                <MagnifyingGlassIcon class="w-5 text-gray-500 sm:flex md:hidden" />
            </div>
            <template v-if="user">
                <button @click="userDropdown = !userDropdown">
                    <img :src="user.avatar_url" :alt="user.name" class="rounded-full w-8 h-8">
                </button>
                <Transition>
                    <div
                        v-if="userDropdown"
                        class="absolute top-20 md:top-16 right-6 shadow-lg rounded-lg bg-white text-sm py-2 px-6 min-w-[230px]"
                    >
                        <div class="flex items-center mb-4">
                            <img :src="user.avatar_url" :alt="user.name" class="rounded-full w-12 h-12">
                            <div class="ml-3">
                                <h3 class="font-semibold">{{ user.name }}</h3>
                                <span class="text-gray-500">@{{ user.username }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="my-4">
                            <Link :href="route('home')" class="text-gray-500">
                                Trang cá nhân
                            </Link>
                        </div>
                        <hr>
                        <div class="my-4 flex flex-col space-y-3">
                            <Link :href="route('home')" class="text-gray-500">
                                Viết blog
                            </Link>
                            <Link :href="route('home')" class="text-gray-500">
                                Bài viết của tao
                            </Link>
                        </div>
                        <hr>
                        <div class="my-4 flex flex-col space-y-3">
                            <Link :href="route('home')" class="text-gray-500">
                                Thiết lập
                            </Link>
                            <Link :href="route('logout')" method="post" class="text-gray-500">
                                Đăng xuất
                            </Link>
                        </div>
                    </div>
                </Transition>
            </template>
            <template v-else>
                <Link :href="route('login')" class="bg-blue-500 text-white px-5 py-2 font-semibold rounded-full hover:bg-blue-600">
                    Đăng nhập
                </Link>
            </template>
        </div>
        <transition>
            <MobileMenu v-if="mobileMenu" :user="user" />
        </transition>
    </nav>
</template>
