<template>
    <section class="container">
        <section class="search-container">
            <q-input v-model="searchName" filled size="30px" label="Zoek">
                <template v-slot:append>
                    <q-icon name="search" />
                </template>
                <button @click="getAdData" type="submit">Zoek</button>
            </q-input>
        </section>
        <section class="filters">
            <q-btn-toggle v-model="selectedTypes" @click="getAdData" spread no-caps rounded unelevated :options="options"/>
            <div class="pet-sitting-request-exclusive" v-if="selectedTypes === 'op1'">
                <q-input v-model="petSittingRequestFilters.species" filled label="Dier" dense="dense"/>
                <q-input v-model="petSittingRequestFilters.breed" filled label="Ras" dense="dense"/>
                <q-input v-model="petSittingRequestFilters.age" filled label="Leeftijd" type="number" dense="dense" />
                <p>Prijs:</p>
                <q-range v-model="petSittingRequestFilters.priceRange" label :min="0" :max="500"/>
            </div>
            <div class="pet-sitter-exclusive" v-if="selectedTypes === 'op2'">
                <p>Prijs:</p>
                <q-range v-model="petSitterFilters.priceRange" label :min="0" :max="500"/>
            </div>
            <button @click="getAdData" type="submit">Filter</button>
        </section>
        <section class="ads">
            <AdPetSittingRequestSearch v-if="selectedTypes === 'op1'" v-for="ad in ads" :key="ad.id" :ad="ad"
                :id="ad.id" :petName="ad.pet_name" :species="ad.species" :breed="ad.breed" :age="ad.age" 
                :hourlyRate="ad.hourly_rate" :description="ad.description" :picture="ad.picture"
            />
            <AdPetSitterSearch v-if="selectedTypes === 'op2'" v-for="ad in ads" :key="ad.id" :ad="ad"
                :id="ad.id" :name="ad.name" :hourlyRate="ad.hourly_rate" :description="ad.description" 
                :picture="findObjectById(petSitterPictureUrls, ad.id).picture"
            />
        </section>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const options = [
    { label: 'Huisdier', value: 'op1' },
    { label: 'Oppas', value: 'op2' }
]
const selectedTypes = ref('op1')

const searchName = ref('');
const petSittingRequestFilters = ref({
    species: '',
    breed: '',
    age: '',
    priceRange: {
        min: 0,
        max: 500,
    },
});
const petSitterFilters = ref({
    priceRange: {
        min: 0,
        max: 500,
    },
});

const ads = ref([]);
const petSitterPictureUrls = ref([]);


onMounted(() => {
    getAdData()
});

const getAdData = async () => {
    try {
        console.log('trying to get some data...');
        if (selectedTypes.value === 'op1') {
            const petSittingRequestQuery = new URLSearchParams({
                pet_name: searchName.value,
                species: petSittingRequestFilters.value.species,
                breed: petSittingRequestFilters.value.breed,
                age: petSittingRequestFilters.value.age,
                min_rate: petSittingRequestFilters.value.priceRange.min,
                max_rate: petSittingRequestFilters.value.priceRange.max,
            });
            const response = await fetch(`/api/filter/petSittingRequestFilter?${petSittingRequestQuery.toString()}`);
            const data = await response.json();
            ads.value = data;
            console.log('SUCCES! Pet Sitting Request Filtered results:', data);
            
        } else if (selectedTypes.value === 'op2') {
            const petSitterQuery = new URLSearchParams({
                name: searchName.value,
                min_rate: petSitterFilters.value.priceRange.min,
                max_rate: petSitterFilters.value.priceRange.max,
            });
            const response = await fetch(`/api/filter/petSitterFilter?${petSitterQuery.toString()}`);
            const data = await response.json();
            ads.value = data;

            // for (let i = 0; i < ads.value.length; i++) {
            //     const ad = ads.value[i];
            //     console.log("Ad ID:", ad.id);
            //     console.log("Ad Name:", ad.name);
            //     petSitterPictureUrls.value.push(await $fetch(`/api/pet-sitter-pictures/${ad.id}`, {}))
            //     console.log(petSitterPictureUrls.value);
            // }

            fetchPetSitterFirstPicture()

            console.log('SUCCES! Pet Sitter Filtered results:', data);
        }
    } catch (error) {
        console.error('Error fetching filtered results:', error);
    }
};

const petSitterObject = ref({});
const fetchPetSitterFirstPicture = async () => {
    for (let i = 0; i < ads.value.length; i++) {
        const ad = ads.value[i];
        console.log("Ad ID:", ad.id);
        console.log("Ad Name:", ad.name);
        
        try {
            const pictureUrl = await $fetch(`/api/pet-sitter-pictures/${ad.id}`, {});
            petSitterObject.value[ad.id] = pictureUrl;
            petSitterPictureUrls.value.push({ id: ad.id, picture: pictureUrl[0] });
            console.log(petSitterPictureUrls.value);

        } catch (error) {
            console.error(`Error fetching picture for ad ${ad.id}:`, error);
        }
    }
    // console.log('testtt1111 ' + findObjectById(petSitterPictureUrls.value, 3).picture)
};

function findObjectById(arr, id) {
    return arr.find(obj => obj.id === id);
}
</script>

<style scoped>
.container {  
    display: grid; 
    grid-template-columns: 0.7fr 1.3fr 1fr; 
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

.pet-sitter-exclusive {
    display: flex;
    flex-direction: column;
    gap: 10px;
}


@media only screen 
and (max-width: 950px) {
    .container {  
        display: grid;
        justify-content: center;

        grid-template-columns: 1fr 1fr 1fr; 

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