<template>
    <section class="profile">
        <p>naam: {{ userData.name }}</p>
        <p>email: {{ userData.email }}</p>
        <p>Datum account gecreërd: {{ userData.created_at }}</p>
    </section>
    <section class="reviews">
        <div class="review-post">
            <p class="review-name">naam</p>
            <p>lorem REVIEW REVIEW REVIEW lorem</p>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
const userData = ref('');

onMounted(() => {
    getUserData()
});

const getUserData = async () => {
    try {
        const user = ref(JSON.parse(localStorage.getItem('user')));
        const id = ref(user.value.id);

        console.log(id.value)
        userData.value = await $fetch(`/api/user/${id.value}`, {});
        console.log(userData.value);
    } catch (error) {
        console.error('Error occurred:', error);
    }
};

</script>

<style scoped>
.profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin: 50px auto 0 auto;
    max-width: 500px;
    text-align: center;
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