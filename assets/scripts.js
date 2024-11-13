const API_KEY = 'b1ea66a0baf7bc288a9c02ca4ee33d41';
const BASE_URL = 'https://api.themoviedb.org/3';
const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

document.addEventListener('DOMContentLoaded', () => {
    fetchPopularFilms();
});

async function fetchPopularFilms() {
    try {
        const response = await fetch(`${BASE_URL}/movie/popular?api_key=${API_KEY}&language=fr-FR&page=1`);
        const data = await response.json();
        displayFilms(data.results);
    } catch (error) {
        console.error('Erreur:', error);
    }
}

function displayFilms(films) {
    const filmsList = document.getElementById('films-list');
    
    films.forEach(film => {
        const filmCard = document.createElement('div');
        filmCard.className = 'film-card';
        
        filmCard.innerHTML = `
            <img src="${IMAGE_BASE_URL}${film.poster_path}" alt="${film.title}">
            <div class="film-info">
                <h3>${film.title}</h3>
                <p class="rating">★ ${film.vote_average}/10</p>
                <p class="release-date">${formatDate(film.release_date)}</p>
                <button class="details-btn">Voir les détails</button>
            </div>
        `;

        // Ajouter l'événement click sur le bouton uniquement
        filmCard.querySelector('.details-btn').addEventListener('click', () => showFilmDetails(film));
        filmsList.appendChild(filmCard);
    });
}

function showFilmDetails(film) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>${film.title}</h2>
            <img src="${IMAGE_BASE_URL}${film.poster_path}" alt="${film.title}">
            <div class="film-info">
                <p class="rating">★ ${film.vote_average}/10</p>
                <p class="release">Sortie le : ${formatDate(film.release_date)}</p>
                <p class="overview">${film.overview}</p>
            </div>
        </div>
    `;

    document.body.appendChild(modal);

    modal.querySelector('.close').onclick = () => modal.remove();
    modal.onclick = (e) => {
        if (e.target === modal) modal.remove();
    };
}

function formatDate(dateStr) {
    return new Date(dateStr).toLocaleDateString('fr-FR');
}