<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Short Movie - India's Stories on Screen</title>
    <meta name="description" content="Dedicated platform celebrating independent storytelling, short cinema, and visionary filmmakers across all Indian languages.">
    <link rel="icon" type="image/svg+xml" href="/img/vite.svg">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CDN for exact design preservation -->
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
                    },
                    animation: {
                        fadeIn: 'fadeIn 0.5s ease-out forwards',
                        slideUp: 'slideUp 0.4s ease-out forwards',
                        scaleIn: 'scaleIn 0.3s ease-out forwards'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-cinema-bg text-white font-sans antialiased min-h-screen flex flex-col selection:bg-cinema-accent selection:text-white">

    <!-- Sticky Header -->
    <header class="sticky top-0 z-[100] transition-all duration-300 glass-panel border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="index.php" class="flex items-center gap-3 group">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cinema-accent to-[#ff3c47] flex items-center justify-center shadow-lg shadow-cinema-accent/20 group-hover:scale-110 transition-transform duration-500">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 8 6 4-6 4Z"/></svg>
                        </div>
                        <div class="absolute -inset-1 bg-cinema-accent/20 blur-lg rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex flex-col -space-y-1">
                        <span class="font-display font-black text-xl tracking-tighter text-white">INDIAN <span class="text-cinema-accent">SHORT</span></span>
                        <span class="font-display font-black text-xl tracking-tighter text-white">MOVIE</span>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="index.php" class="text-xs font-black uppercase tracking-[0.2em] hover:text-cinema-accent transition-colors">Home</a>
                    <a href="discover.php" class="text-xs font-black uppercase tracking-[0.2em] hover:text-cinema-accent transition-colors">Discover</a>
                    <a href="filmmakers.php" class="text-xs font-black uppercase tracking-[0.2em] hover:text-cinema-accent transition-colors">Filmmakers</a>
                    <a href="watchlist.php" class="text-xs font-black uppercase tracking-[0.2em] hover:text-cinema-accent transition-colors">Watchlist</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <button onclick="window.location.href='submit.php'" class="hidden sm:flex items-center gap-2 px-5 py-2.5 rounded-xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-[10px] font-black uppercase tracking-widest shadow-lg shadow-cinema-accent/25 transition-all active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                        <span>Submit Film</span>
                    </button>
                    
                    <button class="p-2.5 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cinema-muted"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow">
