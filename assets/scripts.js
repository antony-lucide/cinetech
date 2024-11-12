const API_KEY = 'b1ea66a0baf7bc288a9c02ca4ee33d41';
const BASE_URL = 'https://api.themoviedb.org/3';
const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

document.addEventListener('DOMContentLoaded', () => {
    fetchPopularFilms();
});

async function fetchPopularFilms() {
    try {
        const response = await fetch(`${BASE_URL}/movie/popular?api_key=${API_KEY}&language=en-US&page=1`);
        const data = await response.json();
        displayFilms(data.results);
    } catch (error) {
        console.error('Error fetching popular films:', error);
    }
}

function displayFilms(films) {
    const filmsList = document.getElementById('films-list');
    filmsList.innerHTML = '<h2>Now Showing</h2>'; // Reset and add title

    films.forEach(film => {
        const filmCard = createFilmCard(film);
        filmsList.appendChild(filmCard);
    });
}

function createFilmCard(film) {
    const card = document.createElement('div');
    card.className = 'film-card';
    card.dataset.id = film.id;

    card.innerHTML = `
        <img src="${IMAGE_BASE_URL}${film.poster_path}" alt="${film.title} Poster">
        <h3>${film.title}</h3>
        <p>Rating: ${film.vote_average}/10</p>
        <p>Release Date: ${film.release_date}</p>
        <button class="view-details">View Details</button>
    `;

    card.querySelector('.view-details').addEventListener('click', () => fetchFilmDetails(film.id));

    return card;
}

async function fetchFilmDetails(filmId) {
    try {
        const response = await fetch(`${BASE_URL}/movie/${filmId}?api_key=${API_KEY}&language=en-US`);
        const film = await response.json();
        displayFilmDetails(film);
    } catch (error) {
        console.error('Error fetching film details:', error);
    }
}

function displayFilmDetails(film) {
    // Create a modal or update a details section with the film information
    const detailsHTML = `
        <h2>${film.title}</h2>
        <img src="${IMAGE_BASE_URL}${film.poster_path}" alt="${film.title} Poster">
        <p>Rating: ${film.vote_average}/10</p>
        <p>Release Date: ${film.release_date}</p>
        <p>Genre: ${film.genres.map(genre => genre.name).join(', ')}</p>
        <p>Overview: ${film.overview}</p>
        <p>Runtime: ${film.runtime} minutes</p>
    `;

   
    alert(detailsHTML);
}
