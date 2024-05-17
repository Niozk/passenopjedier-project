<template>
    <section class="container">
        <div class="ad-head">
            <h1 class="name">{{ adData.pet_name }}</h1>
            <img class="picture" :src="picture">
        </div>
        <div class="ad-body">
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Dier</h2>
                    <p>{{ adData.species }}</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Ras</h2>
                    <p>{{ adData.breed }}</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Leeftijd</h2>
                    <p>{{ adData.age }}</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Prijs per uur</h2>
                    <p>{{ adData.hourly_rate }}</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Start datum </h2>
                    <p>{{ adData.start_date }}</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Eind datum</h2>
                    <p>{{ adData.end_date }}</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Beschrijving</h2>
                    <p> {{ adData.description }} </p>
                </div>
            </div>
            <ReviewModal />
        </div>
        <section class="reviews">
                <div class="review-post">
                    <p class="review-name">naam</p>
                    <p>lorem REVIEW REVIEW REVIEW lorem</p>
                </div>
        </section>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const route = useRoute()
const adData = ref('');
const picture = ref('');

onMounted(() => {
    getAdData()
});

const getAdData = async () => {
    try {
        const id = ref(route.params.id);
        console.log(id.value);

        adData.value = await $fetch(`/api/pet-sitting-request/${id.value}`, {});
        console.log(adData.value);

        const pictureUrl = await $fetch(`/api/pet-sitting-request-picture/${adData.value.picture}`, {});
        const blob = new Blob([pictureUrl]);
        picture.value = URL.createObjectURL(blob);

    } catch (error) {
        console.error('Error occurred:', error);
    }
};
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    gap: 50px;
    margin: 50px 0 0 0;
    padding: 0 100px;
}

.ad-head {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.name {
    font-size: 2rem;
}

.picture {
    max-width: 300px;
    max-height: 300px;
}

.ad-body {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 900px;
    border: solid 1px black;
}

.ad-detail {
    display: flex;
    gap: 80px;
}

.ad-detail h2 {
    font-size: 1.2rem;
    font-weight: bold;
}

.ad-detail-text {
    width: 450px;
}


@media only screen 
and (max-width: 800px) {
    .container {
        display: flex;
        flex-direction: column;
        gap: 40px;
        margin: 50px 0 0 0;
        padding: 0 50px;
    }

    .ad-body {
        gap: 30px;
    }

    .ad-detail {
        flex-direction: column;
        gap: 20px;
    }

    .ad-detail-text {
        width: unset;
    }
}

.reviews {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
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