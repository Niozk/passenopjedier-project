<template>
    <section class="container">
        <div class="ad-head">
            <h1 class="name">{{ adData.name }}</h1>
            <div class="carousel">
                <q-carousel swipeable animated v-model="slide" thumbnails infinite height="300px">
                    <q-carousel-slide :name="1" :img-src="pictureUrls[0]" />
                    <q-carousel-slide :name="2" :img-src="pictureUrls[1]" />
                    <q-carousel-slide :name="3" :img-src="pictureUrls[2]" />
                </q-carousel>
            </div>
        </div>
        <div class="ad-body">
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Beschrijving</h2>
                    <p>{{ adData.description }}</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Prijs per uur</h2>
                    <p>{{ adData.hourly_rate }}</p>
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
const pictureUrls = ref([]);
const slide = ref(1);

onMounted(() => {
    getAdData()
});

const getAdData = async () => {
    try {
        const id = ref(route.params.id);
        console.log(id.value);

        adData.value = await $fetch(`/api/pet-sitter/${id.value}`, {});
        console.log(adData.value);

        pictureUrls.value = await $fetch(`/api/pet-sitter-pictures/${adData.value.id}`, {});
        console.log(pictureUrls);

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

.carousel {
    max-width: 400px;
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