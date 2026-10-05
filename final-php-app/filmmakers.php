<?php
include 'includes/header.php';
$creators = get_creators();
$all_films = get_films('approved');
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="space-y-3 border-b border-white/5 pb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-teal/10 border border-cinema-teal/20 text-cinema-teal text-[10px] font-black uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            <span>Industry Directory</span>
        </div>
        <h1 class="font-black text-4xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
        <p class="text-xs text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
    </div>

    <?php if (empty($creators)): ?>
        <div class="py-32 text-center bg-cinema-card rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
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
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($creators as $creator): ?>
                <?php 
                $count = count(array_filter($all_films, function($f) use ($creator) {
                    return stripos($f['director'], $creator['name']) !== false;
                }));
                ?>
                <div class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden">
                    <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-cinema-teal/5 rounded-full blur-[80px] group-hover:bg-cinema-teal/10 transition-colors"></div>
                    <div class="relative flex flex-col items-center text-center space-y-6">
                        <div class="w-24 h-24 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                            <img src="<?php echo $creator['avatar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight uppercase"><?php echo $creator['name']; ?></h3>
                            <p class="text-[10px] text-cinema-muted font-black uppercase tracking-widest"><?php echo $creator['handle']; ?></p>
                        </div>
                        <p class="text-xs text-cinema-muted line-clamp-3 leading-relaxed font-medium"><?php echo $creator['bio']; ?></p>
                        <div class="w-full grid grid-cols-2 gap-4 pt-2">
                            <div class="bg-white/5 rounded-2xl p-3 border border-white/5">
                                <p class="text-lg font-black text-white"><?php echo $count; ?></p>
                                <p class="text-[8px] text-cinema-muted uppercase font-black tracking-tighter">Productions</p>
                            </div>
                            <div class="bg-white/5 rounded-2xl p-3 border border-white/5">
                                <p class="text-lg font-black text-white"><?php echo number_format($creator['followersCount'] / 1000, 1); ?>K</p>
                                <p class="text-[8px] text-cinema-muted uppercase font-black tracking-tighter">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
