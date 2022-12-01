<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3'
import SocialLoginList from '@/components/SocialLoginList.vue';
import InputError from '@/components/InputError.vue';
import route from "ziggy-js/src/js";
import { EyeIcon, EyeSlashIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue';

const form = useForm({
    email: null,
    password: null,
    remember: false,
})

const submit = () => {
    form.post(route('login'))
}

const showPassword = ref(false)
</script>

<template>
    <Head title="Đăng nhập" />
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <Link :href="route('home')">
                <img class="mx-auto h-12 w-auto rounded-lg" src="@/../images/logo.png">
            </Link>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Đăng nhập</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Bạn chưa có tài khoản?
                <Link :href="route('register')" class="text-blue-500 hover:underline">Đăng ký ngay</Link>
            </p>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input id="email" type="email" v-model="form.email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <InputError :message="form.errors.email" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật Khẩu</label>
                        <div class="mt-1">
                            <div class="relative">
                                <input id="password" :type="showPassword ? 'text' : 'password'" v-model="form.password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <span class="absolute top-2 right-3 cursor-pointer" @click="showPassword = !showPassword">
                                    <component :is="showPassword ? EyeSlashIcon : EyeIcon" class="w-5 h-5 text-gray-800" />
                                </span>
                            </div>
                            <InputError :message="form.errors.password" />
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" v-model="form.remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">Ghi nhớ đăng nhập</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-500 hover:text-blue-700">Quên mật khẩu?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Đăng nhập</button>
                    </div>
                </form>
                <SocialLoginList />
            </div>
        </div>
    </div>
</template>
