import axios from 'axios';

const api = axios.create({
    baseURL: '/',
    withCredentials: true,
    headers: {
        Accept: 'application/json',
    },
    xsrfCookieName: 'XSRF-TOKEN',
    xsrfHeaderName: 'X-XSRF-TOKEN',
});

let csrfInitialized = false;

api.interceptors.request.use(async (config) => {
    const method = config.method?.toUpperCase();

    if (
        method &&
        ['POST', 'PUT', 'PATCH', 'DELETE'].includes(method) &&
        !csrfInitialized
    ) {
        await axios.get('/sanctum/csrf-cookie', {
            withCredentials: true,
        });

        csrfInitialized = true;
    }

    return config;
});

export default api;