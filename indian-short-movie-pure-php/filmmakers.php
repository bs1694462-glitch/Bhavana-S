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
            <h1 class="font-display font-black text-4xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($creators as $creator): ?>
            <div class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden">
                <div class="relative flex flex-col items-center text-center space-y-6">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                            <img src="<?php echo $creator['avatar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight"><?php echo $creator['name']; ?></h3>
                        <p class="text-[10px] text-cinema-muted font-black uppercase tracking-widest"><?php echo $creator['handle']; ?></p>
                    </div>

                    <p class="text-xs text-cinema-muted line-clamp-3 leading-relaxed font-medium"><?php echo $creator['bio']; ?></p>

                    <div class="w-full grid grid-cols-2 gap-4 pt-2">
                        <div class="bg-white/5 rounded-2xl p-3 border border-white/5">
                            <p class="text-lg font-black text-white">0</p>
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
</div>

<?php include 'includes/footer.php'; ?>
