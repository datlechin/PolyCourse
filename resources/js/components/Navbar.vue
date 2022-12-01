<script setup>
import {
    MagnifyingGlassIcon,
    HomeIcon,
    LightBulbIcon,
    MapIcon,
    NewspaperIcon,
    ArrowLeftOnRectangleIcon,
    ArrowRightOnRectangleIcon,
    UserCircleIcon,
    XMarkIcon
} from '@heroicons/vue/24/solid'
import { Link, usePage } from '@inertiajs/vue3'
import { computed , ref } from 'vue'
import route from "ziggy-js/src/js";

defineProps({
    user: Object
})

const items = [
    {
        name: 'Home',
        component: 'Home',
        url: route('home'),
        icon: HomeIcon
    },
    {
        name: 'Lộ trình',
        component: 'LearningPaths',
        url: '/learning-paths',
        icon: MapIcon,
    },
    {
        name: 'Học',
        component: 'Courses',
        url: route('courses.index'),
        icon: LightBulbIcon,
    },
    {
        name: 'Blog',
        component: 'Blog',
        url: route('blog.index'),
        icon: NewspaperIcon
    },
]

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
                            <Link :href="route('profile', { username: user.username })" class="text-gray-500">
                                Trang cá nhân
                            </Link>
                        </div>
                        <hr>
                        <div class="my-4 flex flex-col space-y-3">
                            <Link :href="route('home')" class="text-gray-500">
                                Viết blog
                            </Link>
                            <Link :href="route('home')" class="text-gray-500">
                                Bài viết của tôi
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
        <div class="fixed top-0 left-0 h-[150vh] z-10 w-full bg-[rgba(0,0,0,.3)]" v-show="mobileMenu">
            <Transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="opacity-0 translate-y-1"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition ease-in duration-150"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 translate-y-1"
            >
                <div class="w-10/12 bg-white h-full absolute top-0 left-0" v-show="mobileMenu">
                    <div @click="mobileMenu = false" class="absolute top-5 right-5 w-8 h-8 z-20">
                        <XMarkIcon />
                    </div>
                    <div v-if="user" class="border-b pb-4 mb-5">
                        <div class="p-5 border-b mb-4">
                            <img class="rounded-full w-24 h-24" :src="user.avatar_url" :alt="user.name">
                            <h6 class="mt-4 font-semibold">{{ user.name }}</h6>
                        </div>
                        <ul class="space-y-2">
                            <li class="hover:bg-gray-200 rounded-lg px-3 py-2.5 mx-2">
                                <Link :href="route('profile', { username: user.name })" class="flex">
                                    <UserCircleIcon class="w-5 w-5 mr-3" />
                                    Trang cá nhân
                                </Link>
                            </li>
                            <li class="hover:bg-gray-200 rounded-lg px-3 py-2.5 mx-2">
                                <Link :href="route('logout')" method="post" class="flex">
                                    <ArrowLeftOnRectangleIcon class="w-5 w-5 mr-3" />
                                    Đăng xuất
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div v-else class="mt-5 border-b pb-4 mb-5">
                        <div class="hover:bg-gray-200 rounded-lg px-3 py-2.5 mx-2">
                            <Link :href="route('login')" class="flex">
                                <ArrowRightOnRectangleIcon class="w-5 w-5 mr-3" />
                                Đăng nhập
                            </Link>
                        </div>
                    </div>
                    <ul class="space-y-2">
                        <li
                            v-for="(item, index) in items"
                            :key="index"
                            class="hover:bg-gray-200 rounded-lg py-2.5 px-3 mx-2"
                            :class="{ 'bg-gray-200': $page.component.startsWith(item.component) }"
                        >
                            <Link :href="item.url" class="flex">
                                <component :is="item.icon" class="w-5 w-5 mr-3" />
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </Transition>
        </div>
    </nav>
</template>
