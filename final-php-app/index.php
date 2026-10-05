<?php
include 'includes/header.php';
$all_films = get_films('approved');
$creators = get_creators();
$genres = get_genres();

// Sort films for different sections
$top_rated = $all_films;
usort($top_rated, fn($a, $b) => $b['rating'] <=> $a['rating']);
$top_rated = array_slice($top_rated, 0, 6);

$trending = $all_films;
usort($trending, fn($a, $b) => $b['viewsCount'] <=> $a['viewsCount']);
$trending = array_slice($trending, 0, 6);

$recently_added = array_reverse($all_films);
$recently_added = array_slice($recently_added, 0, 6);

$featured = null;
foreach($all_films as $f) {
    if (isset($f['isFeatured']) && $f['isFeatured']) {
        $featured = $f;
        break;
    }
}
if (!$featured && !empty($all_films)) {
    $featured = $all_films[0];
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-20 pb-20 animate-fadeIn">
    
    <!-- Hero Spotlight Section -->
    <?php if ($featured): ?>
    <section class="relative rounded-[2.5rem] overflow-hidden border border-white/5 bg-cinema-card shadow-2xl h-[480px] sm:h-[540px]">
        <img src="<?php echo $featured['backdropUrl'] ?? $featured['posterUrl']; ?>" class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#07080b] via-[#07080b]/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#07080b] via-[#07080b]/80 to-transparent"></div>
        
        <div class="absolute bottom-0 left-0 right-0 p-8 sm:p-12 max-w-3xl space-y-6">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-[#f84464] text-white shadow-lg">Featured</span>
                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-[#0c0d12]/80 border border-white/5 text-cinema-teal uppercase tracking-widest"><?php echo $featured['language']; ?></span>
            </div>
            <h1 class="font-black text-4xl sm:text-6xl text-white tracking-tight leading-none uppercase"><?php echo $featured['title']; ?></h1>
            <p class="text-sm text-gray-300 line-clamp-3 leading-relaxed max-w-xl font-medium"><?php echo $featured['synopsis']; ?></p>
            <div class="flex items-center gap-4 pt-2">
                <button class="px-8 py-4 rounded-2xl bg-[#f84464] hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-widest shadow-2xl flex items-center gap-2 transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="m7 4 12 8-12 8V4z"/></svg>
                    <span>Watch Film</span>
                </button>
                <button class="px-6 py-4 rounded-2xl bg-[#0c0d12]/90 hover:bg-[#0c0d12] text-white text-xs font-black uppercase tracking-widest border border-white/5 flex items-center gap-2 transition-all backdrop-blur-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    <span>Details</span>
                </button>
            </div>
        </div>
    </section>
    <?php else: ?>
    <!-- Default Hero if no films exist -->
    <section class="relative rounded-[2.5rem] overflow-hidden border border-white/5 bg-cinema-card shadow-2xl h-[450px] sm:h-[550px] flex items-center justify-center text-center p-8">
        <div class="absolute inset-0 bg-gradient-to-t from-[#07080b] via-transparent to-transparent opacity-60"></div>
        <div class="relative z-10 space-y-8 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cinema-accent/10 border border-cinema-accent/20 text-[#f84464] text-[10px] font-black uppercase tracking-[0.2em]">
                <span class="w-1.5 h-1.5 rounded-full bg-[#f84464] animate-pulse"></span>
                India's Premiere Short Film Catalog
            </div>
            <h1 class="font-black text-5xl sm:text-7xl text-white tracking-tighter uppercase leading-[0.9]">
                Stories that <br><span class="text-[#f84464]">Move India</span>
            </h1>
            <p class="text-sm sm:text-base text-cinema-muted leading-relaxed font-medium max-w-xl mx-auto">
                Discover the most compelling independent short films and documentaries curated from every corner of the Indian subcontinent.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a href="discover.php" class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-[#f84464] hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-[0.2em] transition-all shadow-2xl shadow-red-500/20 active:scale-95">Explore Catalog</a>
                <a href="submit.php" class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 text-white text-xs font-black uppercase tracking-[0.2em] transition-all active:scale-95">Submit Your Film</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- TOP RATED CINEMA -->
    <?php if (!empty($top_rated)): ?>
    <section id="top-rated" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-gold pl-6">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <h2 class="font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Top Rated Cinema</h2>
            </div>
            <a href="discover.php" class="text-[10px] font-black text-cinema-teal hover:text-white uppercase tracking-widest transition-colors">Explore All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($top_rated as $film): ?>
                <?php include 'includes/film_card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- TRENDING NOW -->
    <?php if (!empty($trending)): ?>
    <section id="trending" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-accent pl-6">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f84464" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                <h2 class="font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Trending Now</h2>
            </div>
            <a href="discover.php" class="text-[10px] font-black text-cinema-teal hover:text-white uppercase tracking-widest transition-colors">Explore All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($trending as $film): ?>
                <?php include 'includes/film_card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- RECENTLY ADDED STORIES -->
    <?php if (!empty($recently_added)): ?>
    <section id="recent" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-teal pl-6">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <h2 class="font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Recently Added Stories</h2>
            </div>
            <a href="discover.php" class="text-[10px] font-black text-cinema-teal hover:text-white uppercase tracking-widest transition-colors">Explore All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($recently_added as $film): ?>
                <?php include 'includes/film_card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- EXPLORE GENRES -->
    <section id="genres" class="space-y-10">
        <div class="flex items-center justify-between border-l-4 border-[#8b5cf6] pl-6">
            <div class="space-y-1">
                <h2 class="font-black text-3xl sm:text-4xl text-white tracking-tight uppercase">Explore Genres</h2>
                <p class="text-[10px] text-cinema-muted font-bold uppercase tracking-[0.3em]">Browse by category & regional language</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($genres as $genre): ?>
                <?php $isLang = isset($genre['isLang']) && $genre['isLang']; ?>
                <a href="discover.php?filter=<?php echo urlencode($genre['name']); ?>" 
                   class="group relative overflow-hidden rounded-3xl border transition-all cursor-pointer shadow-xl p-8 <?php echo $isLang ? 'bg-white border-gray-200 hover:border-[#f84464]' : 'bg-cinema-card border-white/5 hover:border-[#f84464]'; ?>">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#f84464]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <h3 class="text-2xl font-black transition-colors mb-2 <?php echo $isLang ? 'text-black' : 'text-white group-hover:text-[#f84464]'; ?>"><?php echo $genre['name']; ?></h3>
                    <p class="text-[10px] uppercase tracking-[0.2em] font-black <?php echo $isLang ? 'text-gray-400' : 'text-cinema-muted'; ?>"><?php echo $genre['desc']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- VISIONARY FILMMAKERS -->
    <section id="filmmakers" class="space-y-10">
        <div class="flex items-center justify-between border-l-4 border-[#2dd4bf] pl-6">
            <div class="space-y-1">
                <h2 class="font-black text-3xl sm:text-4xl text-white tracking-tight uppercase">Visionary Filmmakers</h2>
                <p class="text-[10px] text-cinema-muted font-bold uppercase tracking-[0.3em]">The minds behind compelling independent stories</p>
            </div>
            <a href="filmmakers.php" class="text-[10px] font-black text-cinema-teal hover:text-white uppercase tracking-[0.2em] transition-all underline decoration-[#2dd4bf]/30 underline-offset-8">View All</a>
        </div>
        
        <?php if (empty($creators)): ?>
        <div class="py-24 text-center bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-[#2dd4bf]/5 via-transparent to-transparent"></div>
            <div class="relative z-10 space-y-6">
                <div class="w-20 h-20 rounded-[2rem] bg-cinema-teal/10 border border-cinema-teal/20 flex items-center justify-center text-cinema-teal mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
                </div>
                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Directory Under Curation</h2>
                <p class="text-cinema-muted max-w-sm mx-auto font-medium text-xs leading-relaxed">Our directory is currently being updated with real industry professionals. Check back soon to discover visionary creators.</p>
                <div class="pt-4">
                    <a href="submit.php" class="px-8 py-3.5 rounded-xl bg-white/5 border border-white/10 text-white text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition-all">Are you a filmmaker? Join Us</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach(array_slice($creators, 0, 2) as $creator): ?>
            <div class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden flex flex-col sm:flex-row items-center gap-8">
                <div class="relative shrink-0">
                    <div class="w-32 h-32 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                        <img src="<?php echo $creator['avatar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                    </div>
                </div>
                <div class="space-y-4 text-center sm:text-left">
                    <div>
                        <h3 class="text-2xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight"><?php echo $creator['name']; ?></h3>
                        <p class="text-xs text-cinema-muted font-black uppercase tracking-widest"><?php echo $creator['handle']; ?></p>
                    </div>
                    <p class="text-sm text-cinema-muted line-clamp-2 leading-relaxed font-medium"><?php echo $creator['bio']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
