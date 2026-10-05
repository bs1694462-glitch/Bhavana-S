<?php
include 'includes/header.php';
$genres = get_genres();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-16 pb-20 animate-fadeIn">
    <!-- Hero Spotlight Placeholder -->
    <section class="relative rounded-[2.5rem] overflow-hidden border border-cinema-border bg-cinema-card shadow-2xl h-[400px] sm:h-[500px] flex items-center justify-center text-center p-8">
        <div class="space-y-6 max-w-2xl">
            <h1 class="font-black text-4xl sm:text-6xl text-white tracking-tighter uppercase leading-none">India's Stories <br><span class="text-cinema-accent">On Screen</span></h1>
            <p class="text-sm sm:text-base text-cinema-muted leading-relaxed font-medium">Discover the most compelling independent short films and documentaries from across the Indian subcontinent.</p>
            <div class="flex items-center justify-center gap-4">
                <a href="discover.php" class="px-8 py-4 rounded-2xl bg-cinema-accent hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-widest transition-all">Explore Catalog</a>
                <a href="submit.php" class="px-8 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 text-white text-xs font-black uppercase tracking-widest transition-all">Submit Film</a>
            </div>
        </div>
    </section>

    <!-- EXPLORE GENRES -->
    <section id="genres" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-[#8b5cf6] pl-4">
            <h2 class="font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Explore Genres</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($genres as $genre): ?>
                <?php $isLang = isset($genre['isLang']) && $genre['isLang']; ?>
                <a href="discover.php?filter=<?php echo urlencode($genre['name']); ?>" 
                   class="group relative overflow-hidden rounded-2xl border transition-all cursor-pointer shadow-xl p-6 <?php echo $isLang ? 'bg-white border-gray-200 hover:border-[#f84464]' : 'bg-cinema-card border-cinema-border hover:border-[#f84464]'; ?>">
                    <h3 class="text-xl font-black transition-colors mb-1 <?php echo $isLang ? 'text-black' : 'text-white group-hover:text-cinema-accent'; ?>"><?php echo $genre['name']; ?></h3>
                    <p class="text-[10px] uppercase tracking-widest font-bold <?php echo $isLang ? 'text-gray-500' : 'text-cinema-muted'; ?>"><?php echo $genre['desc']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- VISIONARY FILMMAKERS Placeholder -->
    <section id="filmmakers" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-teal pl-4">
            <h2 class="font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Visionary Filmmakers</h2>
            <a href="filmmakers.php" class="text-xs font-bold text-cinema-teal hover:underline uppercase tracking-widest">View All</a>
        </div>
        <div class="py-20 text-center bg-cinema-card rounded-[2.5rem] border border-white/5">
            <p class="text-cinema-muted font-medium uppercase tracking-widest text-xs">Our filmmaker directory is currently being curated with real industry professionals.</p>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
