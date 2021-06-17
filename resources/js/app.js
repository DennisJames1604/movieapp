require('./bootstrap');

// Set URLs needed
const MOVIE_API_URL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=c87fad33bcd2b331c71b94e74a7cb524&page=1'
const MOVIE_IMG_PATH = 'https://image.tmdb.org/t/p/w1280';
const MOVIE_SEARCH_API = 'https://api.themoviedb.org/3/search/movie?api_key=c87fad33bcd2b331c71b94e74a7cb524&query="';

// Get form and search data
const form = document.getElementById('form')
const search = document.getElementById('search')

const mainContent = document.getElementById('movies_container');

fetchAllMovies(MOVIE_API_URL);

// Call async to allow multi way communication
async function fetchAllMovies(url) {
    const movieResult = await fetch(url);
    const movieData = await movieResult.json();

    loadMoviesToDOM(movieData.results);
}

function loadMoviesToDOM(movies) {
    mainContent.innerHTML = '';

    if (movies.length !== 0) {
        movies.forEach((movie) => {
            // Destruct data, let us pull all data out of the movie object
            // This way we can use the names inside the destructor instead of having to call eg. movie.title
            const { title, poster_path, vote_average, overview } = movie;

            const movieEl = document.createElement('div');

            // (``) Template literals - used for multi line strings and interpolation
            // Interpolation is used to embedded an expression into a string
            movieEl.innerHTML = `
                <div class="movie">
                    <img src="${MOVIE_IMG_PATH + poster_path}" alt="${title}">

                    <div class="movie_info">
                        <h3>${title}</h3>
                        <span class="${movieRatingClass(vote_average)}">${vote_average}</span>
                    </div>

                    <div class="description">
                        <h3>${title} - description</h3>
                       ${overview}
                    </div>
                </div>
            `

            mainContent.appendChild(movieEl);
        });
    } else {
        const movieEl = document.createElement('div');

        movieEl.innerHTML = `
            <div class="no_movie">
                No movies found. Please try another movie
            </div>
        `

        mainContent.appendChild(movieEl);
    }
}

// Return class for movie rating
function movieRatingClass(vote) {
    if (vote > 8) {
        return 'green';
    } else if(vote >= 5) {
        return 'orange';
    } else {
        return 'red';
    }
}

// If form not null
if(form) {
    // Add an evenlistener for the submit and declare an event
    form.addEventListener('submit', (e) => {
        // Prevent default (reload)
        e.preventDefault();

        // If the search input != null and is not an empty string
        if (search.value && search.value !== '') {
            // Fetch movies but only the ones matching our query
            fetchAllMovies(MOVIE_SEARCH_API + search.value);

            // Set the search input to empty
            search.value = '';
        } else {
            console.log('empty search');
        }
    });
}
