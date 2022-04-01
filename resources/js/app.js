require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp,Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import AppLayout from '@/Layouts/AppLayout.vue'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - HotelsGo`,
    resolve: async (name) => {
        let page=(await import(`./Pages/${name}.vue`)).default ;
        page.layout??=AppLayout;
        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component("Link", Link)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({
     color: '#4B5563',
     includeCSS: true,

  // Whether the NProgress spinner will be shown.
  showSpinner: true,

});

