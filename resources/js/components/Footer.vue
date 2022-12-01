<script setup>
import { Link , usePage } from '@inertiajs/vue3'
import route from 'ziggy-js/src/js'
import FacebookIcon from '@/icons/FacebookIcon.vue'
import GithubIcon from '@/icons/GithubIcon.vue'
import TwitterIcon from '@/icons/TwitterIcon.vue'


</script>

<template>
    <footer class="bg-gray-900 px-7 pt-[68px] pb-10 text-gray-200 text-sm">
        <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 md:gap-8 mx-0 md:mx-36">
            <div class="col-span-2">
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
            <div class="col-span-1">
                <h2 class="font-bold text-lg uppercase">Về PolyCourse</h2>
                <ul class="my-2 text-gray-400 space-y-2">
                    <li>Giới thiệu</li>
                    <li>Cơ hội việc làm</li>
                </ul>
            </div>
            <div class="col-span-1">
                <h2 class="font-bold text-lg uppercase">Hỗ trợ</h2>
                <ul class="my-2 text-gray-400 space-y-2">
                    <li>Liên hệ</li>
                    <li>Bảo mật</li>
                    <li>Điều khoản</li>
                </ul>
            </div>
            <div class="col-span-2">
                <h2 class="font-bold text-lg uppercase">Công ty cổ phần PolyCourse</h2>
                <ul class="my-2 text-gray-400 space-y-2">
                    <li>Ngày thành lập: 17/12/2022</li>
                    <li>Lĩnh vực: Công nghệ, giáo dục, lập trình. PolyCourse xây dựng và phát triển những sản phẩm mang lại giá trị cho cộng đồng.</li>
                </ul>
            </div>
        </div>
        <div class="block md:flex justify-between mt-12 mx-0 md:mx-36">
            <div class="mb-8 md:mb-0">
                <p class="text-gray-400">
                    {{ new Date().getFullYear() }} © {{ usePage().props.value.appName }}. Nền tảng học lập trình hàng đầu Việt Nam
                </p>
            </div>
            <div class="space-x-2 flex">
                <a href="" class="px-2 py-1 rounded-md">
                    <FacebookIcon class="w-4 h-4 text-blue-500" />
                </a>
                <a href="" class="px-2 py-1 rounded-md">
                    <GithubIcon class="w-4 h-4" />
                </a>
                <a href="" class="px-2 py-1 rounded-md">
                    <TwitterIcon class="w-4 h-4 text-blue-500" />
                </a>
            </div>
        </div>
    </footer>
</template>
