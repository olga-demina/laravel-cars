<template>
  <div class="container">
    <p>Trovati {{ totalCars }} veicoli</p>
    <div class="form-group">
      <label for="items_per_page">Elementi per pagina</label>
      <select class="form-select" id="items_per_page" v-model="itemsPerPage" @change="getCars(1)">
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="9">9</option>
        <option value="12">12</option>
      </select>
    </div>
    <div class="row row-cols-3">
      <!-- single car card -->
      <div v-for="car in cars" :key="car.id" class="col">
        <div class="card mb-3">
          <img :src="car.image" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">{{ car.brand }} {{ car.model }}</h5>
            <p>Cilindrata: {{ car.cc }}</p>
            <p>Porte: {{ car.doors }}</p>
          </div>
          <!-- <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div> -->
        </div>
      </div>
      <!-- /Single car card -->
    </div>
    <!-- Pagination -->
    <nav aria-label="...">
      <ul class="pagination">
        <!-- Previos page button -->
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a @click="getCars(currentPage - 1)" class="page-link">Previous</a>
        </li>
        <!-- Numbered pages buttons -->
        <li
          v-for="n in lastPage"
          :key="n"
          class="page-item"
          :class="{ active: currentPage === n }"
        >
          <a class="page-link" @click="getCars(n)">{{ n }}</a>
        </li>

        <!-- Next page button -->
        <li class="page-item" :class="{ disabled: currentPage === lastPage }">
          <a @click="getCars(currentPage + 1)" class="page-link">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "CarsList",
  data() {
    return {
      cars: [],
      currentPage: 1,
      lastPage: 0,
      totalCars: 0,
      itemsPerPage: 6
    };
  },
  created() {
    this.getCars();
  },
  methods: {
    getCars(pageNumber) {
      axios
        .get("/api/cars", {
          params: {
            page: pageNumber,
            items_per_page: this.itemsPerPage
          },
        })
        .then((resp) => {
          this.cars = resp.data.results.data;
          this.currentPage = resp.data.results.current_page;
          this.lastPage = resp.data.results.last_page;
          this.totalCars = resp.data.results.total;
        });
    },
  },
};
</script>

<style>
</style>