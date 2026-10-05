<?php
include 'includes/header.php';
$creators = get_creators();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-teal/10 border border-cinema-teal/20 text-cinema-teal text-[10px] font-black uppercase tracking-widest">
                <span>Industry Directory</span>
            </div>
            <h1 class="font-black text-4xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
        </div>
    </div>

    <?php if (empty($creators)): ?>
        <div class="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
            <div class="w-20 h-20 rounded-[2rem] bg-cinema-teal/10 border border-cinema-teal/20 flex items-center justify-center text-cinema-teal mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
            </div>
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">No Filmmakers Listed</h2>
            <p class="text-cinema-muted max-w-xs mx-auto font-medium">Our director directory is currently being curated with real industry professionals.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($creators as $creator): ?>
                <!-- Creator Card Logic here -->
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
