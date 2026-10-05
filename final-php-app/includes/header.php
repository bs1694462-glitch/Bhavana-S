<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Short Movie - India's Stories on Screen</title>
    <!-- Use Tailwind CDN to maintain the exact design and animations without Node.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #07080b;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }
        .glass-panel {
            background: rgba(12, 13, 18, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .cinema-bg { background-color: #07080b; }
        .cinema-surface { background-color: #0c0d12; }
        .cinema-card { background-color: #12141d; }
        .cinema-border { border-color: rgba(255, 255, 255, 0.05); }
        .cinema-accent { background-color: #f84464; }
        .cinema-accent-text { color: #f84464; }
        .cinema-teal { color: #2dd4bf; }
        .cinema-gold { color: #fbbf24; }
        .cinema-muted { color: #94a3b8; }
        
        .animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 glass-panel border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo Section -->
            <div class="flex items-center gap-8">
                <a href="index.php" class="group flex flex-col items-start select-none">
                    <div class="flex items-center gap-2">
                        <span class="font-black text-lg sm:text-xl text-white flex items-center leading-none">
                            <span class="relative inline-block">i<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]"></span></span>nd<span class="relative inline-block">i<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]"></span></span>an
                        </span>
                        
                        <div class="relative inline-flex items-center justify-center -rotate-2 transition-transform duration-200 group-hover:rotate-0 group-hover:scale-105 h-6 sm:h-6.5">
                            <svg viewBox="0 0 94 36" class="h-full drop-shadow-md" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="navTicketGradientDark" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stopColor="#f84464" />
                                        <stop offset="60%" stopColor="#dc2626" />
                                        <stop offset="100%" stopColor="#8b5cf6" />
                                    </linearGradient>
                                </defs>
                                <path d="M 6 0 L 39 0 A 6 6 0 0 1 55 0 L 88 0 C 91.3 0 94 2.7 94 6 L 94 30 C 94 33.3 89.3 36 88 36 L 55 36 A 6 6 0 0 1 39 36 L 6 36 C 2.7 36 0 33.3 0 30 L 0 6 C 0 2.7 2.7 0 6 0 Z" fill="url(#navTicketGradientDark)" />
                                <text x="11" y="24" fill="#ffffff" font-family="system-ui, -apple-system, sans-serif" font-weight="900" font-size="16.5" letter-spacing="-0.6px">short</text>
                                <g transform="translate(64, 10)"><circle cx="8" cy="8" r="7.5" fill="#ffffff" /><polygon points="6.5,5 11.5,8 6.5,11" fill="#dc2626" /></g>
                            </svg>
                        </div>

                        <span class="font-black text-lg sm:text-xl text-white flex items-center leading-none">
                            mo<span class="relative inline-block">v<span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]"></span></span>ie
                        </span>
                    </div>
                    <div class="flex items-center gap-1.5 mt-0.5 opacity-80">
                        <span class="h-px w-3 bg-[#e50914]/60"></span>
                        <span class="text-[8px] sm:text-[9px] font-bold tracking-[0.2em] text-gray-400 uppercase">India's Stories on Screen</span>
                        <span class="h-px w-3 bg-[#e50914]/60"></span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-6">
                    <a href="index.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Home</a>
                    <a href="discover.php" class="text-sm font-medium hover:text-white transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'discover.php' && !isset($_GET['tab'])) ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Discover</a>
                    <a href="watchlist.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'watchlist.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Watchlist</a>
                    <a href="filmmakers.php" class="text-sm font-medium hover:text-white transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'filmmakers.php' ? 'text-white font-bold' : 'text-cinema-muted'; ?>">Filmmakers</a>
                    <a href="discover.php" class="text-sm font-medium text-cinema-muted hover:text-white transition-colors">Search</a>
                    <a href="admin/index.php" class="text-sm font-medium text-cinema-muted hover:text-white transition-colors">Admin</a>
                </nav>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-4">
                <?php if (is_logged_in()): ?>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-[#f84464] font-black text-[10px]">
                            <?php echo substr($_SESSION['user_name'], 0, 2); ?>
                        </div>
                        <a href="logout.php" class="text-xs font-bold text-red-400 hover:text-red-300">Sign Out</a>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="text-sm font-medium text-cinema-muted hover:text-white transition-colors">Sign In</a>
                <?php endif; ?>
                <a href="submit.php" class="px-6 py-2.5 rounded-xl bg-[#f84464] hover:bg-[#ff5575] text-[10px] font-black uppercase tracking-widest text-white transition-all shadow-lg shadow-red-500/20 active:scale-95">SUBMIT FILM</a>
            </div>
        </div>
    </header>
    <main class="flex-grow">
