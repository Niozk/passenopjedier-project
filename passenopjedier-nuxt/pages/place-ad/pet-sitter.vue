<template>
    <div class="container">
        <h1>Oppas worden</h1>
        <form @submit.prevent="submitForm">
            <div class="form-section">
                <q-input v-model="formData.name" filled size="30px" label="Naam"/>
            </div>
            <div class="form-section">
                <q-input v-model="formData.description" filled max-width="600px" label="Beschrijving" type="textarea"/>
            </div>
            <div class="form-section">
                <q-input v-model="formData.hourlyRate" filled size="25px" label="Prijs per uur" type="number"/>
            </div>
            <q-file v-model="formData.pictures" multiple counter max-files="3" outlined label="Upload foto">
                <template v-slot:prepend>
                    <q-icon name="attach_file" />
                </template>
            </q-file>
            <button type="submit">Plaats aanbod</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const formData = ref({
    name: '',
    description: '',
    hourlyRate: 0,
    pictures: null
});

const submitForm = async () => {
    const data = new FormData();
    const user = ref(JSON.parse(localStorage.getItem('user')));
    const id = ref(user.value.id);
    
    data.append('user_id', id.value);

    data.append('name', formData.value.name);
    data.append('description', formData.value.description);
    data.append('hourly_rate', formData.value.hourlyRate);

    if (formData.value.pictures != null) {
        for (let i = 0; i < formData.value.pictures.length; i++) {
            data.append('pictures[]', formData.value.pictures[i]);
        }
    }

    await $fetch('/api/petSitter', {
        method: 'POST',
        body: data,
    })

    return navigateTo('/')
};
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    margin: 50px 0 0 0;
    padding: 0 20px 0 20px;
}

.container h1 {
    font-size: 2rem;
    text-align: center;
    line-height: 1.2;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.form-section {
    display: flex;
    justify-content: center;
    gap: 30px;
}

.upload-container {
    display: flex;
    align-items: center;
    gap: 30px;
}

@media only screen 
and (max-width: 950px) {
    .form-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    .upload-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 30px;
    }
}
</style>