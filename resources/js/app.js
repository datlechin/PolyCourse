import { createApp, h } from 'vue'
import {createInertiaApp, usePage} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import NProgress from 'nprogress'
import { Inertia } from '@inertiajs/inertia'

import '../sass/app.scss'

import Layout from "@/components/Layout.vue"

createInertiaApp({
    resolve: (name) => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
        page.then((module) => {
            module.default.layout = module.default.layout || Layout
        })

        return page
    },
    title: title => `${title} - ${usePage().props.value.app.name}`,
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})

InertiaProgress.init()

let timeout = null

Inertia.on('start', () => {
    timeout = setTimeout(() => NProgress.start(), 250)
})

Inertia.on('progress', (event) => {
    if (NProgress.isStarted() && event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
})

Inertia.on('finish', (event) => {
    clearTimeout(timeout)
    if (!NProgress.isStarted()) {
        return
    } else if (event.detail.visit.completed) {
        NProgress.done()
    } else if (event.detail.visit.interrupted) {
        NProgress.set(0)
    } else if (event.detail.visit.cancelled) {
        NProgress.done()
        NProgress.remove()
    }
})

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
