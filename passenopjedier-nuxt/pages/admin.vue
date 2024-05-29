<template>
    <h1 v-if="userData.admin">Welcome back administrator</h1>
    <h1 v-if="!userData.admin">...</h1>
    <section v-if="userData.admin" class="actions">
        <section class="users">
            <p class="title">Gebruikers</p>
            <UserAdmin v-for="user in users" :key="user.id" :user="user"
                :name="user.name" :picture="user.profile_picture" :blocked="user.blocked"
            />
        </section>
        <section class="pet-sitting-request-ads">
            <p class="title">Oppas aanvraag ads</p>
            <AdPetSittingRequestAdmin v-for="ad in petSittingRequestAds" :key="ad.id" :ad="ad"
                :id="ad.id" :petName="ad.pet_name" :picture="ad.picture"
            />
        </section>
        <section class="pet-sitter-ads">
            <p class="title">Oppas ads</p>
            <AdPetSitterAdmin v-for="ad in petSitterAds" :key="ad.id" :ad="ad"
                :id="ad.id" :name="ad.name" :picture="findObjectById(petSitterPictureUrls, ad.id).picture"
            />
        </section>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const userData = ref('')
const users = ref([]);
const petSittingRequestAds = ref([]);
const petSitterAds = ref([]);
const petSitterPictureUrls = ref([]);

onMounted(() => {
    getUserData()
    getUsers()
    getPetSittingRequestAds()
    getPetSitterAds()
});

const getUserData = async () => {
    try {
        const user = ref(JSON.parse(localStorage.getItem('user')));
        userData.value = await $fetch(`/api/user/${user.value.id}`, {});

    } catch (error) {
        console.error('Error occurred:', error);
    }
};

const getUsers = async () => {
    try {
        console.log('trying to get some data...');
        const response = await fetch(`/api/admin/userAll`);
        const data = await response.json();
        users.value = data;
        console.log('SUCCES! Users results:', data);
    } catch (error) {
        console.error('Error fetching results:', error);
    }
};

const getPetSittingRequestAds = async () => {
    try {
        console.log('trying to get some data...');
        const response = await fetch(`/api/admin/petSittingRequestAll`);
        const data = await response.json();
        petSittingRequestAds.value = data;
        console.log('SUCCES! Pet Sitting Request results:', data);
    } catch (error) {
        console.error('Error fetching results:', error);
    }
};

const getPetSitterAds = async () => {
    try {
        console.log('trying to get some data...');
        const response = await fetch(`/api/admin/petSitterAll`);
        const data = await response.json();
        petSitterAds.value = data;

        fetchPetSitterFirstPicture()
        console.log('SUCCES! Pet Sitters results:', data);
    } catch (error) {
        console.error('Error fetching results:', error);
    }
};

const petSitterObject = ref({});
const fetchPetSitterFirstPicture = async () => {
    for (let i = 0; i < petSitterAds.value.length; i++) {
        const ad = petSitterAds.value[i];
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
h1 {
    display: flex;
    justify-content: center;
    margin: 50px 0 0 0;
    font-size: 2rem;
    text-align: center;
    line-height: 1.2;
}

.title {
    font-size: 1.4rem;
    font-weight: bold;
}

.actions {
    display: flex;
    justify-content: center;
    gap: 80px;
    margin: 50px 0 0 0;
}

.users, .pet-sitting-request-ads, .pet-sitter-ads {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 50px;
    border: solid 1px var(--letter-color-dark);
}

@media only screen 
and (max-width: 1050px) {
    .actions {
        flex-direction: column;
        align-items: center;
        gap: 40px;
    }
}







</style>