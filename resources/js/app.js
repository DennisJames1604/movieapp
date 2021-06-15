require('./bootstrap');

const API_URL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=c87fad33bcd2b331c71b94e74a7cb524&page=1'
const IMG_PATH = 'https://image.tmdb.org/t/p/w1280';
const SEARCH_API = 'https://api.themoviedb.org/3/search/movie?api_key=c87fad33bcd2b331c71b94e74a7cb524&query="';

const form = document.getElementById('form')
const search = document.getElementById('search')

// Get initial movies
getMovies(API_URL);

async function getMovies(url) {
    const res = await fetch(url);
    const data = await res.json();

    console.log(data.results);
}

if(form) {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const searchQuery = search.value

        if (searchQuery && searchQuery !== '') {
            getMovies(SEARCH_API + searchQuery);

            search.value = '';
        } else {
            console.log('No movies found');
        }
    });
}
