<template>
  <v-container>
    <span>
      <v-text-field variant="outlined" type="search" label="Search query" v-model="query"></v-text-field>
      <v-data-table :items="items">
        <template v-slot:item.poster="{ item }">
          <v-img :src="item.poster" width="50" height="50"></v-img>
        </template>
        <template v-slot:item.isFavourite="{ item }">
          <v-btn @click="toggleFavourite(item)" v-if="item.isFavourite" variant="outlined">
            Favourite
          </v-btn>
          <v-btn @click="toggleFavourite(item)" v-else variant="outlined">
            Not favorite
          </v-btn>
        </template>
      </v-data-table>
      <v-btn @click="toggleFavouriteStatusOnFirstEntry">Toggle favourite status of first entry</v-btn>
      <div class="mt-4"><b>Favourite movies</b></div>
      {{ fs }}
    </span>
  </v-container>
</template>

<script setup lang="ts">
import { computed, ref, watch} from 'vue'
import { fetchData } from '@/api/useApi';
import { debounce, convertData } from '@/utils/moviesHelpers';

const query = ref<string | boolean>('')
const items = ref<Record<string, any>[]>([
  {
    poster: 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
    title: 'Pulp Fiction',
    year: 1994,
    isFavourite: true,
  },
])

const fs = computed(() => 
  items.value.filter((el) => el.isFavourite === true).map(f=>f.title).join(',')
)

watch(query, debounce( async (newQuery) => {
  const movies = await fetchData(newQuery);
  items.value = convertData(movies);
}, 200));

const toggleFavourite = (item: any): void => {
  items.value = items.value.map(el => {
    if (el.poster !== item.poster) {
      return el;
    }
    return el.isFavourite === true ?
          { ...el, isFavourite: false } :
          { ...el, isFavourite: true } 
    }
  );
}

const toggleFavouriteStatusOnFirstEntry = () => {
  items.value[0].isFavourite = !items.value[0].isFavourite;
}


</script>

<style>
span {
  display: block;
  box-sizing: border-box;
  padding: 5px;
}
</style>
