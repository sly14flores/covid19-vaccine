
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Add Token
 */
window.axios.interceptors.request.use(function (config) {

    const pgluVaccinesStr = localStorage.getItem('pgluVaccines') || '{"profile": {}}'

    const pgluVaccines = JSON.parse(pgluVaccinesStr)

    const { profile } = pgluVaccines || {}
    const token = profile.token || ''

    config.headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        Authorization:  `Bearer ${token}`
    }

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
            window.open('admin#/login','_self');
        }
        return Promise.reject(error);
    },
);