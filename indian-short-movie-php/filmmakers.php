<?php
include 'includes/header.php';

$creators = [
    [
        'id' => 'c-1',
        'name' => 'Harri Kumar',
        'handle' => '@harrikumar',
        'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=200',
        'bio' => 'National Award-winning director focusing on rural narratives and social realism in Kannada cinema.',
        'followers' => '12.5K'
    ],
    [
        'id' => 'c-2',
        'name' => 'Aishwarya Raman',
        'handle' => '@ashraman',
        'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=200',
        'bio' => 'Visual storyteller exploring the intersection of modern life and traditional values in Chennai.',
        'followers' => '8.9K'
    ]
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-teal/10 border border-cinema-teal/20 text-cinema-teal text-[10px] font-black uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
                <span>Industry Directory</span>
            </div>
            <h1 class="font-display font-black text-4xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
            <p class="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($creators as $creator): ?>
        <div class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden">
            <!-- Background Glow -->
            <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-cinema-teal/5 rounded-full blur-[80px] group-hover:bg-cinema-teal/10 transition-colors"></div>

            <div class="relative flex flex-col items-center text-center space-y-6">
                <div class="relative">
                    <div class="w-24 h-24 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                        <img src="<?php echo $creator['avatar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 rounded-xl bg-cinema-accent flex items-center justify-center text-white shadow-lg border border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
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
                        <p class="text-lg font-black text-white"><?php echo $creator['followers']; ?></p>
                        <p class="text-[8px] text-cinema-muted uppercase font-black tracking-tighter">Followers</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
