<template>
    <NuxtLink href="#" class="post">
        <div class="column-1">
            <p class="name">
                naam post
            </p>
            <img class="picture" src="@/public/test-image.jpg">
        </div>
        <div class="column-2">
            <p class="description">lorem larem lurem</p>
        </div>
    </NuxtLink>
</template>

<script setup>
</script>

<style scoped>
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
    max-width: 500px;
    text-wrap: wrap;
}

.name {
    font-size: 1.2rem;
    font-weight: bold;
}

.picture {
    max-width: 200px;
}

@media only screen 
and (max-width: 950px) {
    .post {
        flex-direction: column;
    }

}
</style>