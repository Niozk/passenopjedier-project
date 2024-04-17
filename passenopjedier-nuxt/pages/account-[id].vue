<template>
    <section class="profile">
        <p>naam: </p>
        <p>email: </p>
        <p>Datum account gecreërd: </p>
    </section>
</template>

<script setup>

</script>

<style scoped>
.profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin: 50px auto 0 auto;
    max-width: 500px;
    border: solid 1px var(--letter-color-dark);
}

</style>