<?php
session_start();
require_once __DIR__ . '/functions.php';
$current_page = basename($_SERVER['PHP_SELF'], ".php");
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
// For local portability in ZIP, we'll use a relative base logic if needed, but let's try to keep it simple.
// A better way is to define a constant for the root.
if (!defined('ROOT_URL')) {
    // Detect if we are in admin subfolder
    $is_admin_path = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
    define('ROOT_PATH', $is_admin_path ? '../' : '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Short Movie - India's Stories on Screen</title>
    <meta name="description" content="Dedicated platform celebrating independent storytelling, short cinema, and visionary filmmakers across all Indian languages.">
    
    <!-- Tailwind CSS -->
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
                    },
                    fontFamily: {
                        display: ['Outfit', 'sans-serif'],
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/style.css">
    
    <style>
        .glass-panel {
            background: rgba(17, 19, 25, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .animate-fadeIn { animation: fadeIn 0.5s ease-out forwards; }
    </style>
</head>
<body class="bg-cinema-bg text-white font-sans antialiased selection:bg-cinema-accent selection:text-white min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 glass-panel border-b border-cinema-border/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Left: Logo & Navigation -->
                <div class="flex items-center gap-8">
                    <a href="<?php echo ROOT_PATH; ?>index.php" class="flex items-center gap-3 group text-left focus:outline-none">
                        <!-- Premium Cinematic Logo -->
                        <div class="group flex flex-col items-start select-none bg-transparent">
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <span class="font-sans font-black tracking-tight text-white flex items-center leading-none text-lg sm:text-xl">
                                    <span class="relative inline-block">
                                        <span>i</span>
                                        <span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]" />
                                    </span>
                                    <span>nd</span>
                                    <span class="relative inline-block">
                                        <span>i</span>
                                        <span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]" />
                                    </span>
                                    <span>an</span>
                                </span>

                                <div class="relative inline-flex items-center justify-center -rotate-2 transition-transform duration-200 group-hover:rotate-0 group-hover:scale-105">
                                    <svg viewBox="0 0 94 36" class="w-auto drop-shadow-md h-6 sm:h-6.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="navTicketGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stopColor="#f84464" />
                                                <stop offset="60%" stopColor="#dc2626" />
                                                <stop offset="100%" stopColor="#8b5cf6" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M 6 0 L 39 0 A 6 6 0 0 1 55 0 L 88 0 C 91.3 0 94 2.7 94 6 L 94 30 C 94 33.3 89.3 36 88 36 L 55 36 A 6 6 0 0 1 39 36 L 6 36 C 2.7 36 0 33.3 0 30 L 0 6 C 0 2.7 2.7 0 6 0 Z" fill="url(#navTicketGradient)" />
                                        <text x="11" y="24" fill="#ffffff" font-family="system-ui, -apple-system, sans-serif" font-weight="900" font-size="16.5" letter-spacing="-0.6px">short</text>
                                        <g transform="translate(64, 10)">
                                            <circle cx="8" cy="8" r="7.5" fill="#ffffff" />
                                            <polygon points="6.5,5 11.5,8 6.5,11" fill="#dc2626" />
                                        </g>
                                    </svg>
                                </div>

                                <span class="font-sans font-black tracking-tight text-white flex items-center leading-none text-lg sm:text-xl">
                                    <span>m</span><span>o</span><span>v</span>
                                    <span class="relative inline-block">
                                        <span>i</span>
                                        <span class="absolute -top-0.5 left-1/2 -translate-x-1/2 h-1.5 w-1.5 rounded-full bg-[#f84464] shadow-[0_0_8px_#f84464]" />
                                    </span>
                                    <span>e</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 mt-0.5 opacity-80">
                                <span class="h-px w-3 bg-[#e50914]/60" />
                                <span class="text-[8px] sm:text-[9px] font-bold tracking-[0.2em] text-gray-400 uppercase whitespace-nowrap">India's Stories on Screen</span>
                                <span class="h-px w-3 bg-[#e50914]/60" />
                            </div>
                        </div>
                    </a>

                    <!-- Desktop Navigation Links -->
                    <nav class="hidden md:flex items-center gap-6">
                        <a href="<?php echo ROOT_PATH; ?>index.php" class="text-sm font-medium transition-colors <?php echo $current_page == 'index' ? 'text-white font-bold' : 'text-cinema-muted hover:text-white'; ?>">Home</a>
                        <a href="<?php echo ROOT_PATH; ?>discover.php" class="text-sm font-medium transition-colors <?php echo $current_page == 'discover' ? 'text-white font-bold' : 'text-cinema-muted hover:text-white'; ?>">Discover</a>
                        <a href="<?php echo ROOT_PATH; ?>watchlist.php" class="text-sm font-medium transition-colors <?php echo $current_page == 'watchlist' ? 'text-white font-bold' : 'text-cinema-muted hover:text-white'; ?>">Watchlist</a>
                        <a href="<?php echo ROOT_PATH; ?>filmmakers.php" class="text-sm font-medium transition-colors <?php echo $current_page == 'filmmakers' ? 'text-white font-bold' : 'text-cinema-muted hover:text-white'; ?>">Filmmakers</a>
                        <a href="<?php echo ROOT_PATH; ?>admin/index.php" class="text-sm font-medium transition-colors <?php echo strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'text-white font-bold' : 'text-cinema-muted hover:text-white'; ?>">Admin</a>
                    </nav>
                </div>

                <!-- Right Action Controls -->
                <div class="hidden md:flex items-center gap-4">
                    <?php if (!is_logged_in()): ?>
                        <a href="<?php echo ROOT_PATH; ?>login.php" class="text-sm font-medium text-cinema-muted hover:text-white transition-colors">Sign In</a>
                    <?php else: ?>
                        <div class="relative group">
                            <button class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-cinema-surface transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-cinema-accent font-bold text-[10px]">
                                    <?php echo strtoupper(substr($_SESSION['user_name'], 0, 2)); ?>
                                </div>
                            </button>
                            <div class="absolute right-0 mt-2 w-56 bg-cinema-card border border-cinema-border rounded-2xl shadow-2xl py-3 z-50 overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <div class="px-4 py-3 border-b border-cinema-border/50 bg-white/5">
                                    <p class="text-xs font-black text-white uppercase tracking-tight"><?php echo $_SESSION['user_name']; ?></p>
                                    <p class="text-[10px] text-cinema-muted truncate"><?php echo $_SESSION['user_email']; ?></p>
                                    <span class="inline-block mt-1 px-1.5 py-0.5 rounded bg-cinema-accent/20 text-cinema-accent text-[8px] font-black uppercase tracking-widest"><?php echo $_SESSION['user_role']; ?></span>
                                </div>
                                <div class="py-1">
                                    <a href="<?php echo ROOT_PATH; ?>logout.php" class="w-full text-left px-4 py-2.5 text-xs text-red-400 hover:text-white hover:bg-red-500/10 flex items-center gap-3 transition-colors">Sign Out</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <a href="<?php echo ROOT_PATH; ?>submit.php" class="px-6 py-2.5 rounded-xl bg-cinema-accent hover:bg-cinema-accentHover border border-cinema-accent text-[10px] font-black uppercase tracking-widest text-white transition-all hover:scale-105 active:scale-95 shadow-lg shadow-cinema-accent/20">SUBMIT FILM</a>
                </div>

                <!-- Mobile Toggle -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-toggle" class="p-2 text-cinema-muted hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-cinema-surface border-b border-cinema-border p-4 space-y-3">
            <nav class="flex flex-col gap-2">
                <a href="<?php echo ROOT_PATH; ?>index.php" class="px-4 py-2 rounded-xl text-sm font-medium hover:bg-white/5">Home</a>
                <a href="<?php echo ROOT_PATH; ?>discover.php" class="px-4 py-2 rounded-xl text-sm font-medium hover:bg-white/5">Discover</a>
                <a href="<?php echo ROOT_PATH; ?>watchlist.php" class="px-4 py-2 rounded-xl text-sm font-medium hover:bg-white/5">Watchlist</a>
                <a href="<?php echo ROOT_PATH; ?>filmmakers.php" class="px-4 py-2 rounded-xl text-sm font-medium hover:bg-white/5">Filmmakers</a>
                <a href="<?php echo ROOT_PATH; ?>admin/index.php" class="px-4 py-2 rounded-xl text-sm font-medium hover:bg-white/5">Admin</a>
                <a href="<?php echo ROOT_PATH; ?>submit.php" class="px-4 py-2 rounded-xl text-sm font-black bg-cinema-accent text-white">SUBMIT FILM</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow">
