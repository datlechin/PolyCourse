<script setup>
import { Link, Head } from '@inertiajs/vue3'
import route from "ziggy-js/src/js"

defineProps({
    learningPaths: Array,
})
</script>

<template>
    <Head title="Lộ trình học" />
    <div>
        <div class="mt-3 mb-12">
            <h2 class="mb-3 text-2xl font-bold">Lộ trình học</h2>
            <p>Để bắt đầu một cách thuận lợi, bạn nên tập trung vào một lộ trình học. Ví dụ: Để đi làm với vị trí “Lập trình viên Front-end” bạn nên tập trung vào lộ trình “Front-end”.</p>
        </div>
        <div class="grid gap-2 mt-5 lg:grid-cols-2">
            <div
                v-for="(learningPath, index) in learningPaths"
                :key="index"
                class="grid py-5 border lg:grid-cols-3 rounded-xl px-7"
            >
                <div class="col-span-3 lg:col-span-2">
                    <h4 class="text-xl font-bold" v-text="learningPath.name" />
                    <p class="py-5 text-sm leading-6" v-text="learningPath.description" />
                    <Link :href="route('learning-paths.show', learningPath.slug)" class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="hidden col-span-1 pl-5 ml-3 lg:block">
                    <img :src="learningPath.image_url" :alt="learningPath.name" class="object-cover border-4 border-blue-500 rounded-full w-28 h-28">
                </div>
            </div>
        </div>
    </div>
</template>
