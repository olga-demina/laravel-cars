<template>
  <div class="container">
    <h1>Le nostre auto</h1>
    <CarsList />
  </div>
</template>

<script>
import CarsList from "../components/CarsList.vue";
export default {
    name: "CarsPage",
    components: {
        CarsList
    }
}
</script>

<style>

</style>