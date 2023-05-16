// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  routeRules: {
    '/account/**': { ssr: false },
    '/auth/**': { ssr: false },
    '/login': { ssr: false }
  },

  modules: [
    'nuxt-sanctum-auth',
    '@nuxtjs/tailwindcss',
  ],
  nuxtSanctumAuth: {
    token: false, // set true to use jwt-token auth instead of cookie. default is false
    baseUrl: 'http://localhost:8000/',
    endpoints: {
      csrf: 'sanctum/csrf-cookie',
      login: 'api/login',
      logout: '/logout',
      user: '/user'
    },
    csrf: {
      headerKey: 'X-XSRF-TOKEN',
      cookieKey: 'XSRF-TOKEN',
      tokenCookieKey: 'nuxt-sanctum-auth-token'
    },
    redirects: {
      home: '/account',
      login: '/login',
      logout: '/'
    }
  }
})
