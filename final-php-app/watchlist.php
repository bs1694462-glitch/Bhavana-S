<?php
include 'includes/header.php';
// For demo, we'll just show an empty watchlist message if not logged in or no saved films
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center animate-fadeIn">
    <div class="bg-cinema-card p-16 sm:p-24 rounded-[4rem] border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f84464]/5 via-transparent to-transparent opacity-30"></div>
        
        <div class="relative z-10 space-y-8">
            <div class="w-24 h-24 rounded-[2.5rem] bg-[#f84464]/10 border border-[#f84464]/20 flex items-center justify-center text-[#f84464] mx-auto mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
            </div>
            
            <div class="space-y-4">
                <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Your Watchlist</h1>
                <p class="text-cinema-muted max-w-sm mx-auto font-medium text-sm leading-relaxed">Keep track of the stories that move you. Sign in to save films to your personal collection.</p>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if (!is_logged_in()): ?>
                    <a href="login.php" class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-[#f84464] hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-[0.2em] transition-all shadow-2xl shadow-red-500/20 active:scale-95">Sign In to Save</a>
                <?php endif; ?>
                <a href="discover.php" class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 text-white text-xs font-black uppercase tracking-[0.2em] transition-all active:scale-95">Explore Catalog</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
