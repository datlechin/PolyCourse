<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3'
import SocialLoginList from '@/components/SocialLoginList.vue'
import InputError from '@/components/InputError.vue'

const form = useForm({
    username: null,
    email: null,
    name: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    form.post('/register')
}
</script>

<template>
    <Head title="Đăng ký" />
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <Link href="/">
                <img class="mx-auto h-12 w-auto rounded-lg" src="@/../images/logo.png">
            </Link>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Đăng ký tài khoản</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Đã có tài khoản?
                <Link href="/login" class="text-blue-500 hover:underline">Đăng nhập</Link>
            </p>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Tên tài khoản</label>
                        <div class="mt-1">
                            <input id="username" type="text" v-model="form.username" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.username" />
                        </div>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ tên</label>
                        <div class="mt-1">
                            <input id="name" type="text" v-model="form.name" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.name" />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input id="email" type="email" v-model="form.email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.email" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <div class="mt-1">
                            <input id="password" type="password" v-model="form.password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.password" />
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                        <div class="mt-1">
                            <input id="password" type="password" v-model="form.password_confirmation" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="form.errors.password_confirmation" />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Đăng ký</button>
                    </div>
                </form>
                <SocialLoginList />
            </div>
        </div>
    </div>
</template>
