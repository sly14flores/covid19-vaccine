import { createApp, reactive } from 'vue';
import App from './App.vue';
import router from './router';
import PrimeVue from 'primevue/config';
import store from './store.js';

import 'primevue/resources/themes/saga-blue/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
import 'primeflex/primeflex.css'

import '../css/layout/layout.scss';
import '../css/layout/flags/flags.css';

import Ripple from 'primevue/ripple';
import Tooltip from 'primevue/tooltip';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Add Token
 */
window.axios.interceptors.request.use(function (config) {

    const covid19VaccinesStr = localStorage.getItem('covid19Vaccines')

    const covid19Vaccines = JSON.parse(covid19VaccinesStr)

    const token = covid19Vaccines.token

    config.headers.Authorization =  `Bearer ${token}`;

    return config;

});

/**
 * Validation sequence
 * 401 for invalid token e.g., expired or non-passport token
 */
window.axios.interceptors.response.use(
    response => response,
    // eslint-disable-next-line func-names
    async function(error) {
        if (error.response.status === 401) {
            window.open('home#/login','_self');
        }
        return Promise.reject(error);
    },
);

const app = createApp(App);

app.config.globalProperties.$appState = reactive({ inputStyle: 'outlined' });
app.config.globalProperties.$primevue = reactive({ ripple: true });

app.use(router);
app.use(PrimeVue);
app.use(store);
app.directive('ripple', Ripple);
app.directive('tooltip', Tooltip);
app.mount('#app');