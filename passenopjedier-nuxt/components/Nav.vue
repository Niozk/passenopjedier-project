<template>
    <div class="nav-class">
        <nav>
            <ul class="nav-list-1">
                <li class="logo"><NuxtLink to="/"><img src="../public/logo-light.png" alt="Logo of site"></NuxtLink></li>
            </ul>
            <ul class="nav-list-2" v-if="store.isNavVisible">
                <li v-for="item in navList2Items" :key="item"><NuxtLink :to="item.href">{{ item.text }}</NuxtLink></li>
            </ul>
            <ul class="nav-list-3" v-if="store.isNavVisible">
                <li><NuxtLink class="place-ad-button fa-solid fa-thumbtack" :to="navList2Items[1].href"></NuxtLink></li>
                <li><NuxtLink :to="accountHref.href"><q-avatar size="60px" style="border: 1px solid var(--secondary-color)"><img src="../public/test-image.jpg"></q-avatar></NuxtLink></li>
            </ul>
            <div class="nav-list-4" v-if="!store.isNavVisible">
                <NuxtLink :to="accountHref.href"><q-avatar size="60px" style="border: 1px solid var(--secondary-color)"><img src="../public/test-image.jpg"></q-avatar></NuxtLink>
                <button class="open-button fa-solid fa-bars" style="color: #ffffff;" id="open-button" @click="openSidemenu()"></button>
            </div>
        </nav>
    </div>
    <aside id="sidemenu">
        <button class="close-button" @click="closeSidemenu()">&times;</button>
        <ul>
            <li v-for="item in navList2Items" :key="item"><NuxtLink :to="item.href">{{ item.text }}</NuxtLink></li>
        </ul>
    </aside>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useStore } from '@/stores/store.js'

const store = useStore();

const navList2Items = ref([
    {text: 'Home', href: '/'},
    {text: 'Plaats Advertentie', href: '/place-ad'},
    {text: 'Zoek', href: '/search'},
    {text: 'Login', href: '/login'} // register gaat vanaf login page
    // voeg toe admin page die alleen gezien kan worden met admin powers (via boolean)
])

const accountHref = ref({
    href: 'account-[]'
})

onMounted(() => {
    closeSidemenuOnClick();
});

function openSidemenu() {
    const sidemenu = document.getElementById("sidemenu");
    sidemenu.style.width = "285px";
    sidemenu.style.boxShadow = "0 3px 10px rgb(0 0 0 / 0.2)";
    sidemenu.style.opacity = "1";
}

function closeSidemenu() {
    const sidemenu = document.getElementById("sidemenu");
    sidemenu.style.width = "0";
    sidemenu.style.opacity = "0";

    setTimeout(() => {
        sidemenu.style.boxShadow = "0";
        document.body.style.marginRight = "0";
    }, 500);
}

function closeSidemenuOnClick() {
    document.addEventListener("click", function(event) {
        const sidemenu = document.getElementById("sidemenu");
        const openBtn = document.getElementById("open-button");
        
        if (sidemenu && openBtn && !sidemenu.contains(event.target) && !openBtn.contains(event.target)) {
            closeSidemenu();
        }
    })
}

</script>

<style scoped>
nav {
    display: flex;
    justify-content: space-between;
    gap: 75px; 
    padding: 10px 50px 10px 100px;
    white-space: nowrap;
}

.nav-list-4 {
    justify-self: flex-end;
}

nav ul {
    display: flex;
    align-items: center;
    gap: 2vw;
}

nav a {
    color: var(--letter-color-light);
}

.nav-class {
    position: sticky;
    top: 0;
    z-index: 10;
    background-color: var(--primary-color);
    transition: 0.6s;
}

.logo img {
    width: 65px;
}

.nav-list-2 {
    padding-left: 10vw;
}

.nav-list-2 li a {
    font-size: 1.2rem;
}

.place-ad-button {
    padding: 10px 25px;
    font-size: 1.4rem;
    background-color: var(--letter-color-light);
    color: var(--letter-color-dark);
    border: 2px solid var(--letter-color-light);
    border-radius: 10px;
    transition: 0.3s ease-out;
    cursor: pointer;
}

.place-ad-button:hover {
    background-color: var(--primary-color);
    color: var(--letter-color-light);
}

.open-button {
    justify-self: flex-end;
    margin: 20px 40px;
    padding: 0;
    font-size: 1.5rem;
    color: var(--letter-color-dark)
}

@media only screen 
and (max-width: 950px) {
    nav {
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        grid-template-rows: 1fr; 
        gap: 0; 
        padding: 25px 0 15px 0;
    }

    .nav-list-1 {
        margin: 15px 40px;
    }

    .logo img {
        width: 50px;
    }
}

aside {
    display: flex;
    flex-direction: column; 
    position: fixed;
    z-index: 15;
    top: 0;
    right: 0;
    width: 0;
    height: 100%;
    overflow-x: hidden;
    background-color: var(--letter-color-light);
    font-size: 1.2rem;
    opacity: 0;
    transition: 1s;
}

.close-button {
    align-self: flex-end;
    margin: 20px;
    padding: 0 10px;
    font-size: 2.4rem;
    color: var(--letter-color-dark);
}

.close-button:hover {
    background-color: #0000001a;
    transition: 0.7s;
}

aside ul {
    display: inline-block;
    margin-right: 30px;
}

aside li {
    margin: 10px 15px;
    padding: 8px 15px;
    transition: 0.7s;
}

aside li:hover {
    background-color: #0000001a;
}

@media only screen 
and (max-width: 450px) {
    aside {
        max-width: 70vw;
    }
}

.nav-list-2 li a {
    position: relative;
}

.nav-list-2 li a:hover {
    color: #d1d1d2;
    transition: 0.6s ease;
}

.nav-list-2 li a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 100%;
    height: 1px;
    background-color: #d1d1d2;
    transform: scaleX(0);
    transition: transform 0.3s ease;
    transform-origin: bottom right;
}

.nav-list-2 li a:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}
</style>