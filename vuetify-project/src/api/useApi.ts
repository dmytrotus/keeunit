const apiKey = '59c517d1'; // ideally set these data into .env (can use dotenv)
const moviesDomain = 'http://www.omdbapi.com/'; // ideally set these data into .env

export const fetchData = async (searchString: string) => {
    const response = await fetch(`${moviesDomain}?apikey=${apiKey}&s=${searchString}`);
    const data = await response.json();
    if (data.Response === 'True') {
      return data.Search
    } else {
      return [];
    }
  }