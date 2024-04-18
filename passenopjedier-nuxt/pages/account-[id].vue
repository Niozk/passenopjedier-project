<template>
    <section class="profile">
        <p>naam: </p>
        <p>email: </p>
        <p>Datum account gecreërd: </p>
    </section>
    <section class="reviews">
        <div class="review-post">
            <p class="review-name">naam</p>
            <p>lorem REVIEW REVIEW REVIEW lorem</p>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

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

.reviews {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin: 50px auto 0 auto;
    max-width: 500px;
    border: solid 1px var(--letter-color-dark);
}

.review-post {
    display: flex;
    flex-direction: column;
}

.review-name {
    font-size: 1.2rem;
    font-weight: bold;
}

</style>