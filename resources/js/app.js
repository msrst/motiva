require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faTachometerAlt,
    faTasks,
    faUsers,
    faUser,
    faSignOutAlt,
    faSadTear,
    faCheckCircle,
    faArrowUp, faArrowDown, faPizzaSlice, faCheckSquare, faClipboardCheck, faArrowRight, faArrowLeft
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faTachometerAlt, faTasks, faUsers, faUser, faSignOutAlt, faSadTear, faCheckCircle, faArrowUp, faArrowDown,
    faPizzaSlice, faCheckSquare, faClipboardCheck, faArrowRight, faArrowLeft)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
