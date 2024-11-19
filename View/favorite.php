<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filmId = $_POST['film_id'];

    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    if (!in_array($filmId, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $filmId;
        echo json_encode(['status' => 'success', 'message' => 'Film ajouté aux favoris']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Film déjà dans les favoris']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Requête invalide']);
}
?>