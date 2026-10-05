<?php
include 'includes/header.php';
$films = get_films();
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$filteredFilms = [];
if ($filter) {
    foreach($films as $f) {
        if (strpos(strtolower($f['title']), strtolower($filter)) !== false || 
            strpos(strtolower($f['director']), strtolower($filter)) !== false ||
            strpos(strtolower($f['language']), strtolower($filter)) !== false ||
            strpos(strtolower($f['genre']), strtolower($filter)) !== false) {
            $filteredFilms[] = $f;
        }
    }
} else {
    $filteredFilms = $films;
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-3">
            <h1 class="font-black text-4xl text-white tracking-tight uppercase leading-none">Film Catalog</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Discover independent stories across India</p>
        </div>
        <div class="relative max-w-sm w-full">
            <form action="discover.php" method="GET">
                <input type="text" name="filter" value="<?php echo htmlspecialchars($filter); ?>" placeholder="Search by title, director or genre..." class="w-full bg-cinema-card border border-white/10 rounded-2xl px-5 py-3 text-sm focus:outline-none focus:border-cinema-accent transition-all">
            </form>
        </div>
    </div>

    <?php if (empty($filteredFilms)): ?>
        <div class="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
            <div class="w-20 h-20 rounded-[2rem] bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-cinema-accent mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>
            </div>
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">No Films Found</h2>
            <p class="text-cinema-muted max-w-xs mx-auto font-medium">Our catalog is currently being updated with real independent content. Check back soon!</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($filteredFilms as $film): ?>
                <!-- Film Card Logic here -->
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
