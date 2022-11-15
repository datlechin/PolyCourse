<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3'
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'
import {ref} from "vue";

const user = usePage().props.value.auth.user;

const userDropdown = ref(false)
</script>

<template>
    <nav class="bg-white flex items-center justify-between h-[66px] border-b px-7">
        <div class="flex items-center">
            <Link href="/">
                <img src="https://fullstack.edu.vn/static/media/f8-icon.18cd71cfcfa33566a22b.png" alt="Logo" class="w-[38px] rounded-lg">
            </Link>
            <h4 class="ml-4 font-bold">Học lập trình để đi làm</h4>
        </div>
        <div>
            <div class="flex items-center border-2 border-gray-200 rounded-full h-10 w-[420px] pr-4 pl-2">
                <MagnifyingGlassIcon class="w-5 text-gray-500" />
                <input type="text" placeholder="Tìm kiếm khóa học, bài viết, video, ..." class=" h-10 border-2 border-gray-200 border-x-0 outline-none px-1 w-full">
            </div>
        </div>
        <div>
            <template v-if="user">
                <button @click="userDropdown = !userDropdown">
                    <img :src="user.avatar_url" :alt="user.name" class="rounded-full w-8 h-8">
                </button>
                <Transition>
                    <div
                        v-if="userDropdown"
                        class="absolute right-7 shadow-lg rounded-lg bg-white text-sm py-2 px-6 min-w-[230px]"
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
                            <Link :href="`/@${user.username}`" class="text-gray-500">
                                Trang cá nhân
                            </Link>
                        </div>
                        <hr>
                        <div class="my-4 flex flex-col space-y-3">
                            <Link :href="`/@${user.username}/posts/create`" class="text-gray-500">
                                Viết blog
                            </Link>
                            <Link :href="`/@${user.username}/posts`" class="text-gray-500">
                                Bài viết của tao
                            </Link>
                        </div>
                        <hr>
                        <div class="my-4 flex flex-col space-y-3">
                            <Link href="/settings" class="text-gray-500">
                                Thiết lập
                            </Link>
                            <Link href="/logout" method="post" class="text-gray-500">
                                Đăng xuất
                            </Link>
                        </div>
                    </div>
                </Transition>
            </template>
            <template v-else>
                <Link href="/login" class="bg-blue-500 text-white px-5 py-2 font-semibold rounded-full hover:bg-blue-600">
                    Đăng nhập
                </Link>
            </template>
        </div>
    </nav>
</template>
