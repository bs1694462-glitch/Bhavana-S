<?php
include 'header.php';

$films = get_films();
$creators = get_creators();
?>

<div class="space-y-8 animate-fadeIn">
    <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black tracking-tight uppercase">Platform Analytics</h1>
            <p class="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Real-time overview of the cinematic ecosystem</p>
        </div>
    </header>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stat Cards -->
        <div class="p-6 rounded-2xl bg-cinema-card border border-cinema-border space-y-2">
            <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Total Films</span>
            <p class="text-2xl font-black"><?php echo count($films); ?></p>
        </div>
        <div class="p-6 rounded-2xl bg-cinema-card border border-cinema-border space-y-2">
            <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Filmmakers</span>
            <p class="text-2xl font-black"><?php echo count($creators); ?></p>
        </div>
        <div class="p-6 rounded-2xl bg-cinema-card border border-cinema-border space-y-2">
            <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Active Reports</span>
            <p class="text-2xl font-black">0</p>
        </div>
        <div class="p-6 rounded-2xl bg-cinema-card border border-cinema-border space-y-2">
            <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Pending</span>
            <p class="text-2xl font-black">0</p>
        </div>
    </div>

    <!-- Recent Activity Placeholder -->
    <div class="bg-cinema-card rounded-[2rem] border border-cinema-border p-12 text-center">
        <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-cinema-muted mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 class="text-xl font-black uppercase tracking-tight mb-2">No Recent Activity</h3>
        <p class="text-xs text-cinema-muted font-medium max-w-xs mx-auto uppercase tracking-widest leading-loose">Your admin logs are clear. New film submissions will appear here for review.</p>
    </div>
</div>

<?php include 'footer.php'; ?>
