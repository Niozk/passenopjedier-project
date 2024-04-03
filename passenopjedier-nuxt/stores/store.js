import { ref, onMounted } from 'vue'
import { defineStore } from 'pinia'

export const useStore = defineStore('store', () => {
    const isNavVisible = ref();
    onMounted(() => {
        isNavVisible.value = window.innerWidth > 950;
    });

    return { isNavVisible }
})
