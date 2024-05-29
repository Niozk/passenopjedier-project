<template>
    <section class="ad">
            <div class="column-1">
                <p class="name">{{ props.name }}</p>
                <img class="picture" :src="`http://localhost/uploads/profile-pictures/${props.picture}`">
            </div>
        <div class="column-2" v-if="!props.blocked">
            <button @click="delete">block</button>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    name: String,
    picture: String,
    blocked: Boolean,
});
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