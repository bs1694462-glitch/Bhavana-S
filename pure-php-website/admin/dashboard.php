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
    <title>Admin Dashboard - Indian Short Movie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-[#0c0d12] border-r border-white/5 p-6 flex flex-col">
        <div class="mb-8">
            <h2 class="text-[#f84464] font-black text-xl tracking-tighter">ADMIN <span class="text-white">PORTAL</span></h2>
            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">Role-Based Access</p>
        </div>
        
        <nav class="flex-grow space-y-2">
            <a href="#" class="block px-4 py-3 bg-[#f84464] text-white rounded-xl text-xs font-black uppercase tracking-widest">Overview</a>
            <a href="#" class="block px-4 py-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl text-xs font-bold uppercase tracking-widest transition-all">Films</a>
            <a href="#" class="block px-4 py-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl text-xs font-bold uppercase tracking-widest transition-all">Filmmakers</a>
            <a href="#" class="block px-4 py-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl text-xs font-bold uppercase tracking-widest transition-all">Settings</a>
        </nav>

        <div class="mt-auto pt-6 border-t border-white/5">
            <a href="../index.php" class="block px-4 py-2 text-xs font-bold text-slate-400 hover:text-white mb-2">Back to Site</a>
            <a href="../logout.php" class="block px-4 py-2 text-xs font-bold text-red-400 hover:text-red-300">Logout</a>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-grow p-8 sm:p-12 space-y-12 overflow-y-auto h-screen">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight uppercase">Dashboard Overview</h1>
                <p class="text-slate-400 text-xs mt-1 font-medium uppercase tracking-[0.2em]">Real-time platform metrics</p>
            </div>
            <div class="text-right">
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Server Time</p>
                <p class="text-sm font-mono text-white"><?php echo date('Y-m-d H:i:s'); ?></p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-[#12141d] p-6 rounded-[2rem] border border-white/5">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Total Films</p>
                <p class="text-3xl font-black text-white">0</p>
            </div>
            <div class="bg-[#12141d] p-6 rounded-[2rem] border border-white/5">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Pending Submissions</p>
                <p class="text-3xl font-black text-[#f84464]">0</p>
            </div>
            <div class="bg-[#12141d] p-6 rounded-[2rem] border border-white/5">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Filmmakers</p>
                <p class="text-3xl font-black text-white">0</p>
            </div>
            <div class="bg-[#12141d] p-6 rounded-[2rem] border border-white/5">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Active Users</p>
                <p class="text-3xl font-black text-white">1</p>
            </div>
        </div>

        <div class="bg-[#0c0d12] border border-white/5 rounded-[2.5rem] p-12 text-center space-y-4">
            <div class="w-20 h-20 rounded-[2rem] bg-white/5 flex items-center justify-center mx-auto text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
            </div>
            <h2 class="text-xl font-black text-white uppercase tracking-tight">Security Active</h2>
            <p class="text-slate-500 text-xs max-w-xs mx-auto leading-relaxed">The administrative panel is protected by real-time session monitoring and role-based access control.</p>
        </div>
    </main>
</body>
</html>
