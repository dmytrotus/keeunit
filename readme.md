## FrontEnd Part

Context:
This exercise involves developing the initial components of a movie search engine using the Vuetify app. Users should be able to search for movies and mark them as favorites. The UI should include a search input, a results table, and a user-friendly method for marking movies as favorites. Favorite movies should be stored locally, and real data should be fetched from OMDb API using the provided API key (59c517d1), with a constraint of not making API calls more frequently than once every 200ms.

Your Task:
Your task comprises three parts:

Conduct a code review for the code in Implementation.vue. Provide comments in the file as if reviewing code written by a junior developer. Explain any issues and suggest better solutions.

Develop your version of the movie search engine app accessible via "/implementation2" that fulfills all the requirements mentioned in the "context" section. Prioritize good code structure, maintainability, and functionality over fancy design. Feel free to incorporate useful libraries.

Implement the task described in the Laravel project located in the "laravel-project" folder. Refer to the project's readme file for further details.

Details:

For Part 1: Provide code review comments directly in the Implementation.vue file, treating it as if it were written by a junior developer.

For Part 2: Emphasize code quality, structure, and maintainability. Prioritize functionality over design and consider the project's potential for future extensions.

For Part 3: Locate the Laravel project in the "laravel-project" folder and refer to the project's readme file for specific instructions.

Time Allocation:
Allocate 1-2 hours for completing all three parts of the task. Feel free to reach out if you have any questions.

## Laravel Part

Your task is to return real data in this method. Your implementation should focus on being fast, even as the tables get bigger (think 10.000+ users, 10.000+ movies, 1.000.000+ ratings). Movies have multiple genres attached to them. Users also have genres that they have selected to be relevant for them. This method should take the user's search query as a GET parameter and find the first 10 matching movies. For each movie return title in the user's language, release year, the average of all the movie's ratings, and the median of all the movie's ratings.

In addition, movies are only visible to users if the movie is visible, the movie is available in the user's language, the title of the movie in the user's language contains the search query, and the intersection of the movie's genres and the user's genres is bigger than 0. To keep this project simple, we have set up a $userData array that contains the data of the currently logged-in user. Please treat it as being dynamic, e.g. as if it could contain any valid data.

This is the db structure you can expect:
movies:

id
is_visible
created_at
updated_at
movie_translations:
movie_id
language
title
release_year
poster
created_at
updated_at
movie_ratings:
id
movie_id
user_id
rating (this is of type int)
rating_text (this is of type text)
genres:
id
name
movie_genres:
id
movie_id
genre_id
user_genres:
id
user_id
genre_id