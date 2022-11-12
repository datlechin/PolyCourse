<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import Sidebar from "@/components/Sidebar.vue";

export default {
    components: {
        Sidebar,
        Header,
        Footer,
    },
}
</script>

<template>
    <Header />
    <div class="flex mt-3">
        <Sidebar />
        <main class="w-full px-20 mb-20">
            <slot />
        </main>
    </div>
    <Footer />
</template>
