<script setup>
import { computed } from 'vue'
import { Head , useForm , usePage } from '@inertiajs/vue3'
import route from "ziggy-js/src/js";

const props = defineProps({
    user: Object,
})

const form = useForm({
    name: props.user.name,
    phone: props.user.phone,
})

const submit = () => {
    form.post(route('settings'))
}
</script>

<template>
    <Head title="Thiết lập tài khoản" />
    <div class="my-5 max-w-3xl">
        <h2 class="font-bold text-3xl mb-5">Thiết lập</h2>
        <div class="mb-10">
            <h3 class="text-2xl font-semibold border-b pb-3">Thông tin tài khoản</h3>
            <form @submit.prevent="submit" class="my-5 space-y-5">
                <div>
                    <label class="block font-semibold">Họ tên</label>
                    <input
                        type="text"
                        v-model="form.name"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"
                    />
                    <small>Tên của bạn xuất hiện trên trang cá nhân và bên cạnh các bình luận của bạn.</small>
                </div>
                <div>
                    <label class="block font-semibold">Email</label>
                    <input
                        type="text"
                        :value="user.email"
                        disabled
                        class="mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"
                    />
                    <small>Địa chỉ email của bạn.</small>
                </div>
                <div>
                    <label class="block font-semibold">Tên tài khoản</label>
                    <input
                        type="text"
                        :value="user.username"
                        disabled
                        class="mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"
                    />
                    <small><span class="font-bold">URL:</span> {{ route('profile', { username: user.username }) }}</small>
                </div>
                <div>
                    <label class="block font-semibold">Số điện thoại</label>
                    <input
                        type="text"
                        v-model="form.phone"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"
                    />
                    <small>Số điện thoại của bạn.</small>
                </div>
                <div>
                    <label class="block font-semibold">Giới thiệu</label>
                    <input
                        type="text"
                        v-model="user.bio"
                        class="mt-1 block w-full border-0 border-b border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"
                    />
                    <small>Bio hiển thị trên trang cá nhân và trong các bài viết (blog) của bạn.</small>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg hover:bg-blue-600">Cập nhật</button>
            </form>
        </div>
        <div>
            <h3 class="text-2xl font-semibold border-b pb-3">Liên kết đăng nhập mạng xã hội</h3>
            <div class="my-3">
            </div>
        </div>
    </div>
</template>
