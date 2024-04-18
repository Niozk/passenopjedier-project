<template>
    <NuxtLink href="#" class="post">
        <p class="name">
            naam post
        </p>
        <img class="picture" src="@/public/test-image.jpg">
    </NuxtLink>
</template>

<script setup>
</script>

<style scoped>
.post {
    display: flex;
    flex-direction: column;
}

.name {
    font-size: 1.2rem;
    font-weight: bold;
}

.picture {
    max-width: 200px;
}
</style>