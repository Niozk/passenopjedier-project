<template>
    <section class="ad">
        <NuxtLink :href="`/pet-sitting-request-ad-${props.id}`" class="post">
            <div class="column-1">
                <p class="name">{{ props.petName }}</p>
                <img class="picture" :src="`http://localhost/uploads/pet-sitting-request/${props.picture}`">
            </div>
        </NuxtLink>
        <div class="column-2">
            <button @click="deletePetSittingRequest">delete</button>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    id: Number,
    petName: String,
    picture: String,
});

const deletePetSittingRequest = async () => {
    try {
        await $fetch(`/api/delete-pet-sitting-request/${props.id}`, {method: 'DELETE',});
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