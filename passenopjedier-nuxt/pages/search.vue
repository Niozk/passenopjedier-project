<template>
    <section class="container">
        <section class="search-container">
            <q-input filled size="40px" label="Zoek">
                <template v-slot:append>
                    <q-icon name="search" />
                </template>
            </q-input>
            <FilterModal />
        </section>
        <section class="filters">
            hey
        </section>
        <section class="ads">
            <p>TESTTESTTEST</p>
            <p>testesttest</p>
            <!-- miss infinite scroll -->
        </section>
    </section>
</template>

<script setup>
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
    justify-content: center;
    gap: 20px;
    margin: 50px 0;
    padding: 0 20px 0 40px;

    grid-area: search-container;
}

.filters {
    max-width: 250px;
    border: 1px solid var(--letter-color-dark);

    grid-area: filters;
}

.ads {
    display: flex;
    flex-direction: column;
    padding: 20px;
    margin: 0 80px 0 0;
    border: 1px solid var(--letter-color-dark);

    grid-area: ads;
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

    .filters {
        display: none;
    }

    .ads {
        justify-self: center;
        margin: 0;
    }

}
</style>