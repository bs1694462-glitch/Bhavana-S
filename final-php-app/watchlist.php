<?php
include 'includes/header.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn text-center">
    <div class="space-y-3">
        <h1 class="font-black text-4xl sm:text-5xl text-white tracking-tight uppercase leading-none">Your Watchlist</h1>
        <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Your curated collection of independent stories</p>
    </div>

    <!-- Empty Watchlist -->
    <div class="py-32 bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden max-w-3xl mx-auto">
        <div class="absolute inset-0 bg-gradient-to-br from-[#fbbf24]/5 via-transparent to-transparent"></div>
        <div class="relative z-10 space-y-6">
            <div class="w-20 h-20 rounded-[2rem] bg-cinema-gold/10 border border-[#fbbf24]/20 flex items-center justify-center text-cinema-gold mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
            </div>
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Watchlist is Empty</h2>
            <p class="text-cinema-muted max-w-sm mx-auto font-medium text-xs leading-relaxed">Start exploring our catalog and save your favorite stories to watch later. Your collection is private to your session.</p>
            <div class="pt-4">
                <a href="discover.php" class="px-8 py-3.5 rounded-xl bg-[#f84464] text-white text-[10px] font-black uppercase tracking-widest hover:bg-[#ff5575] transition-all shadow-lg shadow-red-500/20">Browse Catalog</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
