<template>
    <div class="accept">
        <button @click="openReview">Accepteer</button>
    </div>
</template>

<script setup>
import { useQuasar } from 'quasar'

const $q = useQuasar()

function openReview () {
    $q.dialog({
        title: 'Plaats review',
        prompt: {
            model: '',
        },
    }).onOk(data => {
        // console.log('>>>> OK, received', data) UPLOAD REVIEW
    }).onCancel(() => {
        // console.log('Cancel') GEEN REVIEW
    })
}
</script>

<style scoped>
.accept {
    display: flex;
    margin: 0 auto;
    background-color: var(--secondary-color);
}
</style>