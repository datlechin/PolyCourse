<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { HomeIcon, LightBulbIcon, MapIcon, NewspaperIcon } from "@heroicons/vue/24/solid";

defineProps({
    user: Object
})

const items = [
    {
        name: 'Home',
        component: 'Home',
        url: '/',
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
        url: '/courses',
        component: 'Courses',
        icon: LightBulbIcon,
    },
    {
        name: 'Blog',
        component: 'Blog',
        url: '/blog',
        icon: NewspaperIcon
    },
]
</script>

<template>
        <div class="fixed top-0 left-0 h-[150vh] z-21 w-full bg-[rgba(0,0,0,.3)] overflow-scroll">
            <div v-if="user" class="w-10/12 bg-white z-10 h-full absolute top-0 left-0">
                <div class="flex flex-col text max-h-full overflow-y-auto pt-4 pl-4">
                    <div class="pl-5 pt-4">
                        <img class="rounded-full w-24 h-24" :src="user.avatar_url" alt="user.name">
                        <h6 class="mt-3 text-base font-semibold">{{user.name}}</h6>
                    </div>
                    <div class="mt-6">
                        <ul class="w-full text-2xl font-normal leading-5 mb-3 py-2 border-b">
                            <li>
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                    <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path
                                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                        </svg>
                        
                        
                                    </em>
                                    <span class="text-gray-600">Trang cá nhân</span>
                                    </Link>
                                </div>
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                        <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path
                                                    d="M10.75 16.82A7.462 7.462 0 0115 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0018 15.06v-11a.75.75 0 00-.546-.721A9.006 9.006 0 0015 3a8.963 8.963 0 00-4.25 1.065V16.82zM9.25 4.065A8.963 8.963 0 005 3c-.85 0-1.673.118-2.454.339A.75.75 0 002 4.06v11a.75.75 0 00.954.721A7.506 7.506 0 015 15.5c1.579 0 3.042.487 4.25 1.32V4.065z" />
                                            </svg>
                                        
                                        </em>
                                        <span class="text-gray-600">Khóa học của tôi</span>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-2xl font-normal leading-5 mb-3 py-2 border-b">
                            <li v-for="(item, index) in items" :key="index">
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                    <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                        <component :is="item.icon" />
                                    </em>
                                    <span class="text-gray-600">{{ item.name }}</span>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-2xl font-normal leading-5 mb-3 py-2 border-b">
                            <li >
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                        <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M10 2c-1.716 0-3.408.106-5.07.31C3.806 2.45 3 3.414 3 4.517V17.25a.75.75 0 001.075.676L10 15.082l5.925 2.844A.75.75 0 0017 17.25V4.517c0-1.103-.806-2.068-1.93-2.207A41.403 41.403 0 0010 2z" clip-rule="evenodd" />
                                            </svg>
                                        </em>
                                        <span class="text-gray-600">Bài viết đã lưu</span>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-2xl font-normal leading-5 mb-3 py-2 border-b">
                            <li>
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                    <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                        
                                    </em>
                                    <span class="text-gray-600">Giới thiệu</span>
                                    </Link>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                    <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                                        </svg>
                                    </em>
                                    <span class="text-gray-600">Cơ hội việc làm</span>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-2xl font-normal leading-5 mb-3 py-2">
                            <li>
                                <div>
                                    <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-4 pl-4" href="#">
                                        <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z" clip-rule="evenodd" />
                                            </svg>
                                        </em>
                                        <span class="text-gray-600">Đăng xuất</span>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div v-else class="flex flex-col text max-h-full overflow-y-auto pt-4 pl-8">
                <div class="mt-6">
                    <ul class="w-full text-2xl font-normal leading-5 mb-3 py-4 border-b">
                        <li>
                            <div >
                                <Link class="flex items-center py-5 pl-5 text-base" href="/login">
                                <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </em>
                                <span class="text-gray-600"> Đăng nhập </span>
                                </Link>
                            </div>
                        </li>
                    </ul>
                    <ul class="w-full text-2xl font-normal leading-5 mb-3 py-4 border-b">
                        <li v-for="(item, index) in items" :key="index">
                            <div>
                                <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-5 pl-5" href="#">
                                <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                    <component :is="item.icon" />
                                </em>
                                <span class="text-gray-600">{{ item.name }}</span>
                                </Link>
                            </div>
                        </li>
                    </ul>
                    <ul class="w-full text-2xl font-normal leading-5 mb-3 py-4">
                        <li>
                            <div>
                                <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-5 pl-5" href="#">
                                <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
            
                                </em>
                                <span class="text-gray-600">Giới thiệu</span>
                                </Link>
                            </div>
                        </li>
                        <li>
                            <div>
                                <Link class="flex items-center transition text-base cursor-pointer rounded-l-md py-5 pl-5" href="#">
                                <em class="inline-block text-gray-600 mr-4 text-center w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                                    </svg>
                                </em>
                                <span class="text-gray-600">Cơ hội việc làm</span>
                                </Link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</template>