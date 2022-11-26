<script setup>
import { Link } from '@inertiajs/vue3'
import { ChevronLeftIcon } from '@heroicons/vue/24/solid'
import route from "ziggy-js/src/js";
defineProps({
    course: Object,
})
</script>

<template>
    <header class="sticky top-0 flex justify-between items-center bg-gray-800 h-12 px-7">
        <div class="flex items-center">
            <Link :href="route('home')" class="mr-7">
                <ChevronLeftIcon class="text-white w-5 h-5" />
            </Link>
            <div class="flex items-center">
                <img src="@/../images/logo.png" alt="" class="w-8 h-8 rounded-lg">
                <span class="text-white font-bold ml-3" v-text="course.name" />
            </div>
        </div>
    </header>
    <main>
        <slot />
    </main>

    <footer>

    </footer>
</template>
