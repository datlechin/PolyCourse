<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    post: Object,
})
</script>

<template>
    <div>
        <Link :href="post.slug">
            hello
        </Link>
    </div>
</template>
