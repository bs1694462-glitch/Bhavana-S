<?php
include 'includes/header.php';

$creators = get_creators();
$films = get_films();
$genres = get_genres();

$featured = null;
foreach($films as $f) {
    if ($f['isFeatured']) {
        $featured = $f;
        break;
    }
}
if (!$featured && count($films) > 0) $featured = $films[0];

// Simplified sorting for PHP conversion
$topRated = $films;
usort($topRated, function($a, $b) { return $b['rating'] <=> $a['rating']; });
$topRated = array_slice($topRated, 0, 6);

$trending = $films;
usort($trending, function($a, $b) { return $b['viewsCount'] <=> $a['viewsCount']; });
$trending = array_slice($trending, 0, 6);

$recentlyAdded = array_reverse($films);
$recentlyAdded = array_slice($recentlyAdded, 0, 6);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-16 pb-20 animate-fadeIn">
    <!-- Hero Spotlight -->
    <?php if ($featured): ?>
    <section class="relative rounded-3xl overflow-hidden border border-cinema-border bg-cinema-card shadow-2xl h-[480px] sm:h-[540px]">
        <img src="<?php echo $featured['backdropUrl']; ?>" class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#07080b] via-[#07080b]/60 to-transparent" />
        <div class="absolute inset-0 bg-gradient-to-r from-[#07080b] via-[#07080b]/80 to-transparent" />
        
        <div class="absolute bottom-0 left-0 right-0 p-8 sm:p-12 max-w-3xl space-y-6">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-cinema-accent text-white shadow-lg">Featured</span>
                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-cinema-surface/80 border border-cinema-border text-cinema-teal uppercase tracking-widest"><?php echo $featured['language']; ?></span>
            </div>
            <h1 class="font-display font-black text-4xl sm:text-6xl text-white tracking-tight leading-none"><?php echo $featured['title']; ?></h1>
            <p class="text-sm text-gray-300 line-clamp-3 leading-relaxed max-w-xl"><?php echo $featured['synopsis']; ?></p>
            <div class="flex items-center gap-4 pt-2">
                <button class="px-8 py-4 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-xs font-black uppercase tracking-widest shadow-2xl flex items-center gap-2 transition-all active:scale-95">
                    <span>Watch Film</span>
                </button>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 1. TOP RATED CINEMA -->
    <section id="top-rated" class="space-y-6">
        <div class="flex items-center justify-between border-l-4 border-cinema-gold pl-4">
            <div class="flex items-center gap-3">
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Top Rated Cinema</h2>
            </div>
            <a href="discover.php" class="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors">Explore All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($topRated as $film): ?>
                <?php render_film_card($film); ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 4. EXPLORE GENRES -->
    <section id="genres" class="space-y-6">
        <div class="flex items-center justify-between border-l-4 border-purple-500 pl-4">
            <div class="flex items-center gap-3">
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Explore Genres</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($genres as $idx => $genre): ?>
                <?php $isLang = isset($genre['isLang']) && $genre['isLang']; ?>
                <a href="discover.php?filter=<?php echo urlencode($genre['name']); ?>" 
                   class="group relative overflow-hidden rounded-2xl border transition-all cursor-pointer shadow-xl p-6 <?php echo $isLang ? 'bg-white border-gray-200 hover:border-cinema-accent' : 'bg-cinema-card border-cinema-border hover:border-cinema-accent'; ?>">
                    <div class="absolute inset-0 bg-gradient-to-br from-cinema-accent/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
                    <h3 class="text-xl font-black transition-colors mb-1 <?php echo $isLang ? 'text-black' : 'text-white group-hover:text-cinema-accent'; ?>"><?php echo $genre['name']; ?></h3>
                    <p class="text-xs uppercase tracking-widest font-bold <?php echo $isLang ? 'text-gray-500' : 'text-cinema-muted'; ?>"><?php echo $genre['desc']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- VISIONARY FILMMAKERS -->
    <section id="filmmakers" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-teal pl-4">
            <div class="flex items-center gap-3">
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Visionary Filmmakers</h2>
            </div>
            <a href="filmmakers.php" class="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors flex items-center gap-1">
                <span>View All</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach($creators as $creator): ?>
                <a href="filmmakers.php?id=<?php echo $creator['id']; ?>" class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden flex flex-col sm:flex-row items-center gap-8">
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
                        <div class="flex items-center justify-center sm:justify-start gap-4">
                            <span class="text-[10px] font-bold text-cinema-teal bg-cinema-teal/5 px-3 py-1.5 rounded-lg border border-cinema-teal/10 uppercase tracking-widest">
                                <?php echo number_format($creator['followersCount'] / 1000, 1); ?>K Followers
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php 
function render_film_card($film) {
    ?>
    <div class="bg-cinema-card rounded-2xl overflow-hidden border border-cinema-border group hover:border-cinema-gold/50 transition-all cursor-pointer flex flex-col shadow-xl relative">
        <div class="relative aspect-[2/3] w-full overflow-hidden bg-cinema-surface">
            <img src="<?php echo $film['posterUrl']; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
            <div class="absolute top-2 right-2 px-2 py-0.5 rounded-md text-[10px] font-black bg-black/70 backdrop-blur-md text-cinema-gold border border-white/10 flex items-center gap-1">
                <?php echo number_format($film['rating'], 1); ?>
            </div>
            <?php if ($film['language'] === 'Kannada'): ?>
                <span class="absolute top-2 left-2 px-2 py-0.5 rounded-md text-[8px] font-black uppercase bg-cinema-accent text-white border border-white/10 shadow-lg z-10">
                    Kannada First
                </span>
            <?php endif; ?>
        </div>
        <div class="p-4 space-y-2 flex-1 flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-xs text-white truncate group-hover:text-cinema-accent transition-colors tracking-tight"><?php echo $film['title']; ?></h3>
                <span class="text-[10px] text-cinema-muted block truncate font-medium"><?php echo $film['director']; ?></span>
            </div>
            <div class="flex items-center justify-between text-[10px] pt-1">
                <span class="<?php echo $film['language'] === 'Kannada' ? 'text-cinema-accent font-black' : 'text-cinema-teal font-bold'; ?> uppercase tracking-widest">
                    <?php echo $film['language']; ?>
                </span>
                <span class="text-cinema-muted font-mono"><?php echo $film['releaseYear']; ?></span>
            </div>
        </div>
    </div>
    <?php
}
include 'includes/footer.php'; 
?>
