<script setup>
import { Link } from '@inertiajs/vue3'
import route from 'ziggy-js/src/js'
import { HomeIcon, LightBulbIcon, MapIcon, NewspaperIcon } from '@heroicons/vue/24/solid'

const items = [
    {
        name: 'Home',
        component: 'Home',
        url: route('home'),
        icon: HomeIcon
    },
    {
        name: 'Lộ trình',
        component: 'LearningPaths',
        url: route('learning-paths.index'),
        icon: MapIcon,
    },
    {
        name: 'Học',
        component: 'Courses',
        url: route('courses.index'),
        icon: LightBulbIcon,
    },
    {
        name: 'Blog',
        component: 'Blog',
        url: route('blog.index'),
        icon: NewspaperIcon
    },
]
</script>

<template>
    <div class="hidden px-3 md:block md:sticky md:top-20 md:self-start md:overflow-hidden mb-12">
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
