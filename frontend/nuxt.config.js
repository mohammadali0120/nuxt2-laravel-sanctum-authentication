export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'frontend',
    htmlAttrs: {
      lang: 'en',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/tailwindcss',
    '@nuxtjs/auth-next',
    'cookie-universal-nuxt',
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: 'http://localhost:8000',
    credentials: true,
  },
  auth: {
    redirect: {
      login: '/',
      logout: '/',
      callback: '/',
      home: '/',
    },
    strategies: {
      laravelSanctum: {
        provider: 'laravel/sanctum',
        url: 'http://localhost:8000',
        user: {
          authFetch: true,
          // property: 'data.user',
        },
        token: {
          property: 'token',
          global: true,
          required: true,
          type: 'Bearer',
        },
        endpoints: {
          csrf: {
            url: '/sanctum/csrf-cookie',
          },
          login: {
            url: '/api/login',
            method: 'post',
          },
          logout: false,
          user: {
            url: '/api/logged-in-user-info',
            method: 'get',
          },
        },
      },
    },
  },
  // router: {
  //   middleware: ['auth'],
  // },
  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
  tailwindcss: {
    cssPath: '~/assets/tailwind.css',
    configPath: 'tailwind.config.js',
    exposeConfig: false,
    config: {},
  },
}
