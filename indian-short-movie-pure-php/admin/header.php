<?php
require_once __DIR__ . '/../includes/functions.php';

if (!is_admin()) {
    redirect('index.php');
}

$active_tab = basename($_SERVER['PHP_SELF'], ".php");
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
                        cinema: { bg: '#07080b', surface: '#111319', card: '#181b24', border: '#262a36', accent: '#e50914', teal: '#66fcf1', gold: '#ffb703', muted: '#8e95a5' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cinema-bg text-white font-sans antialiased">

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-cinema-surface border-r border-cinema-border p-6 flex flex-col justify-between">
            <div class="space-y-8">
                <div class="flex items-center gap-3 pb-6 border-b border-white/5">
                    <div class="w-8 h-8 rounded-lg bg-cinema-accent flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                    </div>
                    <h2 class="font-bold text-sm tracking-tight uppercase">Admin Portal</h2>
                </div>

                <nav class="space-y-1.5">
                    <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-xs font-bold transition-all <?php echo $active_tab == 'dashboard' ? 'bg-cinema-accent text-white shadow-lg shadow-cinema-accent/20' : 'text-cinema-muted hover:text-white hover:bg-white/5'; ?>">
                        <span>Overview</span>
                    </a>
                    <a href="films.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-xs font-bold transition-all <?php echo $active_tab == 'films' ? 'bg-cinema-accent text-white shadow-lg shadow-cinema-accent/20' : 'text-cinema-muted hover:text-white hover:bg-white/5'; ?>">
                        <span>Film Management</span>
                    </a>
                </nav>
            </div>

            <div class="pt-6 border-t border-white/5 space-y-2">
                <a href="../index.php" class="flex items-center gap-3 px-4 py-2 text-xs font-bold text-cinema-muted hover:text-white transition-all">Back to Site</a>
                <a href="logout.php" class="flex items-center gap-3 px-4 py-2 text-xs font-bold text-red-400 hover:text-white transition-all">Sign Out</a>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-8 overflow-y-auto">
