<script setup>
import Header from './Header.vue'
import Footer from './Footer.vue'
import Sidebar from './Sidebar.vue'
</script>

<template>
    <Header />
    <div class="flex mt-3">
        <Sidebar />
        <main class="w-full px-6 mb-20 md:px-20">
            <slot />
        </main>
    </div>
    <Footer />
</template>
