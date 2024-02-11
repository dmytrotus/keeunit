<template>
  <v-container>
    <router-link to="/">back</router-link>
    <h1>Context</h1>
    <p>This small exercise is about building the first parts of a movie search engine. The vuetify app should allow users to search for movies and mark them as favourites.</p>
    <p>The UI should consist of a search input, a results table and an intuitive way to mark movies as favourites.</p>
    <p>Favourite movies should be persisted to local storage.</p>
    <p>The app should load real data from <a href="https://www.omdbapi.com/" target="_blank">https://www.omdbapi.com</a>. The API key you can use is: 59c517d1</p>
    <p>You should not call the API more than once every 200ms.</p>
    <h1>Your task</h1>
    <p>Your task consists of 3 parts:</p>
    <ol>
      <li>Do a short code review for the code in Implementation.vue</li>
      <li>Create your own version of the movie search engine app (should be available via <router-link to="/implementation2">/implementation2</router-link>) that fulfills all of the requirements mentioned in the "context" section.</li>
      <li>Implement the task described in the Laravel project</li>
    </ol>
    <h2>Details</h2>
    <h3>For 1.</h3>
    <p>We do not have a git repository set up, so please just add your code review comments as comments in the file Implementation.vue. Treat the file as some code that a junior developer wrote, e.g. you should explain your comments in a way that helps them understand why some of the code might not be ideal and what a better solution would look like.</p>
    <h3>For 2.</h3>
    <p>You do not need to focus on a fancy design. We're mostly looking for good code / code structure / maintainability. Write your code in the same way you would when working on a big project that is going to be extended further over the next years. Feel free to add any libraries you deem useful.</p>
    <h3>For 3.</h3>
    <p>Find the Laravel project in the folder `laravel-project`. You will find more details in that project's readme file.</p>
    <h1>How much time to spend on this task</h1>
    <p>You should aim to spend 1-2 hours to finish the 3 parts. If you have any questions, feel free to contact me anytime.</p>
  </v-container>
</template>
<script setup lang="ts">
</script>
