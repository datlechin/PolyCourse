<script setup>
import { Link } from '@inertiajs/vue3'
import { HomeIcon, LightBulbIcon, MapIcon, NewspaperIcon } from '@heroicons/vue/24/solid'

const items = [
    {
        name: 'Home',
        component: 'Home',
        url: '/',
        icon: HomeIcon
    },
    {
        name: 'Lộ trình',
        component: 'LearningPaths',
        url: '/learning-paths',
        icon: MapIcon,
    },
    {
        name: 'Học',
        url: '/courses',
        component: 'Courses',
        icon: LightBulbIcon,
    },
    {
        name: 'Blog',
        component: 'Blog',
        url: '/blog',
        icon: NewspaperIcon
    },
]
</script>

<template>
    <div class="px-3 hidden md:block">
        <ul>
            <li
                v-for="(item, index) in items"
                :key="index"
            >
                <Link
                    :href="item.url"
                    class="text-gray-700 font-semibold flex flex-col items-center justify-center text-xs rounded-[16px] mt-1 w-[72px] h-[72px] hover:bg-gray-100"
                    :class="{ 'bg-gray-200': $page.component.startsWith(item.component) }"
                >
                    <component :is="item.icon" class="w-6" />
                    {{ item.name }}
                </Link>
            </li>
        </ul>
    </div>
</template>
