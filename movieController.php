<?php
require_once 'FilmModel.php';

class FilmController {
    private $model;

    public function __construct() {
        $this->model = new FilmModel();
    }

    public function index() {
        $searchResults = $this->model->searchFilms('Avengers');
        $films = [];
        foreach ($searchResults['results'] as $result) {
            $filmDetails = $this->model->getFilmDetails($result['id']);
            $films[] = $this->model->formatFilmData($filmDetails);
        }
        
        require 'views/film_list.php';
    }

    public function details($filmId) {
        $filmDetails = $this->model->getFilmDetails($filmId);
        $film = $this->model->formatFilmData($filmDetails);
        
        require 'details.php';
    }
}
