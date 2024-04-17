<template>
    <q-btn icon="fa-solid fa-filter" color="white" @click="openFilter" v-if="!store.isNavVisible"/> <!--hide het bij normale scherm-->
</template>

<script setup>
import { useQuasar } from 'quasar'
import { useStore } from '@/stores/store.js'

const $q = useQuasar()
const store = useStore();

function openFilter () {
    $q.dialog({
        title: 'Filters',
        message: 'Some message'
    }).onOk(() => {
        // console.log('OK')
    }).onCancel(() => {
        // console.log('Cancel')
    }).onDismiss(() => {
        // console.log('I am triggered on both OK and Cancel')
    })
}
</script>



<style scoped>
</style>