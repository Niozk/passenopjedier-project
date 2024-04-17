<template>
    <div class="login-container">
        <h1>Login</h1>
        <form action="#">
            <q-input filled size="40px" label="E-mail" type="email"/>
            <q-input filled size="40px" label="Wachtwoord" type="password"/>
            <button type="submit">Login</button>
            <NuxtLink to="/register">Nog geen account?</NuxtLink>
        </form>
    </div>
</template>

<script setup>
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