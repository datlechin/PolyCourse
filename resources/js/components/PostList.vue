<script>
import PostItem from "@/components/PostItem.vue";

export default {
    components: {
        PostItem,
    },
    props: {
        posts: Array,
    }
}
</script>

<template>
    <div>
        <PostItem
            v-for="(post, index) in posts"
            :key="index"
            :post="post"
        />
    </div>
</template>
