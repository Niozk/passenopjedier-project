<template>
    <section class="choose-ad">
        <q-btn icon="fa-solid fa-paw" to="/place-ad/pet-sitting-request" stack style="color:var(--primary-color); padding: 40px;" size="30px">
            Vraag oppas <br> voor uw huisdier
        </q-btn>
        <q-btn icon="fa-solid fa-house" to="/place-ad/pet-sitter" stack style="color:var(--primary-color); padding: 40px;" size="30px">
            Bied verblijf <br> voor huisdier aan
        </q-btn>
    </section>
</template>

<script setup>
</script>

<style scoped>
.choose-ad {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 50px;
}

@media only screen 
and (max-width: 950px) {
    .choose-ad {
        flex-direction: column;
        justify-content: unset;
        align-items: center;
    }
}

</style>