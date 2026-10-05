<?php
include 'includes/header.php';

// Mock Data for PHP conversion (Preserving layout)
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

$genres = [
    ['name' => 'Drama', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Thriller', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Mystery', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Comedy', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Folk Folklore', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Documentary', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Romance', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Action', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Indie Experimental', 'desc' => 'Short Films & Docs', 'isLang' => false],
    ['name' => 'Kannada (ಕನ್ನಡ)', 'desc' => 'Regional Excellence', 'isLang' => true],
    ['name' => 'Hindi (हिन्दी)', 'desc' => 'Bollywood Heart', 'isLang' => true],
    ['name' => 'Tamil (தமிழ்)', 'desc' => 'Kollywood Vision', 'isLang' => true],
    ['name' => 'Telugu (తెలుగు)', 'desc' => 'Tollywood Power', 'isLang' => true],
    ['name' => 'Malayalam (മലയാളം)', 'desc' => 'Realistic Stories', 'isLang' => true],
    ['name' => 'Gujarati (ગુજરાતી)', 'desc' => 'Urban Narratives', 'isLang' => true]
];

// No films for now as per "Remove all dummy content"
$films = [];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-16 pb-20 animate-fadeIn">

    <!-- Hero Spotlight (Conditional if films exist) -->
    <?php if (count($films) > 0): ?>
    <section class="relative rounded-3xl overflow-hidden border border-cinema-border bg-cinema-card shadow-2xl h-[480px] sm:h-[540px]">
        <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&q=80&w=1200" class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#07080b] via-[#07080b]/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#07080b] via-[#07080b]/80 to-transparent"></div>
        
        <div class="absolute bottom-0 left-0 right-0 p-8 sm:p-12 max-w-3xl space-y-6">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-cinema-accent text-white shadow-lg">Featured</span>
                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-cinema-surface/80 border border-cinema-border text-cinema-teal uppercase tracking-widest">Kannada</span>
            </div>
            <h1 class="font-display font-black text-4xl sm:text-6xl text-white tracking-tight leading-none text-white">Cinematic Excellence</h1>
            <p class="text-sm text-gray-300 line-clamp-3 leading-relaxed max-w-xl">Experience the best of independent Indian short cinema curated for the global stage.</p>
            <div class="flex items-center gap-4 pt-2">
                <button onclick="openVideoModal('Featured Film', 'Director Name • Kannada')" class="px-8 py-4 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-xs font-black uppercase tracking-widest shadow-2xl flex items-center gap-2 transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="m7 4 12 8-12 8V4z"/></svg>
                    <span>Watch Film</span>
                </button>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 1. EXPLORE GENRES (Showing 9 main genres + Languages) -->
    <section id="genres" class="space-y-6">
        <div class="flex items-center justify-between border-l-4 border-purple-500 pl-4">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Explore Genres</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($genres as $genre): ?>
            <div onclick="window.location.href='discover.php?filter=<?php echo urlencode($genre['name']); ?>'" class="group relative overflow-hidden rounded-2xl border transition-all cursor-pointer shadow-xl p-6 <?php echo $genre['isLang'] ? 'bg-white border-gray-200 hover:border-cinema-accent' : 'bg-cinema-card border-cinema-border hover:border-cinema-accent'; ?>">
                <div class="absolute inset-0 bg-gradient-to-br from-cinema-accent/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <h3 class="text-xl font-black transition-colors mb-1 <?php echo $genre['isLang'] ? 'text-black' : 'text-white group-hover:text-cinema-accent'; ?>"><?php echo $genre['name']; ?></h3>
                <p class="text-xs uppercase tracking-widest font-bold <?php echo $genre['isLang'] ? 'text-gray-500' : 'text-cinema-muted'; ?>"><?php echo $genre['desc']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 2. VISIONARY FILMMAKERS -->
    <section id="filmmakers" class="space-y-8">
        <div class="flex items-center justify-between border-l-4 border-cinema-teal pl-4">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cinema-teal"><path d="M12 15l-3 3-3-3"/><path d="M15 12l3-3 3 3"/><path d="M12 9l-3-3-3 3"/><path d="M9 12l3 3 3-3"/><path d="M12 5l-7 7 7 7 7-7-7-7z"/></svg>
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Visionary Filmmakers</h2>
            </div>
            <a href="filmmakers.php" class="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors flex items-center gap-1">
                <span>View All</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($creators as $creator): ?>
            <div onclick="window.location.href='filmmakers.php?id=<?php echo $creator['id']; ?>'" class="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden flex flex-col sm:flex-row items-center gap-8">
                <div class="relative shrink-0">
                    <div class="w-32 h-32 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                        <img src="<?php echo $creator['avatar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 rounded-xl bg-cinema-accent flex items-center justify-center text-white shadow-lg border border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
                    </div>
                </div>
                <div class="space-y-4 text-center sm:text-left">
                    <div>
                        <h3 class="text-2xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight"><?php echo $creator['name']; ?></h3>
                        <p class="text-xs text-cinema-muted font-black uppercase tracking-widest"><?php echo $creator['handle']; ?></p>
                    </div>
                    <p class="text-sm text-cinema-muted line-clamp-2 leading-relaxed font-medium"><?php echo $creator['bio']; ?></p>
                    <div class="flex items-center justify-center sm:justify-start gap-4">
                        <span class="text-[10px] font-bold text-white bg-white/5 px-3 py-1.5 rounded-lg border border-white/5 uppercase tracking-widest">
                            0 Productions
                        </span>
                        <span class="text-[10px] font-bold text-cinema-teal bg-cinema-teal/5 px-3 py-1.5 rounded-lg border border-cinema-teal/10 uppercase tracking-widest">
                            <?php echo $creator['followers']; ?> Followers
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<?php include 'includes/footer.php'; ?>
