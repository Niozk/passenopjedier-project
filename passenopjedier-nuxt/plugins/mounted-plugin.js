export default defineNuxtPlugin({
    name: 'mounted-plugin',
    async setup (nuxtApp) {
    },
    hooks: {
        'app:mounted'() {
            const store = useStore();
            window.addEventListener('resize', () => {
                store.isNavVisible = ref(window.innerWidth > 950)
            });
        }
    }
})