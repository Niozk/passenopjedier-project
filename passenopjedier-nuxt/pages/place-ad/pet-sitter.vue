<template>
    <div class="container">
        <h1>Oppas worden</h1>
        <form action="#">
            <div class="form-section">
                <q-input filled size="30px" label="Naam"/>
            </div>
            <div class="form-section">
                <q-input filled max-width="600px" label="Beschrijving" type="textarea"/>
            </div>
            <div v-for="index in 3" :key="index" class="upload-container">
                <img src="@/public/test-image.jpg">
                <q-file outlined label="Upload foto">
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
            </div>
            <button type="submit">Plaats aanbod</button>
        </form>
    </div>
</template>

<script setup>
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

.upload-container img {
    max-width: 150px;
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