<script setup>
import { Link, Head } from '@inertiajs/vue3'
import route from "ziggy-js/src/js";

defineProps({
    learningPaths: Array,
})
</script>

<template>
    <Head title="Lộ trình học" />
    <div>
        <div class="mb-12 mt-3">
            <h2 class="text-2xl font-bold mb-3">Lộ trình học</h2>
            <p>Để bắt đầu một cách thuận lợi, bạn nên tập trung vào một lộ trình học. Ví dụ: Để đi làm với vị trí “Lập trình viên Front-end” bạn nên tập trung vào lộ trình “Front-end”.</p>
        </div>
        <div class="grid lg:grid-cols-2 mt-5 gap-2">
            <div
                v-for="(learningPath, index) in learningPaths"
                :key="index"
                class="grid lg:grid-cols-3 border rounded-xl px-7 py-5"
            >
                <div class="col-span-3 lg:col-span-2">
                    <h4 class="text-xl font-bold" v-text="learningPath.name" />
                    <p class="py-5 text-sm leading-6" v-text="learningPath.description" />
                    <Link :href="route('learning-paths.show', { slug: learningPath.slug })" class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="hidden lg:block col-span-1 ml-3 pl-5">
                    <img :src="learningPath.image_url" :alt="learningPath.name" class="w-28 h-28 object-cover rounded-full border-4 border-blue-500">
                </div>
            </div>
        </div>
    </div>
</template>
