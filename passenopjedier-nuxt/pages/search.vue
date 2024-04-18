<template>
    <section class="container">
        <section class="search-container">
            <q-input filled size="40px" label="Zoek">
                <template v-slot:append>
                    <q-icon name="search" />
                </template>
            </q-input>
            <section class="filters" v-if="!store.isNavVisible">
                <q-option-group v-model="group" :options="options" color="green" type="checkbox" />
                <div class="pet-sitting-request-exclusive">
                    <q-input filled label="Dier" :dense="dense" />
                    <q-input filled label="Ras" :dense="dense" />
                    <q-input filled label="Leeftijd" type="number" :dense="dense" />
                </div>
            </section>
        </section>
        <section class="filters" v-if="store.isNavVisible">
            <q-option-group v-model="group" :options="options" color="green" type="checkbox" />
            <div class="pet-sitting-request-exclusive">
                <q-input filled label="Dier" :dense="dense" />
                <q-input filled label="Ras" :dense="dense" />
                <q-input filled label="Leeftijd" type="number" :dense="dense" />
            </div>
        </section>
        <section class="ads">
            <AdSearch />
            <AdSearch />
            <!-- miss infinite scroll -->
        </section>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import { useStore } from '@/stores/store.js'

const store = useStore();

const group = ref(['op1'])

const options = [
    { label: 'Huisdier', value: 'op1' },
    { label: 'Oppas', value: 'op2' }
]
</script>

<style scoped>
.container {  
    display: grid;
    grid-template-columns: 0.7fr 1.3fr 1fr;
    grid-template-rows: 1fr 1fr 1fr;
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
    max-width: 250px;
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
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        grid-template-areas:
            "search-container search-container search-container"
            "ads ads ads"
            "ads ads ads";
    }

    .ads {
        justify-self: center;
        width: 400px;
        margin: 0;
    }
}

@media only screen 
and (max-width: 450px) {
    .ads {
        width: 300px;
    }
}
</style>