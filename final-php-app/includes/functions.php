<?php
session_start();

define('DATA_DIR', __DIR__ . '/../data/');
if (!is_dir(DATA_DIR)) {
    mkdir(DATA_DIR, 0777, true);
}

function get_json_data($filename) {
    $path = DATA_DIR . $filename . '.json';
    if (!file_exists($path)) {
        return [];
    }
    $content = file_get_contents($path);
    return json_decode($content, true) ?: [];
}

function save_json_data($filename, $data) {
    $path = DATA_DIR . $filename . '.json';
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
}

// Films
function get_films($status = null) {
    $films = get_json_data('films');
    if ($status) {
        return array_filter($films, function($f) use ($status) {
            return $f['status'] === $status;
        });
    }
    return $films;
}

function save_film($film) {
    $films = get_films();
    $found = false;
    foreach ($films as &$f) {
        if ($f['id'] === $film['id']) {
            $f = $film;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $films[] = $film;
    }
    save_json_data('films', $films);
}

// Creators
function get_creators() {
    return get_json_data('creators');
}

function save_creator($creator) {
    $creators = get_creators();
    $creators[] = $creator;
    save_json_data('creators', $creators);
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

function require_admin() {
    if (!is_admin()) {
        header("Location: ../admin/index.php");
        exit();
    }
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
