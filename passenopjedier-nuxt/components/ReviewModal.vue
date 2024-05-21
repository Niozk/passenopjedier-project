<template>
    <div class="accept">
        <button @click="openReview">Accepteer</button>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useQuasar } from 'quasar'

const route = useRoute()
const $q = useQuasar()

const props = defineProps({
    adType: {
        type: String,
        required: true,
    }
});

function openReview () {
    $q.dialog({
        title: 'Plaats review',
        prompt: {
            model: '',
        },
    }).onOk(input => {
        console.log('>>>> OK, received:', input) // UPLOAD REVIEW
        inputData.value = input
        submitForm();
    }).onCancel(() => {
        console.log('Cancel') //geen review
    })
}

const inputData = ref('');

const submitForm = async () => {
    const data = new FormData();
    const user = ref(JSON.parse(localStorage.getItem('user')));
    const id = ref(user.value.id);
    const adId = ref(route.params.id);
    
    data.append('reviewer_id', id.value);
    data.append('ad_id', adId.value);
    data.append('type', props.adType);

    data.append('description', inputData.value);

    await $fetch('/api/review', {
        method: 'POST',
        body: data,
    })

    // return navigateTo(`/pet-sitter-ad-${adId.value}`)
};
</script>

<style scoped>
.accept {
    display: flex;
    margin: 0 auto;
    background-color: var(--secondary-color);
}
</style>