<template>
    <h1>Welcome back administrator</h1>
    <section class="actions">
        <section class="users">
            <p>user</p>
            <p>user</p>
            <p>user</p>
        </section>
        <section class="ads">
            <p>ad</p>
            <p>ad</p>
            <p>ad</p>
        </section>
    </section>
</template>

<script setup>

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

.actions {
    display: flex;
    justify-content: center;
    gap: 80px;
    margin: 50px 0 0 0;
}

.users {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 50px;
    border: solid 1px var(--letter-color-dark);
}

.ads {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 50px;
    border: solid 1px var(--letter-color-dark);
}

@media only screen 
and (max-width: 950px) {
    .actions {
        flex-direction: column;
        align-items: center;
        gap: 40px;
    }
}







</style>