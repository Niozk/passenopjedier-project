<template>
    <NuxtLink :href="`/pet-sitting-request-ad-${props.id}`" class="post">
        <div class="column-1">
            <p class="name">{{ props.petName }}</p>
            <img class="picture" :src="`http://localhost/uploads/pet-sitting-request/${props.picture}`">
        </div>
        <div class="column-2">
            <p>{{ props.species }}</p>
            <p>{{ props.breed }} </p>
            <p>{{ props.age }} jaar oud</p>
            <p>€{{ props.hourlyRate }} per uur</p>
            <p>{{ props.description }}</p>
        </div>
    </NuxtLink>
</template>

<script setup>
const props = defineProps({
    id: Number,
    petName: String,
    species: String,
    breed: String,
    age: Number,
    hourlyRate: String,
    description: String,
    picture: String,
    href: String,
});
</script>

<style scoped>
.post {
    display: flex;
    gap: 20px;
}

.column-1 {
    display: flex;
    flex-direction: column;
}

.column-2 {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 40px 0 0 0;
    max-width: 500px;
    text-wrap: wrap;
}

.name {
    font-size: 1.2rem;
    font-weight: bold;
}

.picture {
    max-width: 200px;
}

@media only screen 
and (max-width: 950px) {
    .post {
        flex-direction: column;
    }

}
</style>