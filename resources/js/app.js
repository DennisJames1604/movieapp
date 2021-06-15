require('./bootstrap');

// Set URLs needed
const MOVIE_API_URL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=c87fad33bcd2b331c71b94e74a7cb524&page=1'
const MOVIE_IMG_PATH = 'https://image.tmdb.org/t/p/w1280';
const MOVIE_SEARCH_API = 'https://api.themoviedb.org/3/search/movie?api_key=c87fad33bcd2b331c71b94e74a7cb524&query="';

// Get form and search data
const form = document.getElementById('form')
const search = document.getElementById('search')

// Fetch Movies
fetchAllMovies(MOVIE_API_URL);

// Call async to allow multi way communication
async function fetchAllMovies(url) {
    const movieResult = await fetch(url);
    const movieData = await movieResult.json();

    // TODO: Load movies into the DOM instead of hardcoded ones
    console.log(movieData.results);
}

// If form not != null
if(form) {
    // Add an evenlistener for the submit and declare an event
    form.addEventListener('submit', (e) => {
        // Prevent default (reload)
        e.preventDefault();

        // If the search input != null and is not an empty string
        if (search.value && search.value !== '') {
            // Fetch movies but only the ones matching our query
            fetchAllMovies(MOVIE_SEARCH_API + searchQuery);

            // Set the search input to empty
            search.value = '';
        } else {
            // Some error
            console.log('No movies found');
        }
    });
}
