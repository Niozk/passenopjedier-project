<template>
    <div class="request-container">
        <h1>Oppas aanvragen</h1>
        <form action="#">
            <div class="form-section">
                <q-input filled size="30px" label="Naam"/>
                <q-input filled size="30px" label="Leeftijd" type="number"/>
            </div>
            <div class="form-section">
                <q-input filled size="25px" label="Dier"/>
                <q-input filled size="25px" label="Ras"/>
            </div>
            <div class="form-section">
                <q-input filled size="25px" label="Start Datum" type="date"/>
                <q-input filled size="25px" label="Eind Datum" type="date"/>
                <q-input filled size="25px" label="Prijs per uur" type="number"/>
            </div>
            <div class="form-section">
                <q-input filled max-width="600px" label="Beschrijving" type="textarea"/>
            </div>
            <div class="upload-container">
                <img src="@/public/test-image.jpg">
                <q-file outlined label="Upload foto">
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
            </div>
            <button type="submit">Plaats aanvraag</button>
        </form>
    </div>
</template>

<script setup>
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

.upload-container img {
    max-width: 300px;
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