<script setup>
import { Link } from '@inertiajs/vue3'
import {
    HomeIcon,
    LightBulbIcon,
    MapIcon,
    NewspaperIcon,
    ArrowLeftOnRectangleIcon,
    ArrowRightOnRectangleIcon,
    UserCircleIcon
} from '@heroicons/vue/24/solid'
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
</script>

<template>
    <div class="fixed top-0 left-0 h-[150vh] z-10 w-full bg-[rgba(0,0,0,.3)]">
        <div class="w-10/12 bg-white h-full absolute top-0 left-0">
            <div v-if="user" class="border-b pb-4 mb-5">
                <div class="p-5 border-b mb-4">
                    <img class="rounded-full w-24 h-24" :src="user.avatar_url" :alt="user.name">
                    <h6 class="mt-4 font-semibold">{{ user.name }}</h6>
                </div>
                <ul class="space-y-2">
                    <li class="hover:bg-gray-200 rounded-lg px-3 py-2.5 mx-2">
                        <Link :href="route('home')" class="flex">
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
    </div>
</template>
