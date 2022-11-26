<script setup>
import { Link, Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Lộ trình học" />
    <div class="lg:w-9/12">
        <div class="mb-12 mt-3">
            <h2 class="text-2xl font-bold mb-3">Lộ trình học</h2>
            <p>Để bắt đầu một cách thuận lợi, bạn nên tập trung vào một lộ trình học. Ví dụ: Để đi làm với vị trí “Lập trình viên Front-end” bạn nên tập trung vào lộ trình “Front-end”.</p>
        </div>
        <div class="grid lg:grid-cols-2 mt-5 space-x-1 space-y-5 lg:space-y-0">
            <div class="grid lg:grid-cols-3 border rounded-xl px-7 py-5">
                <div class="col-span-3 lg:col-span-2">
                    <h4 class="text-xl font-bold">Lộ trình học Front-end</h4>
                    <p class="py-5 text-sm leading-6">
                        Lập trình viên Front-end là người xây dựng ra giao diện websites. Trong phần này F8 sẽ chia sẻ cho bạn lộ trình để trở thành lập trình viên Front-end nhé.</p>
                    <Link class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="hidden lg:block col-span-1 ml-3 pl-5">
                    <img class="w-28 h-28 object-cover rounded-full border-4 border-blue-500" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/2/61a0439062b82.png" alt="">
                </div>
            </div>
            <div class="grid lg:grid-cols-3 border rounded-xl px-7 py-5">
                <div class="col-span-3 lg:col-span-2">
                    <h4 class="text-xl font-bold">Lộ trình học Back-end</h4>
                    <p class="py-5 text-sm leading-6">Trái với Front-end thì lập trình viên Back-end là người làm việc với dữ liệu, công việc thường nặng tính logic hơn. Chúng ta sẽ cùng tìm hiểu thêm về lộ trình học Back-end nhé.</p>
                    <Link class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="hidden lg:block col-span-1 ml-3 pl-5">
                    <img class="w-28 h-28 object-cover rounded-full border-4 border-blue-500" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/3/61a0439cc779b.png" alt="">
                </div>
            </div>
        </div>
    </div>
</template>
