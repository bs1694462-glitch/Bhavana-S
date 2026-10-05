<?php
include 'includes/header.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="space-y-3 border-b border-white/5 pb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-teal/10 border border-cinema-teal/20 text-cinema-teal text-[10px] font-black uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
            <span>Industry Directory</span>
        </div>
        <h1 class="font-black text-4xl sm:text-5xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
        <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
    </div>

    <!-- Empty State -->
    <div class="py-32 text-center bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#2dd4bf]/5 via-transparent to-transparent"></div>
        <div class="relative z-10 space-y-6">
            <div class="w-20 h-20 rounded-[2rem] bg-cinema-teal/10 border border-cinema-teal/20 flex items-center justify-center text-cinema-teal mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
            </div>
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter">No Filmmakers Listed</h2>
            <p class="text-cinema-muted max-w-sm mx-auto font-medium text-xs leading-relaxed">Our director directory is currently being curated with real industry professionals. Check back soon for visionary profiles.</p>
            <div class="pt-4">
                <a href="submit.php" class="px-8 py-3.5 rounded-xl bg-white/5 border border-white/10 text-white text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition-all">Submit Your Profile</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
