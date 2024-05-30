<template>
    <div class="login-container">
        <h1>Login</h1>
        <form @submit.prevent="submitForm">
            <q-input v-model="formData.email" filled size="40px" label="E-mail" type="email" :rules="validationRule"/>
            <q-input v-model="formData.password" filled size="40px" label="Wachtwoord" type="password" :rules="validationRule"/>
            <button type="submit">Login</button>
            <NuxtLink to="/register">Nog geen account?</NuxtLink>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const formData = ref({
    email: '',
    password: '',
});

const validationRule = [val => !!val || 'Veld is verplicht'];

const submitForm = async () => {
    if (
        formData.value.email === '' ||
        formData.value.password === ''
    ) {
        alert('Vul aub de gevraagde velden in');
        return;
    }

    try {
        const loginResult = await $fetch('/api/login', {
            method: 'POST',
            body: JSON.stringify(formData.value),
        });

        localStorage.setItem('authenticated', 'true');
        localStorage.setItem('user', JSON.stringify(loginResult.user));

        // const userData = await $fetch(`/api/1`, {});
        // console.log(userData)
        await navigateTo('/')
        return window.location.reload();
    } catch (error) {
        console.error('Error occurred:', error);
        alert('Foute inlog gegevens');
    }
};
</script>

<style scoped>
.login-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    margin: 50px 0 0 0;
    padding: 0 20px 0 20px;
}

.login-container h1 {
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
</style>