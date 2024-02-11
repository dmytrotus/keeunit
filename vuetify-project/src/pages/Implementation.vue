<template>
  <v-container>
    <span>
      <v-text-field variant="outlined" type="search" label="Search query" v-model="query"></v-text-field>
      <v-data-table :items="items"></v-data-table>
      <v-btn @click="fs.find(f=>f.title===items[0].title).fav = !fs.find(f=>f.title===items[0].title).fav">Toggle favourite status of first entry</v-btn>
      <div class="mt-4"><b>Favourite movies</b></div>
      {{ fs.filter(f=>f.fav).map(f=>f.title).join(',')}}
    </span>
  </v-container>
</template>

<script setup lang="ts">
import {reactive, ref} from 'vue'

const query = ref<string | boolean>('')
const items = ref<Record<string, any>[]>([
  {
    poster: 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
    title: 'Pulp Fiction',
    year: 1994,
    isFavourite: true,
  },
])

const fs = reactive([{title: 'Pulp Fiction', fav: true}, {title: 'Twilight Saga', fav: false}])
</script>

<style>
span {
  display: block;
  box-sizing: border-box;
  padding: 5px;
}
</style>
