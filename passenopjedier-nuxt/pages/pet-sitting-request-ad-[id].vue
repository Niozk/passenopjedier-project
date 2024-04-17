<template>
    <section class="container">
        <div class="ad-head">
            <h1 class="name">Naam</h1>
            <img class="picture" src="@/public/test-image.jpg">
        </div>
        <div class="ad-body">
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Dier</h2>
                    <p>yo</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Ras</h2>
                    <p>yo</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Leeftijd</h2>
                    <p>yo</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Prijs per uur</h2>
                    <p>yo</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Start datum </h2>
                    <p>yo</p>
                </div>
                <div class="ad-detail-text">
                    <h2>Eind datum</h2>
                    <p>yo</p>
                </div>
            </div>
            <div class="ad-detail">
                <div class="ad-detail-text">
                    <h2>Beschrijving</h2>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Consequuntur dolorum officia alias quibusdam explicabo impedit exercitationem, 
                        et voluptatem minima sit deleniti optio obcaecati. Mollitia quos ipsa, quia a 
                        corporis iure.
                    </p>
                </div>
            </div>
            <div class="accept">
                <button>Accepteer</button>
            </div>
        </div>
    </section>
</template>

<script setup>
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    gap: 40px;
    margin: 50px 0 0 0;
    padding: 0 100px;
}

.ad-head {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.name {
    font-size: 2rem;
}

.picture {
    max-width: 400px;
}

.ad-body {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 900px;
    border: solid 1px black;
}

.ad-detail {
    display: flex;
    gap: 80px;
}

.ad-detail h2 {
    font-size: 1.2rem;
    font-weight: bold;
}

.ad-detail-text {
    width: 450px;
}

.accept {
    display: flex;
    margin: 0 auto;
    background-color: var(--secondary-color);
}


@media only screen 
and (max-width: 800px) {
    .container {
        display: flex;
        flex-direction: column;
        gap: 40px;
        margin: 50px 0 0 0;
        padding: 0 50px;
    }

    .ad-body {
        gap: 30px;
    }

    .ad-detail {
        flex-direction: column;
        gap: 20px;
    }

    .ad-detail-text {
        width: unset;
    }
}

</style>