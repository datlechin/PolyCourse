<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({
    learningPath: Object,
})
</script>

<template>
    <Head :title="learningPath.name" />
    <div class="m-auto md:m-0 md:w-9/12 space-y-12">
        <div class="mb-14 mt-3 space-y-5">
            <h2 class="text-3xl font-bold mb-3" v-text="learningPath.name" />
            <div class="prose">
                {{ learningPath.content }}
            </div>
        </div>
        <div class="flex flex-col">
            <h4 class="font-bold text-2xl mb-3">1. Tìm hiểu về ngành IT</h4>
            <p class="mb-3 text-sm">Để theo ngành IT - Phần mềm cần rèn luyện những kỹ năng nào? Bạn đã có sẵn tố chất phù hợp với ngành chưa? Cùng thăm quan các công ty IT và tìm hiểu về văn hóa, tác phong làm việc của ngành này nhé các bạn.</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 border-2 border-gray-200 rounded-2xl p-4 space-y-3 lg:space-y-0">
                <div class="lg:col-span-1">
                    <img class="rounded-2xl w-full h-auto lg:w-72 lg:h-40 object-cover" src="https://files.fullstack.edu.vn/f8-prod/courses/7.png" alt="">
                </div>
                <div class="lg:col-span-2 lg:ml-5 space-y-3">
                    <h6 class="text-xl font-bold">Kiến thức nhập môn IT</h6>
                    <span class="text-blue-600">Miễn phí</span>
                    <p class="text-sm">Để có cái nhìn tổng quan về ngành IT - Lập trình web các bạn nên xem các videos tại khóa này trước nhé.</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-3xl w-full lg:w-auto">Xem khoá học</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col ">
            <h4 class="font-bold text-2xl mb-3">2. HTML và CSS</h4>
            <p class="mb-3 text-sm">Để học web Front-end chúng ta luôn bắt đầu với ngôn ngữ HTML và CSS, đây là 2 ngôn ngữ có mặt trong mọi website trên internet. Trong khóa học này F8 sẽ chia sẻ từ những kiến thức cơ bản nhất. Sau khóa học này bạn sẽ tự làm được 2 giao diện websites là The Band và Shopee.</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 border-2 border-gray-200 rounded-2xl p-4 space-y-3 lg:space-y-0">
                <div class="lg:col-span-1">
                    <img class="rounded-2xl w-full h-auto lg:w-72 lg:h-40 object-cover" src="https://files.fullstack.edu.vn/f8-prod/courses/15/62f13d2424a47.png" alt="">
                </div>
                <div class="lg:col-span-2 lg:ml-5 space-y-3">
                    <h6 class="text-xl font-bold">HTML CSS Pro</h6>
                    <span class="text-blue-600">1.299.000đ</span>
                    <p class="text-sm">Từ cơ bản tới chuyên sâu, thực hành 8 dự án, hàng trăm bài tập, trang hỏi đáp riêng, cấp chứng chỉ sau khóa học và mua một lần học mãi mãi.</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-3xl w-full lg:w-auto">Xem khoá học</button>
                </div>
            </div>
        </div>
    </div>
</template>
