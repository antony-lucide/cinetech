<?php
class FilmModel {
    private $apiKey;
    private $baseUrl;
    private $db;
    
    public function __construct($config, $db) {
        $this->apiKey = $config['api']['tmdb_key'];
        $this->baseUrl = $config['api']['tmdb_base_url'];
        $this->db = $db;
    }

    public function searchFilms($query, $page = 1) {
        $url = "{$this->baseUrl}/search/movie?api_key={$this->apiKey}&query=" . urlencode($query) . "&page=" . $page;
        return $this->makeApiRequest($url);
    }

    public function getPopularFilms($page = 1) {
        $url = "{$this->baseUrl}/movie/popular?api_key={$this->apiKey}&page=" . $page;
        return $this->makeApiRequest($url);
    }

    public function getFilmDetails($filmId) {
        $url = "{$this->baseUrl}/movie/{$filmId}?api_key={$this->apiKey}&append_to_response=credits";
        return $this->makeApiRequest($url);
    }

    private function makeApiRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        
        $response = curl_exec($ch);
        
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("API Request failed: $error");
        }
        
        curl_close($ch);
        $data = json_decode($response, true);
        
        if (isset($data['status_code']) && $data['status_code'] !== 200) {
            throw new Exception($data['status_message'] ?? 'Unknown API error');
        }
        
        return $data;
    }

    public function getUserFavorites($userId) {
        $stmt = $this->db->prepare("SELECT film_id FROM favorites WHERE user_id = ?");
        $stmt->execute([$userId]);
        $favorites = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        $films = [];
        foreach ($favorites as $filmId) {
            $films[] = $this->getFilmDetails($filmId);
        }
        
        return $films;
    }
}