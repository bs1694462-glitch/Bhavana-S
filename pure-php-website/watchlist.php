<?php
include 'includes/header.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="space-y-3 text-center">
        <h1 class="font-black text-4xl text-white tracking-tight uppercase leading-none">Your Watchlist</h1>
        <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Your curated collection of independent stories</p>
    </div>

    <div class="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
        <div class="w-20 h-20 rounded-[2rem] bg-cinema-gold/10 border border-cinema-gold/20 flex items-center justify-center text-cinema-gold mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
        </div>
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">Watchlist is Empty</h2>
        <p class="text-cinema-muted max-w-xs mx-auto font-medium">Start exploring our catalog and save your favorite stories to watch later.</p>
        <div class="mt-8">
            <a href="discover.php" class="px-8 py-3 rounded-xl bg-cinema-accent hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-widest transition-all shadow-lg">Browse Catalog</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
