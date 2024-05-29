<template>
    <section class="ad">
            <div class="column-1">
                <p class="name">{{ props.name }}</p>
                <img class="picture" :src="`http://localhost/uploads/profile-pictures/${props.picture}`">
            </div>
        <div class="column-2">
            <button @click="blockUserHandler()" v-if="!block">block</button>
            <button @click="blockUserHandler()" v-if="block">unblock</button>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    id: Number,
    name: String,
    picture: String,
    blocked: Boolean,
});

const block = ref(props.blocked);

const blockUserHandler = async () => {
    try {
        const query = new URLSearchParams({
            blocked: !block.value,
        });
        await fetch(`/api/update-user/${props.id}?${query.toString()}`, {method: 'PUT',});
        return location.reload();
            
    } catch (error) {
        console.error('Error fetching filtered results:', error);
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