<?php
session_start();
// Minimal Admin protection
$isAdmin = true; // In real app, check session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Indian Short Movie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cinema: {
                            bg: '#07080b',
                            surface: '#111319',
                            card: '#181b24',
                            border: '#262a36',
                            accent: '#e50914',
                            accentHover: '#b80710',
                            gold: '#ffb703',
                            teal: '#66fcf1',
                            muted: '#8e95a5'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-panel { background: rgba(17, 19, 25, 0.85); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-cinema-bg text-white antialiased min-h-screen">

    <div class="flex flex-col md:flex-row h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-cinema-surface border-r border-cinema-border p-6 space-y-8 overflow-y-auto">
            <div class="flex items-center gap-3 pb-6 border-b border-white/5">
                <div class="w-8 h-8 rounded-lg bg-cinema-accent flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                </div>
                <h2 class="font-bold text-sm tracking-tight uppercase">Admin Portal</h2>
            </div>
            
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-cinema-accent text-white font-bold text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                    <span>Overview</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-cinema-muted hover:text-white hover:bg-white/5 font-bold text-xs transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 8 6 4-6 4Z"/></svg>
                    <span>Film Management</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-cinema-muted hover:text-white hover:bg-white/5 font-bold text-xs transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>Filmmakers</span>
                </a>
            </nav>

            <div class="pt-6 border-t border-white/5">
                <a href="../index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-cinema-muted hover:text-white hover:bg-white/5 font-bold text-xs transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                    <span>Back to Site</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto space-y-8">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-black tracking-tight uppercase">Platform Analytics</h1>
                    <p class="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Real-time overview of your ecosystem</p>
                </div>
                <button onclick="window.location.href='../submit.php'" class="px-6 py-3 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-[10px] font-black uppercase tracking-widest shadow-xl transition-all">Add New Film</button>
            </header>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stats -->
                <div class="p-6 rounded-2xl bg-cinema-card border border-white/5 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Total Films</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cinema-gold"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 8 6 4-6 4Z"/></svg>
                    </div>
                    <p class="text-3xl font-black">0</p>
                </div>
                <div class="p-6 rounded-2xl bg-cinema-card border border-white/5 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Filmmakers</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cinema-teal"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <p class="text-3xl font-black">2</p>
                </div>
            </div>

            <div class="bg-cinema-card rounded-[2rem] border border-white/5 p-12 text-center">
                 <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-cinema-muted mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                 </div>
                 <h3 class="text-xl font-black uppercase tracking-tight mb-2">No Recent Activity</h3>
                 <p class="text-xs text-cinema-muted font-medium max-w-xs mx-auto uppercase tracking-widest leading-loose">Your admin logs are clear. New film submissions will appear here for review.</p>
            </div>
        </main>
    </div>

</body>
</html>
