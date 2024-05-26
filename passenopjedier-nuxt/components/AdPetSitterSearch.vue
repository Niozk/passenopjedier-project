<template>
    <NuxtLink :href="`/pet-sitter-ad-${props.id}`" class="post">
        <div class="column-1">
            <p class="name">{{ props.name }}</p>
            <img class="picture" :src="props.picture">
        </div>
        <div class="column-2">
            <p>€{{ props.hourlyRate }} per uur</p>
            <p>{{ props.description }}</p>
        </div>
    </NuxtLink>
</template>

<script setup>
const props = defineProps({
    id: Number,
    name: String,
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