<div class="bg-cinema-card rounded-2xl overflow-hidden border border-white/5 group hover:border-[#fbbf24]/50 transition-all cursor-pointer flex flex-col shadow-xl relative animate-fadeIn">
    <div class="relative aspect-[2/3] w-full overflow-hidden bg-cinema-surface">
        <img src="<?php echo $film['posterUrl']; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
            <div class="w-12 h-12 rounded-full bg-[#f84464]/90 flex items-center justify-center shadow-2xl scale-75 group-hover:scale-100 transition-transform duration-300">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="m7 4 12 8-12 8V4z"/></svg>
            </div>
        </div>
        <div class="absolute top-2 right-2 px-2 py-0.5 rounded-md text-[10px] font-black bg-black/70 backdrop-blur-md text-cinema-gold border border-white/10 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <?php echo number_format($film['rating'], 1); ?>
        </div>
    </div>
    <div class="p-4 space-y-2 flex-1 flex flex-col justify-between">
        <div>
            <h3 class="font-bold text-xs text-white truncate group-hover:text-[#f84464] transition-colors tracking-tight"><?php echo $film['title']; ?></h3>
            <span class="text-[10px] text-cinema-muted block truncate font-medium"><?php echo $film['director']; ?></span>
        </div>
        <div class="flex items-center justify-between text-[10px] pt-1">
            <span class="text-cinema-teal font-bold uppercase tracking-widest"><?php echo $film['language']; ?></span>
            <span class="text-cinema-muted font-mono"><?php echo $film['releaseYear']; ?></span>
        </div>
    </div>
</div>
