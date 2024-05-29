<template>
    <div class="request-container" v-if="!currentUser.blocked">
        <h1>Oppas aanvragen</h1>
        <form @submit.prevent="submitForm">
            <div class="form-section">
                <q-input v-model="formData.name" filled size="30px" label="Naam"/>
                <q-input v-model="formData.age" filled size="30px" label="Leeftijd" type="number"/>
            </div>
            <div class="form-section">
                <q-input v-model="formData.species" filled size="25px" label="Dier"/>
                <q-input v-model="formData.breed" filled size="25px" label="Ras"/>
            </div>
            <div class="form-section">
                <q-input v-model="formData.startDate" filled size="25px" label="Start Datum" type="date"/>
                <q-input v-model="formData.endDate" filled size="25px" label="Eind Datum" type="date"/>
                <q-input v-model="formData.hourlyRate" filled size="25px" label="Prijs per uur" type="number"/>
            </div>
            <div class="form-section">
                <q-input v-model="formData.description" filled max-width="600px" label="Beschrijving" type="textarea"/>
            </div>
            <div class="upload-container">
                <q-file v-model="formData.picture" outlined label="Upload foto">
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
            </div>
            <button type="submit">Plaats aanvraag</button>
        </form>
    </div>
    <p class="blocked" v-if="currentUser.blocked">You are blocked!</p>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const currentUser = ref('');
onMounted(() => {
    getCurrentUser()
});

const formData = ref({
    name: '',
    age: 0,
    species: '',
    breed: '',
    startDate: null,
    endDate: null,
    hourlyRate: 0,
    description: '',
    picture: null
});

const getCurrentUser = async () => {
    try {
        const user = ref(JSON.parse(localStorage.getItem('user')));
        const id = ref(user.value.id);

        currentUser.value = await $fetch(`/api/user/${id.value}`, {});
        if (currentUser.value.blocked) {
            console.log('BLOCKED')
        }
    } catch (error) {
        console.error('Error occurred:', error);
    }
};

const submitForm = async () => {
    const data = new FormData();
    const user = ref(JSON.parse(localStorage.getItem('user')));
    const id = ref(user.value.id);
    
    data.append('user_id', id.value);

    data.append('pet_name', formData.value.name);
    data.append('age', formData.value.age);
    data.append('species', formData.value.species);
    data.append('breed', formData.value.breed);
    data.append('start_date', formData.value.startDate);
    data.append('end_date', formData.value.endDate);
    data.append('hourly_rate', formData.value.hourlyRate);
    data.append('description', formData.value.description);

    if (formData.value.picture != null) {
        data.append('picture', formData.value.picture);
    }

    await $fetch('/api/petSittingRequest', {
        method: 'POST',
        body: data,
    })

    return navigateTo('/')
};
</script>

<style scoped>
.request-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    margin: 50px 0 0 0;
    padding: 0 20px 0 20px;
}

.request-container h1 {
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

.blocked {
    display: flex;
    justify-content: center;
    margin: 40px 0 0 0;
    font-size: 1.4rem;
}
</style>