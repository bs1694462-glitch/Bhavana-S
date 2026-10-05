<?php
include 'includes/header.php';
$genres = get_genres();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-20 pb-20 animate-fadeIn">
    
    <!-- Hero Spotlight Section -->
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
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-black uppercase tracking-widest <?php echo $isLang ? 'text-[#f84464]' : 'text-cinema-teal'; ?> opacity-0 group-hover:opacity-100 transition-all translate-y-2 group-hover:translate-y-0">
                        <span>View Productions</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </div>
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
        
        <!-- Empty State matching requirement of no dummy content -->
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
    </section>
</div>

<?php include 'includes/footer.php'; ?>
