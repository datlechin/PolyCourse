<script>
import { HomeIcon, NewspaperIcon, LightBulbIcon, MapIcon } from '@heroicons/vue/24/solid'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Link,
        HomeIcon,
        NewspaperIcon,
        LightBulbIcon,
        MapIcon,
    },
    data() {
        return {
            items: [
                {
                    name: 'Home',
                    url: '/',
                    icon: HomeIcon
                },
                {
                    name: 'Lộ trình',
                    url: '/learning-paths',
                    icon: MapIcon,
                },
                {
                    name: 'Học',
                    url: '/courses',
                    icon: LightBulbIcon,
                },
                {
                    name: 'Blog',
                    url: '/blog',
                    icon: NewspaperIcon
                },
            ]
        }
    }
}
</script>

<template>
    <div class="px-3">
        <ul>
            <li
                v-for="(item, index) in items"
                :key="index"
            >
                <Link
                    :href="item.url"
                    class="text-gray-700 font-semibold flex flex-col items-center justify-center text-xs rounded-[16px] mt-1 w-[72px] h-[72px] hover:bg-gray-100"
                    :class="{ 'bg-gray-200': $page.url === item.url }"
                >
                    <component :is="item.icon" class="w-6" />
                    {{ item.name }}
                </Link>
            </li>
        </ul>
    </div>
</template>
