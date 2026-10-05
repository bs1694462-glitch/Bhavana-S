<?php
include 'includes/header.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$films = []; // Clear films as per "Remove all dummy content"
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-3">
            <h1 class="font-display font-black text-4xl text-white tracking-tight uppercase leading-none">Film Catalog</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Discover independent stories across India</p>
        </div>
        
        <div class="flex flex-wrap items-center gap-4">
            <div class="relative max-w-xs">
                <input type="text" placeholder="Search title, director..." class="w-full bg-white/5 border border-white/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white focus:outline-none focus:border-cinema-accent transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cinema-muted absolute left-3.5 top-1/2 -translate-y-1/2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
    </div>

    <?php if (count($films) === 0): ?>
    <div class="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
        <div class="w-20 h-20 rounded-[2rem] bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-cinema-accent mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 8 6 4-6 4Z"/></svg>
        </div>
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">No Films Found</h2>
        <p class="text-cinema-muted max-w-xs mx-auto font-medium">Our catalog is currently being updated with real independent content. Check back soon!</p>
    </div>
    <?php else: ?>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Film Cards would go here -->
    </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const filter = urlParams.get('filter');
    if (filter) {
        const searchInput = document.querySelector('input[type="text"]');
        if (searchInput) {
            searchInput.value = filter;
            showToast('Filtering for: ' + filter);
        }
    }
});
</script>

<?php include 'includes/footer.php'; ?>
