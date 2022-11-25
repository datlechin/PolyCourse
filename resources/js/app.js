import { createApp, h } from 'vue'
import { createInertiaApp, usePage } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

import '../sass/app.scss'
import Layout from "@/components/Layout.vue";
import route from "ziggy-js/src/js";

createInertiaApp({
    resolve:  (name) => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
        page.then((module) => {
            module.default.layout = module.default.layout || Layout
        })
        return page
    },
    title: title => `${title} - ${usePage().props.value.appName}`,
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .mount(el)
    },
})
