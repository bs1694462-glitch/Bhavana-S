<?php
include 'includes/header.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$films = get_films();

if ($filter) {
    $films = array_filter($films, function($f) use ($filter) {
        return stripos($f['title'], $filter) !== false || 
               stripos($f['genre'], $filter) !== false || 
               stripos($f['language'], $filter) !== false;
    });
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fadeIn">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight uppercase">Film Catalog</h1>
            <p class="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Explore independent Indian cinema</p>
        </div>
        <form action="discover.php" method="GET" class="relative max-w-sm w-full">
            <input type="text" name="filter" placeholder="Search title, genre, language..." value="<?php echo htmlspecialchars($filter); ?>"
                   class="w-full bg-white/5 border border-white/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white focus:outline-none focus:border-cinema-accent transition-all" />
        </form>
    </div>

    <?php if (empty($films)): ?>
        <div class="py-20 text-center">
            <p class="text-cinema-muted uppercase font-black tracking-widest">No films found matching your search.</p>
            <a href="discover.php" class="inline-block mt-4 text-cinema-accent font-bold hover:underline">Clear Filters</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php foreach($films as $film): ?>
                <?php render_film_card_discover($film); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php 
function render_film_card_discover($film) {
    ?>
    <div class="bg-cinema-card rounded-2xl overflow-hidden border border-cinema-border group hover:border-cinema-gold/50 transition-all cursor-pointer flex flex-col shadow-xl relative">
        <div class="relative aspect-[2/3] w-full overflow-hidden bg-cinema-surface">
            <img src="<?php echo $film['posterUrl']; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
            <div class="absolute top-2 right-2 px-2 py-0.5 rounded-md text-[10px] font-black bg-black/70 backdrop-blur-md text-cinema-gold border border-white/10 flex items-center gap-1">
                <?php echo number_format($film['rating'], 1); ?>
            </div>
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
