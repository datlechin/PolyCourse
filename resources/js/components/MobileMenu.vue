<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { HomeIcon, LightBulbIcon, MapIcon, NewspaperIcon } from "@heroicons/vue/24/solid";

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
        <div class="fixed top-0 left-0 h-[150vh] z-21 w-full bg-[rgba(0,0,0,.3)]">
            <div class="w-[60%] bg-white z-10 h-full absolute top-0 left-0">
                <div class="flex flex-col text-[1.6rem] max-h-full overflow-y-auto pt-[16px] pl-[32px]">
                    <div class="mt-6">
                        <ul class="w-full text-[1.4rem] font-normal leading-5 mb-3 py-4 border-b">
                            <li>
                                <div v-if="user">
                                    hello
                                </div>
                                <div v-else>
                                    <a class="flex items-center py-5 pl-5 text-[1rem]" href="#">
                                        <em class="inline-block text-[#757575] mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z" clip-rule="evenodd" />
                                            </svg>

                                        </em>
                                        <span class="text-gray-600 text-[1rem]"> Đăng nhập </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-[1.4rem] font-normal leading-5 mb-3 py-4 border-b">
                            <li 
                                v-for="(item, index) in items" 
                                :key="index"
                            >
                                <div>
                                    <a class="flex items-center transition-[.3s] text-[1rem] cursor-pointer rounded-l-[5px] py-5 pl-5" href="#">
                                        <em class="inline-block text-[#757575] mr-4 text-center w-5">
                                            <component :is="item.icon" />
                                        </em>
                                        <span class="text-gray-600 text-[1rem]">{{ item.name }}</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="w-full text-[1.4rem] font-normal leading-5 mb-3 py-4">
                            <li>
                                <div>
                                    <a class="flex items-center transition-[.3s] text-[1rem] cursor-pointer rounded-l-[5px] py-5 pl-5" href="#">
                                        <em class="inline-block text-[#757575] mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                            </svg>

                                        </em>
                                        <span class="text-gray-600 text-[1rem]">Giới thiệu</span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a class="flex items-center transition-[.3s] text-[1rem] cursor-pointer rounded-l-[5px] py-5 pl-5" href="#">
                                        <em class="inline-block text-[#757575] mr-4 text-center w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                                            </svg>
                                        </em>
                                        <span class="text-gray-600 text-[1rem]">Cơ hội việc làm</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</template>