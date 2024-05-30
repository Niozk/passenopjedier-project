<template>
    <div class="register-container">
        <h1>Registreer</h1>
        <form @submit.prevent="submitForm">
            <q-input v-model="formData.name" filled size="40px" label="Gebruikersnaam" :rules="validationRule"/>
            <q-input v-model="formData.email" filled size="40px" label="E-mail" type="email" :rules="validationRule"/>
            <q-input v-model="formData.password" filled size="40px" label="Wachtwoord" type="password" :rules="validationRule"/>
            <div class="avatar-container">
                <q-file v-model="formData.profile_picture" outlined label="Upload foto">
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
            </div>
            <button type="submit">Registreer</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const formData = ref({
    name: '',
    email: '',
    password: '',
    profile_picture: null
});

const validationRule = [val => !!val || 'Veld is verplicht'];

const submitForm = async () => {
    const data = new FormData();

    if (
        formData.value.name === '' ||
        formData.value.email === '' ||
        formData.value.password === ''
    ) {
        alert('Vul aub de gevraagde velden in');
        return;
    }
    
    data.append('name', formData.value.name);
    data.append('email', formData.value.email);
    data.append('password', formData.value.password);

    if (formData.value.profile_picture != null) {
        data.append('profile_picture', formData.value.profile_picture);
    }

    await $fetch('/api/register', {
        method: 'POST',
        body: data,
    })

    return navigateTo('/login')
};
</script>

<style scoped>
.register-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    margin: 50px 0 0 0;
    padding: 0 20px 0 20px;
}

.register-container h1 {
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

.avatar-container {
    display: flex;
    gap: 20px;
}

</style>