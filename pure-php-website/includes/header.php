<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Short Movie - India's Stories on Screen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; }
        .cinema-bg { background-color: #07080b; }
        .cinema-surface { background-color: #0c0d12; }
        .cinema-card { background-color: #12141d; }
        .cinema-border { border-color: rgba(255, 255, 255, 0.05); }
        .cinema-accent { background-color: #f84464; }
        .cinema-teal { color: #2dd4bf; }
        .cinema-gold { color: #fbbf24; }
        .cinema-muted { color: #94a3b8; }
        .glass-panel { background: rgba(12, 13, 18, 0.8); backdrop-filter: blur(12px); }
        .animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 glass-panel border-b border-cinema-border/50 h-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="index.php" class="group flex flex-col items-start select-none">
                    <div class="flex items-center gap-2">
                        <span class="font-black text-lg sm:text-xl text-white flex items-center leading-none">
                            <span class="relative">i<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464]"></span></span>
                            <span>nd</span>
                            <span class="relative">i<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464]"></span></span>
                            <span>an</span>
                        </span>
                        <div class="bg-gradient-to-br from-[#f84464] via-[#dc2626] to-[#8b5cf6] px-3 py-1 rounded-lg -rotate-2 group-hover:rotate-0 transition-transform">
                            <span class="text-white font-black text-sm">short</span>
                        </div>
                        <span class="font-black text-lg sm:text-xl text-white flex items-center leading-none">
                            <span>m</span><span>o</span><span>v</span><span class="relative">i<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464]"></span></span><span>e</span>
                        </span>
                    </div>
                    <div class="flex items-center gap-1.5 mt-0.5 opacity-80">
                        <span class="h-px w-3 bg-[#e50914]/60"></span>
                        <span class="text-[8px] font-bold tracking-[0.2em] text-gray-400 uppercase">India's Stories on Screen</span>
                        <span class="h-px w-3 bg-[#e50914]/60"></span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-6">
                    <a href="index.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Home</a>
                    <a href="discover.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'discover.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Discover</a>
                    <a href="watchlist.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'watchlist.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Watchlist</a>
                    <a href="filmmakers.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'filmmakers.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Filmmakers</a>
                    <a href="admin/index.php" class="text-sm font-medium text-cinema-muted hover:text-white transition-colors">Admin</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <?php if (is_logged_in()): ?>
                    <span class="text-xs font-bold text-cinema-muted"><?php echo $_SESSION['user_name']; ?></span>
                    <a href="logout.php" class="text-xs font-bold text-red-400">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="text-sm font-medium text-cinema-muted hover:text-white">Sign In</a>
                <?php endif; ?>
                <a href="submit.php" class="px-6 py-2.5 rounded-xl bg-cinema-accent hover:bg-[#ff5575] text-[10px] font-black uppercase tracking-widest text-white transition-all shadow-lg shadow-cinema-accent/20">SUBMIT FILM</a>
            </div>
        </div>
    </header>
    <main class="flex-grow">
