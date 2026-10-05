<?php
include 'includes/header.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="space-y-3">
        <h1 class="font-display font-black text-4xl text-white tracking-tight uppercase leading-none text-white">My Watchlist</h1>
        <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Your curated collection of independent stories</p>
    </div>

    <!-- Empty State -->
    <div id="watchlist-container" class="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
        <div class="w-20 h-20 rounded-[2rem] bg-cinema-teal/10 border border-cinema-teal/20 flex items-center justify-center text-cinema-teal mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
        </div>
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">Watchlist is Empty</h2>
        <p class="text-cinema-muted max-w-xs mx-auto font-medium mb-8">Save films you want to watch later and they will appear here.</p>
        <button onclick="window.location.href='discover.php'" class="px-8 py-4 rounded-2xl bg-white/5 hover:bg-white/10 text-white text-xs font-black uppercase tracking-widest border border-white/10 transition-all">Browse Catalog</button>
    </div>
</div>

<script>
function updateWatchlistUI() {
    const watchlist = JSON.parse(localStorage.getItem('ism_watchlist') || '[]');
    const container = document.getElementById('watchlist-container');
    
    if (watchlist.length === 0) {
        // Keep empty state
    } else {
        // In a real app, we would fetch film data and render cards
        container.innerHTML = `
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 text-left">
                <p class="col-span-full text-cinema-muted text-center font-bold">Watchlist items found: ${watchlist.length}. Rendering placeholder for v2 conversion.</p>
            </div>
        `;
    }
}
document.addEventListener('DOMContentLoaded', updateWatchlistUI);
</script>

<?php include 'includes/footer.php'; ?>
