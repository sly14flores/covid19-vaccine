
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