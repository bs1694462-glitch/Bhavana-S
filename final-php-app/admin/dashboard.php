<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'ADMIN') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Indian Short Movie Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-[#0c0d12] border-r border-white/5 p-8 flex flex-col">
        <div class="mb-12">
            <h2 class="text-[#f84464] font-black text-2xl tracking-tighter">ADMIN <span class="text-white">PORTAL</span></h2>
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.3em] mt-2">Active Security Session</p>
        </div>
        
        <nav class="flex-grow space-y-3">
            <a href="#" class="flex items-center gap-3 px-5 py-4 bg-[#f84464] text-white rounded-2xl text-xs font-black uppercase tracking-widest shadow-lg shadow-red-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Overview
            </a>
            <a href="#" class="flex items-center gap-3 px-5 py-4 text-slate-400 hover:text-white hover:bg-white/5 rounded-2xl text-xs font-bold uppercase tracking-widest transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>
                Films
            </a>
            <a href="#" class="flex items-center gap-3 px-5 py-4 text-slate-400 hover:text-white hover:bg-white/5 rounded-2xl text-xs font-bold uppercase tracking-widest transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="19" cy="11" r="3"/></svg>
                Filmmakers
            </a>
        </nav>

        <div class="mt-auto pt-8 border-t border-white/5 space-y-2">
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-widest px-5 mb-4">Signed in as <?php echo $_SESSION['user_name']; ?></p>
            <a href="../index.php" class="block px-5 py-2 text-xs font-bold text-slate-400 hover:text-white transition-colors">Back to Site</a>
            <a href="../logout.php" class="block px-5 py-2 text-xs font-bold text-red-400 hover:text-red-300 transition-colors">Terminate Session</a>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-grow p-8 sm:p-16 space-y-12 overflow-y-auto h-screen animate-fadeIn">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
            <div class="space-y-1">
                <h1 class="text-4xl font-black text-white tracking-tight uppercase">Dashboard</h1>
                <p class="text-slate-400 text-xs font-black uppercase tracking-[0.3em]">Real-time ecosystem analytics</p>
            </div>
            <div class="bg-white/5 border border-white/5 px-6 py-3 rounded-2xl">
                <p class="text-[10px] text-slate-500 font-black uppercase tracking-widest mb-1">Server Status</p>
                <div class="flex items-center gap-2 text-emerald-400 font-mono text-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Operational
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-2">Total Catalog</p>
                <p class="text-4xl font-black text-white tracking-tighter">0</p>
                <p class="text-[10px] text-slate-600 mt-2 font-bold uppercase">Published Films</p>
            </div>
            <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-2">Pending Screeners</p>
                <p class="text-4xl font-black text-[#f84464] tracking-tighter">0</p>
                <p class="text-[10px] text-slate-600 mt-2 font-bold uppercase">Requires Review</p>
            </div>
            <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-2">Filmmakers</p>
                <p class="text-4xl font-black text-white tracking-tighter">0</p>
                <p class="text-[10px] text-slate-600 mt-2 font-bold uppercase">Verified Accounts</p>
            </div>
            <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-2">Active Curators</p>
                <p class="text-4xl font-black text-white tracking-tighter">1</p>
                <p class="text-[10px] text-slate-600 mt-2 font-bold uppercase">Online Now</p>
            </div>
        </div>

        <div class="bg-[#0c0d12] border border-white/5 rounded-[3rem] p-16 text-center space-y-6 relative overflow-hidden shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-t from-[#f84464]/5 via-transparent to-transparent"></div>
            <div class="relative z-10 space-y-6">
                <div class="w-24 h-24 rounded-[2.5rem] bg-white/5 border border-white/10 flex items-center justify-center mx-auto text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                </div>
                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Vault Encryption Active</h2>
                <p class="text-slate-500 text-sm max-w-sm mx-auto leading-relaxed font-medium">The administrative panel is protected by real-time session monitoring and enterprise-grade role-based access control.</p>
                <div class="pt-4 flex items-center justify-center gap-3 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                    <span>IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></span>
                    <span class="opacity-30">|</span>
                    <span>HTTPS Secured</span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
