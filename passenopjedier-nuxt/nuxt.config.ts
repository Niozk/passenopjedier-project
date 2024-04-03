// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  app: {
    head: {
      title: 'Passen op je Dier',
    }
  },
  css: ['~/public/main.css'],
  modules: [
    'nuxt-quasar-ui'
  ],
  quasar: { /* */ }

})
