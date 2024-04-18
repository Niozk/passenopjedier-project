<template>
  <section class="intro">
    <h1>Welkom bij passenopjedier.nl!</h1>
    <p>Vind gemakkelijk een oppas voor jouw huisdier</p>
  </section>
  <section class="top-ads">
    <AdIndex />
    <AdIndex />
    <!-- HARD CODE HIER PAAR TOP POSTS -->
  </section>
</template>

<script setup>

</script>

<style scoped>
.intro {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 40px;
  margin: 50px 0 0 0;
  padding: 0 20px 0 20px;
  text-align: center;
  color: var(--letter-color-dark);
}

.intro h1 {
  font-size: 4rem;
  line-height: 1.2;
}

.intro p {
  font-size: 1.6rem;
}

.top-ads {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 40px;
  margin: 80px auto 0 auto;
  padding: 20px;
  max-width: 500px;
  border: 1px solid var(--letter-color-dark)
}

@media only screen 
and (max-width: 950px) {
  .intro h1 {
    font-size: 2.4rem;
  }

  .intro p {
    font-size: 1.2rem;
  }
}

</style>