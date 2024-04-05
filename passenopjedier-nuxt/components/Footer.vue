<template>
    <footer>
        <div class="content">
            <p>Sardar © 2024</p>
            <ul>
                <li v-for="item in linkList"><NuxtLink :to="item.href">{{ item.text }}</NuxtLink></li>
            </ul>
        </div>
    </footer>
</template>

<script setup>
import { ref } from 'vue';

const linkList = ref([
    {text: 'Github', href: 'https://github.com/Niozk'}
])
</script>

<style scoped>
footer {
    padding: 120px 0 200px 150px;
    white-space: nowrap;
    background-color: var(--primary-color);
}

.content {
    display: flex;
    flex-direction: column;
}

ul {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

p {
    font-size: 1.2rem;
    font-weight: bold;
    color: var(--letter-color-light);
}

a {
    font-size: 1rem;
    color: var(--letter-color-light);
}

@media only screen 
and (max-width: 700px) {
    footer {
        display: flex;
        justify-content: center;
        padding: 120px 0 200px 0;
    }
}

</style>