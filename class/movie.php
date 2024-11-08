<?php
class FilmModel {
    private $apiKey = 'YOUR_TMDB_API_KEY';
    private $baseUrl = 'https://api.themoviedb.org/3';

    public function searchFilms($query) {
        $url = "{$this->baseUrl}/search/movie?api_key={$this->apiKey}&query=" . urlencode($query);
        return $this->makeApiRequest($url);
    }

    public function getFilmDetails($filmId) {
        $url = "{$this->baseUrl}/movie/{$filmId}?api_key={$this->apiKey}&append_to_response=credits";
        return $this->makeApiRequest($url);
    }

    private function makeApiRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function formatFilmData($apiData) {
        return [
            'id' => $apiData['id'],
            'title' => $apiData['title'],
            'release_year' => substr($apiData['release_date'], 0, 4),
            'poster' => "https://image.tmdb.org/t/p/w500" . $apiData['poster_path'],
            'rating' => $apiData['vote_average'],
            'genre' => isset($apiData['genres'][0]) ? $apiData['genres'][0]['name'] : 'N/A',
            'director' => $this->getDirector($apiData['credits']['crew']),
            'overview' => $apiData['overview'],
            'language' => isset($apiData['spoken_languages'][0]) ? $apiData['spoken_languages'][0]['name'] : 'N/A',
            'duration' => $apiData['runtime'],
            'country' => isset($apiData['production_countries'][0]) ? $apiData['production_countries'][0]['name'] : 'N/A'
        ];
    }

    private function getDirector($crew) {
        foreach ($crew as $member) {
            if ($member['job'] === 'Director') {
                return $member['name'];
            }
        }
        return 'N/A';
    }
}
