<?php
session_start();

function get_creators() {
    // Requirements: Remove all dummy content (Harri/Aishwarya). 
    // User asked to keep 2 real filmmakers, but none are found in current project state.
    // Returning empty array for now.
    return [];
}

function get_films() {
    // Requirements: Remove mock content.
    return [];
}

function get_genres() {
    return [
        ['name' => 'Drama', 'desc' => 'Short Films & Docs'],
        ['name' => 'Thriller', 'desc' => 'Short Films & Docs'],
        ['name' => 'Mystery', 'desc' => 'Short Films & Docs'],
        ['name' => 'Comedy', 'desc' => 'Short Films & Docs'],
        ['name' => 'Folk Folklore', 'desc' => 'Short Films & Docs'],
        ['name' => 'Documentary', 'desc' => 'Short Films & Docs'],
        ['name' => 'Romance', 'desc' => 'Short Films & Docs'],
        ['name' => 'Action', 'desc' => 'Short Films & Docs'],
        ['name' => 'Indie Experimental', 'desc' => 'Short Films & Docs'],
        ['name' => 'Kannada (ಕನ್ನಡ)', 'desc' => 'Regional Excellence', 'isLang' => true],
        ['name' => 'Hindi (हिन्दी)', 'desc' => 'Bollywood Heart', 'isLang' => true],
        ['name' => 'Tamil (தமிழ்)', 'desc' => 'Kollywood Vision', 'isLang' => true],
        ['name' => 'Telugu (తెలుగు)', 'desc' => 'Tollywood Power', 'isLang' => true],
        ['name' => 'Malayalam (മലയാളം)', 'desc' => 'Realistic Stories', 'isLang' => true],
        ['name' => 'Gujarati (ગુજરાતી)', 'desc' => 'Urban Narratives', 'isLang' => true]
    ];
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN';
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
