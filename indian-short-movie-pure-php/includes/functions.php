<?php
// Core Functions and Data

function get_creators() {
    return [
        [
            'id' => 'c-1',
            'name' => 'Harri Kumar',
            'handle' => '@harrikumar',
            'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=200',
            'bio' => 'National Award-winning director focusing on rural narratives and social realism in Kannada cinema.',
            'followersCount' => 12500
        ],
        [
            'id' => 'c-2',
            'name' => 'Aishwarya Raman',
            'handle' => '@ashraman',
            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=200',
            'bio' => 'Visual storyteller exploring the intersection of modern life and traditional values in Chennai.',
            'followersCount' => 8900
        ]
    ];
}

function get_films() {
    return [
        [
            'id' => 'f-1',
            'title' => 'Kaveri The Hidden Current',
            'director' => 'Harri Kumar',
            'language' => 'Kannada',
            'releaseYear' => 2023,
            'rating' => 4.8,
            'posterUrl' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=300&h=450',
            'backdropUrl' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=1200&h=675',
            'synopsis' => 'A gripping tale of a small village fighting for their water rights against a powerful corporation.',
            'isFeatured' => true,
            'genre' => 'Drama',
            'viewsCount' => 15200,
            'status' => 'published'
        ],
        [
            'id' => 'f-2',
            'title' => 'Neon Nights',
            'director' => 'Aishwarya Raman',
            'language' => 'Tamil',
            'releaseYear' => 2024,
            'rating' => 4.5,
            'posterUrl' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=300&h=450',
            'backdropUrl' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=1200&h=675',
            'synopsis' => 'A visual journey through the bustling streets of Chennai at night, seen through the eyes of a lonely traveler.',
            'isFeatured' => false,
            'genre' => 'Experimental',
            'viewsCount' => 8400,
            'status' => 'published'
        ]
    ];
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
