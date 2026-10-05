<?php
session_start();
include_once '../includes/functions.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'ADMIN') {
    header("Location: index.php");
    exit();
}

$tab = $_GET['tab'] ?? 'overview';
$films = get_films();
$pending_films = get_films('pending');
$approved_films = get_films('approved');
$creators = get_creators();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $film_id = $_POST['film_id'];
    $action = $_POST['action'];
    
    foreach ($films as &$f) {
        if ($f['id'] === $film_id) {
            if ($action === 'approve') $f['status'] = 'approved';
            if ($action === 'reject') $f['status'] = 'rejected';
            break;
        }
    }
    save_json_data('films', $films);
    header("Location: dashboard.php?tab=" . $tab);
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; -webkit-font-smoothing: antialiased; }
        .glass { background: rgba(12, 13, 18, 0.8); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-72 bg-[#0c0d12] border-r border-white/5 p-8 flex flex-col sticky top-0 h-screen">
        <div class="mb-10">
            <h2 class="text-[#f84464] font-black text-2xl tracking-tighter">ADMIN <span class="text-white">PORTAL</span></h2>
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.3em] mt-2">Enterprise Security Active</p>
        </div>
        
        <nav class="flex-grow space-y-2">
            <a href="?tab=overview" class="flex items-center justify-between px-5 py-4 rounded-2xl text-xs font-black uppercase tracking-widest transition-all <?php echo $tab == 'overview' ? 'bg-[#f84464] text-white shadow-lg shadow-red-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    <span>Overview</span>
                </div>
            </a>
            <a href="?tab=submissions" class="flex items-center justify-between px-5 py-4 rounded-2xl text-xs font-black uppercase tracking-widest transition-all <?php echo $tab == 'submissions' ? 'bg-[#f84464] text-white shadow-lg shadow-red-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    <span>Submissions</span>
                </div>
                <?php if (count($pending_films) > 0): ?>
                    <span class="bg-white/10 text-white text-[10px] px-2 py-0.5 rounded-md"><?php echo count($pending_films); ?></span>
                <?php endif; ?>
            </a>
            <a href="?tab=films" class="flex items-center justify-between px-5 py-4 rounded-2xl text-xs font-black uppercase tracking-widest transition-all <?php echo $tab == 'films' ? 'bg-[#f84464] text-white shadow-lg shadow-red-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>
                    <span>Catalog</span>
                </div>
            </a>
            <a href="?tab=filmmakers" class="flex items-center justify-between px-5 py-4 rounded-2xl text-xs font-black uppercase tracking-widest transition-all <?php echo $tab == 'filmmakers' ? 'bg-[#f84464] text-white shadow-lg shadow-red-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="19" cy="11" r="3"/></svg>
                    <span>Filmmakers</span>
                </div>
            </a>
        </nav>

        <div class="mt-auto pt-8 border-t border-white/5 space-y-3">
            <div class="flex items-center gap-3 px-5 mb-4">
                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-[10px] font-black text-slate-400"><?php echo substr($_SESSION['user_name'], 0, 2); ?></div>
                <div class="min-w-0">
                    <p class="text-[10px] text-white font-black uppercase truncate"><?php echo $_SESSION['user_name']; ?></p>
                    <p class="text-[8px] text-slate-500 font-bold uppercase tracking-widest">Administrator</p>
                </div>
            </div>
            <a href="../index.php" class="flex items-center gap-2 px-5 py-2 text-xs font-bold text-slate-400 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                <span>Back to Site</span>
            </a>
            <a href="../logout.php" class="flex items-center gap-2 px-5 py-2 text-xs font-bold text-red-400 hover:text-red-300 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow p-10 md:p-16 space-y-12 overflow-y-auto h-screen animate-fadeIn">
        
        <?php if ($tab === 'overview'): ?>
            <div class="space-y-12">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
                    <div class="space-y-1">
                        <h1 class="text-4xl font-black text-white tracking-tight uppercase leading-none">System Overview</h1>
                        <p class="text-slate-400 text-xs font-black uppercase tracking-[0.3em]">Real-time ecosystem analytics</p>
                    </div>
                    <div class="bg-white/5 border border-white/5 px-6 py-3 rounded-2xl flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
                        <span class="text-[10px] text-white font-black uppercase tracking-widest">Network Secure</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Total Catalog</p>
                        <p class="text-5xl font-black text-white tracking-tighter"><?php echo count($approved_films); ?></p>
                        <div class="h-1 w-12 bg-[#f84464] rounded-full"></div>
                    </div>
                    <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Pending Review</p>
                        <p class="text-5xl font-black text-[#f84464] tracking-tighter"><?php echo count($pending_films); ?></p>
                        <div class="h-1 w-12 bg-[#f84464] rounded-full"></div>
                    </div>
                    <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Filmmakers</p>
                        <p class="text-5xl font-black text-white tracking-tighter"><?php echo count($creators); ?></p>
                        <div class="h-1 w-12 bg-cinema-teal rounded-full"></div>
                    </div>
                    <div class="bg-[#12141d] p-8 rounded-[2.5rem] border border-white/5 shadow-xl space-y-4">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Data Points</p>
                        <p class="text-5xl font-black text-white tracking-tighter"><?php echo count($films) * 12; ?></p>
                        <div class="h-1 w-12 bg-cinema-gold rounded-full"></div>
                    </div>
                </div>

                <div class="bg-[#0c0d12] border border-white/5 rounded-[3rem] p-16 text-center space-y-8 relative overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#f84464]/5 via-transparent to-transparent opacity-30"></div>
                    <div class="relative z-10 space-y-6">
                        <div class="w-24 h-24 rounded-[2.5rem] bg-white/5 border border-white/10 flex items-center justify-center mx-auto text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                        </div>
                        <div class="space-y-2">
                            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Vault Encryption Active</h2>
                            <p class="text-slate-500 text-sm max-w-sm mx-auto leading-relaxed font-medium">The administrative panel is protected by real-time session monitoring and role-based access control.</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($tab === 'submissions'): ?>
            <div class="space-y-12">
                <div class="space-y-1">
                    <h1 class="text-4xl font-black text-white tracking-tight uppercase leading-none">Submissions Queue</h1>
                    <p class="text-slate-400 text-xs font-black uppercase tracking-[0.3em]">Screen and moderate new film applications</p>
                </div>

                <?php if (empty($pending_films)): ?>
                    <div class="py-32 text-center bg-[#12141d] rounded-[3rem] border border-white/5 border-dashed">
                        <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-6 text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <h2 class="text-xl font-black text-white uppercase tracking-tight">Queue Clear</h2>
                        <p class="text-slate-500 text-xs uppercase tracking-widest mt-2 font-bold">No new submissions requiring review</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 gap-6">
                        <?php foreach($pending_films as $film): ?>
                            <div class="bg-[#12141d] rounded-3xl border border-white/5 p-6 flex items-center gap-8 shadow-xl">
                                <img src="<?php echo $film['posterUrl']; ?>" class="w-24 h-32 object-cover rounded-xl shadow-lg" />
                                <div class="flex-grow space-y-2">
                                    <h3 class="text-xl font-black text-white uppercase tracking-tight"><?php echo $film['title']; ?></h3>
                                    <div class="flex items-center gap-4 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                        <span><?php echo $film['director']; ?></span>
                                        <span class="opacity-30">|</span>
                                        <span><?php echo $film['language']; ?></span>
                                        <span class="opacity-30">|</span>
                                        <span class="text-cinema-teal"><?php echo $film['genre']; ?></span>
                                    </div>
                                    <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed max-w-2xl"><?php echo $film['synopsis']; ?></p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="film_id" value="<?php echo $film['id']; ?>">
                                        <input type="hidden" name="action" value="approve">
                                        <button type="submit" class="px-6 py-3 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] font-black uppercase tracking-widest hover:bg-emerald-500 hover:text-white transition-all">Approve</button>
                                    </form>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="film_id" value="<?php echo $film['id']; ?>">
                                        <input type="hidden" name="action" value="reject">
                                        <button type="submit" class="px-6 py-3 rounded-xl bg-red-500/10 text-red-400 border border-red-500/20 text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">Reject</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        <?php elseif ($tab === 'films'): ?>
            <div class="space-y-12">
                <div class="space-y-1">
                    <h1 class="text-4xl font-black text-white tracking-tight uppercase leading-none">Film Catalog</h1>
                    <p class="text-slate-400 text-xs font-black uppercase tracking-[0.3em]">Manage all published stories</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach($approved_films as $film): ?>
                        <div class="bg-[#12141d] rounded-3xl border border-white/5 p-6 space-y-4 shadow-xl">
                            <div class="flex items-center gap-4">
                                <img src="<?php echo $film['posterUrl']; ?>" class="w-16 h-20 object-cover rounded-lg" />
                                <div class="min-w-0">
                                    <h3 class="text-lg font-black text-white uppercase tracking-tight truncate"><?php echo $film['title']; ?></h3>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase truncate"><?php echo $film['director']; ?></p>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                                <span class="text-[10px] font-black text-cinema-teal uppercase"><?php echo $film['language']; ?></span>
                                <button class="text-[10px] font-black text-red-400 uppercase hover:text-red-300">Unpublish</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </main>
</body>
</html>
