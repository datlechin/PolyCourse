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
    <div class="flex h-screen mt-3">
        <Sidebar />
        <main>
            <slot />
        </main>
    </div>
    <Footer />
</template>
