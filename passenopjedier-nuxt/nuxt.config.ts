// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  app: {
    head: {
      title: 'Passen op je Dier',
      link: [{ rel:"stylesheet", href:'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' }]
    }
  },
  plugins: [
    '~/plugins/mounted-plugin.js',
  ],
  css: ['~/public/main.css'],
  modules: [
    '@pinia/nuxt',
    'nuxt-quasar-ui'
  ],
  quasar: { /* */ }

})
