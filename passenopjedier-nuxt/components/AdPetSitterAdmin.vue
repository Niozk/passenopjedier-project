<template>
    <section class="ad">
        <NuxtLink :href="`/pet-sitter-ad-${props.id}`" class="post">
            <div class="column-1">
                <p class="name">{{ props.name }}</p>
                <img class="picture" :src="props.picture">
            </div>
        </NuxtLink>
        <div class="column-2">
            <button @click="deletePetSitter()">delete</button>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    id: Number,
    name: String,
    picture: String,
});

const deletePetSitter = async () => {
    try {
        await $fetch(`/api/delete-pet-sitter/${props.id}`, {method: 'DELETE',});
        return location.reload();
        
    } catch (error) {
        console.error('Error occurred:', error);
    }
};
</script>

<style scoped>
.ad {
    display: flex;
    justify-content: space-between;
    gap: 40px;
}

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
    align-items: center;
    justify-self: end;
}

button {
    border: 1px solid black;;
}

.name {
    font-size: 1.2rem;
}

.picture {
    max-width: 75px;
}

@media only screen 
and (max-width: 950px) {
    .post {
        flex-direction: column;
    }

}
</style>