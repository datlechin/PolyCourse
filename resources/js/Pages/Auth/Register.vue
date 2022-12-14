<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3'
import SocialLoginList from '@/components/SocialLoginList.vue'
import InputError from '@/components/InputError.vue'
import route from 'ziggy-js/src/js'
import { EyeIcon, EyeSlashIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue'

const form = useForm({
    username: null,
    email: null,
    name: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    form.post(route('register'))
}

const showPassword = ref(false)
const showPasswordConfirmation = ref(false)
</script>

<template>
    <Head title="Đăng ký" />
    <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <Link :href="route('home')">
                <img class="w-auto h-12 mx-auto rounded-lg" src="@/../images/logo.png">
            </Link>
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">Đăng ký tài khoản</h2>
            <p class="mt-2 text-sm text-center text-gray-600">
                Đã có tài khoản?
                <Link :href="route('login')" class="text-blue-500 hover:underline">Đăng nhập</Link>
            </p>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Tên tài khoản</label>
                        <div class="mt-1">
                            <input id="username" type="text" v-model="form.username" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.username" />
                        </div>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ tên</label>
                        <div class="mt-1">
                            <input id="name" type="text" v-model="form.name" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.name" />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input id="email" type="email" v-model="form.email" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.email" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <div class="mt-1">
                            <div class="relative">
                                <input id="password" :type="showPassword ? 'text' : 'password'" v-model="form.password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <span class="absolute cursor-pointer top-2 right-3" @click="showPassword = !showPassword">
                                    <component :is="showPassword ? EyeSlashIcon : EyeIcon " class="w-5 h-5 text-gray-800" />
                                </span>
                            </div>
                            <InputError :message="form.errors.password" />
                        </div>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                        <div class="mt-1">
                            <div class="relative">
                                <input id="password_confirmation" :type="showPasswordConfirmation ? 'text' : 'password'" v-model="form.password_confirmation" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <span class="absolute cursor-pointer top-2 right-3" @click="showPasswordConfirmation = !showPasswordConfirmation">
                                    <component :is="showPasswordConfirmation ? EyeSlashIcon : EyeIcon" class="w-5 h-5 text-gray-800" />
                                </span>
                            </div>
                            <InputError :message="form.errors.password_confirmation" />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Đăng ký</button>
                    </div>
                </form>
                <SocialLoginList />
            </div>
        </div>
    </div>
</template>
