<?php
include 'includes/header.php';
$filter = $_GET['filter'] ?? '';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 border-b border-white/5 pb-10">
        <div class="space-y-3">
            <h1 class="font-black text-4xl sm:text-5xl text-white tracking-tight uppercase leading-none">Film Catalog</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Discover independent stories across the nation</p>
        </div>
        <div class="relative max-w-md w-full">
            <form action="discover.php" method="GET">
                <input type="text" name="filter" value="<?php echo htmlspecialchars($filter); ?>" placeholder="Search title, director or genre..." class="w-full bg-cinema-card border border-white/10 rounded-2xl px-6 py-4 text-sm font-medium focus:outline-none focus:border-[#f84464] transition-all shadow-xl">
                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-cinema-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
            </form>
        </div>
    </div>

    <!-- Catalog Content -->
    <div class="py-32 text-center bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-[#f84464]/5 via-transparent to-transparent"></div>
        <div class="relative z-10 space-y-6">
            <div class="w-20 h-20 rounded-[2rem] bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-[#f84464] mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>
            </div>
            <?php if ($filter): ?>
                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">No Results for "<?php echo htmlspecialchars($filter); ?>"</h2>
                <p class="text-cinema-muted max-w-sm mx-auto font-medium text-xs leading-relaxed">Try adjusting your filters or searching for something else to discover independent films.</p>
                <div class="pt-4">
                    <a href="discover.php" class="px-8 py-3.5 rounded-xl bg-white/5 border border-white/10 text-white text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition-all">Clear Filter</a>
                </div>
            <?php else: ?>
                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Catalog Under Refresh</h2>
                <p class="text-cinema-muted max-w-sm mx-auto font-medium text-xs leading-relaxed">Our curated catalog is currently being updated with real independent content. Check back soon for fresh stories!</p>
                <div class="pt-4">
                    <a href="submit.php" class="px-8 py-3.5 rounded-xl bg-[#f84464] text-white text-[10px] font-black uppercase tracking-widest hover:bg-[#ff5575] transition-all shadow-lg shadow-red-500/20">Submit Your Film</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
