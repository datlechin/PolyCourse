<script setup>
import { Link } from '@inertiajs/vue3'
import route from "ziggy-js/src/js";
</script>

<template>
    <footer class="bg-gray-900 px-7 pt-[68px] pb-10 text-gray-200 text-sm">
        <div class="flex">
            <div>
                <div class="flex items-center">
                    <Link :href="route('home')" class="mr-2.5">
                        <img src="@/../images/logo.png" alt="Logo" class="w-[38px] rounded-lg">
                    </Link>
                    <h2 class="font-bold">Học Lập Trình Để Đi Làm</h2>
                </div>
                <div class="my-4 text-gray-400 space-y-2">
                    <p>
                        Điện thoại:
                        <a href="tel:0123456789">0123456789</a>
                    </p>
                    <p>
                        Email:
                        <a href="mailto:datlechin@gmail.com">datlechin@gmail.com</a>
                    </p>
                    <p>
                        Địa chỉ:
                        111 Đông Bắc, Tân Chánh Hiệp, Quận 12, TP Hồ Chí Minh
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-12">
            <div>
                <p class="text-gray-400">
                    {{ new Date().getFullYear() }} © F8. Nền tảng học lập trình hàng đầu Việt Nam
                </p>
            </div>
            <div class="space-x-2">
                <a href="" class="px-2 py-1 bg-red-500 rounded-md">
                    Y
                </a>
                <a href="" class="px-2 py-1 bg-blue-800 rounded-md">
                    F
                </a>
                <a href="" class="px-2 py-1 bg-gray-500 rounded-md">
                    W
                </a>
            </div>
        </div>
    </footer>
</template>
