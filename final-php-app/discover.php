<?php
include 'includes/header.php';
$filter = $_GET['filter'] ?? '';
$all_films = get_films('approved');

if ($filter) {
    $films = array_filter($all_films, function($f) use ($filter) {
        return stripos($f['genre'], $filter) !== false || stripos($f['language'], $filter) !== false || stripos($f['title'], $filter) !== false;
    });
} else {
    $films = $all_films;
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 border-b border-white/5 pb-10">
        <div class="space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-accent/10 border border-cinema-accent/20 text-[#f84464] text-[10px] font-black uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <span>Screener Catalog</span>
            </div>
            <h1 class="font-black text-4xl text-white tracking-tight uppercase leading-none">Discover Cinema</h1>
            <p class="text-xs text-cinema-muted uppercase tracking-[0.2em] font-bold">Explore India's most compelling independent stories</p>
        </div>

        <form action="discover.php" method="GET" class="relative group w-full md:w-80">
            <input type="text" name="filter" value="<?php echo htmlspecialchars($filter); ?>" 
                   placeholder="Search title, genre, language..." 
                   class="w-full bg-cinema-card border border-white/10 rounded-2xl px-6 py-4 text-xs font-bold text-white outline-none focus:border-[#f84464] transition-all">
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </button>
        </form>
    </div>

    <?php if (empty($films)): ?>
        <div class="py-32 text-center bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl">
            <div class="w-20 h-20 rounded-[2rem] bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-6 text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter">No Productions Found</h2>
            <p class="text-cinema-muted max-w-xs mx-auto font-medium text-xs leading-relaxed uppercase tracking-widest mt-2">Try adjusting your search filters or browse by genre.</p>
            <div class="pt-8">
                <a href="discover.php" class="text-[10px] font-black text-cinema-teal hover:text-white uppercase tracking-widest transition-all underline decoration-cinema-teal/30 underline-offset-8">Clear All Filters</a>
            </div>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
            <?php foreach($films as $film): ?>
                <?php include 'includes/film_card.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
