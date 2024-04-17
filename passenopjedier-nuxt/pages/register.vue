<template>
    <div class="register-container">
        <h1>Registreer</h1>
        <form action="#">
            <q-input filled size="40px" label="Gebruikersnaam"/>
            <q-input filled size="40px" label="E-mail" type="email"/>
            <q-input filled size="40px" label="Wachtwoord" type="password"/>
            <div class="avatar-container">
                <q-avatar size="60px" style="border: 1px solid var(--secondary-color)"><img src=""></q-avatar>
                <q-file outlined label="Upload foto">
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