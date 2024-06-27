import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import MainLayout from '@Layouts/MainLayout.vue';
import { ZiggyVue } from 'ziggy';
import '../css/app.css';

createInertiaApp({
  resolve: name => {
    const [moduleName, pageName] = name.split('/');
    const page = resolvePageComponent(`./Modules/${moduleName}/Resources/js/Pages/${pageName}.vue`, import.meta.glob('./Modules/**/Resources/js/Pages/**/*.vue'));
    page.then(module => {
      module.default.layout = module.default.layout || MainLayout;
    });
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el);
  },
});
