<template>
    <section class="container">
        <section class="search-container">
            <q-input filled size="40px" label="Zoek">
                <template v-slot:append>
                    <q-icon name="search" />
                </template>
            </q-input>
        </section>
        <section class="filters" >
            <q-option-group v-model="group" :options="options" color="green" type="checkbox" />
            <div class="pet-sitting-request-exclusive">
                <q-input filled label="Dier" :dense="dense" />
                <q-input filled label="Ras" :dense="dense" />
                <q-input filled label="Leeftijd" type="number" :dense="dense" />
                <p>Prijs:</p>
                <q-range v-model="standard" label :min="0" :max="500"/>
            </div>
        </section>
        <section class="ads">
            <AdSearch />
            <AdSearch />
        </section>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const options = [
    { label: 'Huisdier', value: 'op1' },
    { label: 'Oppas', value: 'op2' }
]
const standard = ref({
    min: 0,
    max: 500,
})
const group = ref(['op1'])

</script>

<style scoped>
.container {  
    display: grid; 
    grid-auto-columns: 1fr; 
    grid-auto-rows: 1fr; 
    grid-template-columns: 0.7fr 1.3fr 1fr; 
    grid-template-rows: 1fr 1fr 1fr; 
    gap: 0px 0px; 
    grid-template-areas: 
        "search-container search-container search-container"
        "filters ads ads"
        "filters ads ads"; 
}

.search-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    margin: 50px 0;
    padding: 0 20px 0 40px;

    grid-area: search-container;
}

.filters {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 10px;
    width: 250px;
    border: 1px solid var(--letter-color-dark);

    grid-area: filters;
}

.ads {
    display: flex;
    flex-direction: column;
    gap: 40px;
    padding: 20px;
    margin: 0 80px 0 0;
    border: 1px solid var(--letter-color-dark);

    grid-area: ads;
}

.pet-sitting-request-exclusive {
    display: flex;
    flex-direction: column;
    gap: 10px;
}


@media only screen 
and (max-width: 950px) {
    .container {  
        display: grid;
        justify-content: center;
        grid-auto-columns: 1fr; 
        grid-auto-rows: 1fr; 
        grid-template-columns: 1fr 1fr 1fr; 
        grid-template-rows: 0.5fr 0.7fr 1.8fr; 
        gap: 20px 0px; 
        grid-template-areas: 
            "search-container search-container search-container"
            ". filters ."
            "ads ads ads"; 
    }

    .ads {
        justify-self: center;
        width: 500px;
        margin: 0;
    }
}

@media only screen 
and (max-width: 500px) {
    .ads {
        width: 350px;
    }
}
</style>