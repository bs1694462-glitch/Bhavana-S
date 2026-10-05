<?php
session_start();
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {
    header("Location: dashboard.php");
    exit();
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($email === 'admin@example.com' && $password === 'admin123') {
        $_SESSION['user_id'] = 'admin-1';
        $_SESSION['user_name'] = 'System Administrator';
        $_SESSION['user_role'] = 'ADMIN';
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Access Denied: Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Indian Short Movie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; -webkit-font-smoothing: antialiased; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-[url('https://images.unsplash.com/photo-1485846234645-a62644f84728?w=1600&auto=format&fit=crop&q=60')] bg-cover bg-center">
    <div class="absolute inset-0 bg-[#07080b]/90 backdrop-blur-sm"></div>
    
    <div class="max-w-md w-full bg-[#0c0d12] p-12 rounded-[3rem] border border-white/5 shadow-2xl relative z-10 animate-fadeIn">
        <div class="text-center mb-10 space-y-4">
            <h1 class="text-[#f84464] font-black text-3xl tracking-tighter uppercase">Admin <span class="text-white">Portal</span></h1>
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.3em]">Restricted Access Area</p>
        </div>

        <?php if ($error): ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-400 text-[10px] font-black uppercase text-center tracking-widest">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-1">Email</label>
                <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-xs font-bold text-white outline-none focus:border-[#f84464] transition-all" placeholder="admin@example.com">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-1">Password</label>
                <input type="password" name="password" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-xs font-bold text-white outline-none focus:border-[#f84464] transition-all" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full py-5 rounded-2xl bg-[#f84464] hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-[0.2em] transition-all shadow-2xl shadow-red-500/20 active:scale-95">Enter Vault</button>
        </form>

        <div class="mt-10 pt-8 border-t border-white/5 text-center">
            <a href="../index.php" class="text-[10px] font-black text-slate-500 hover:text-white uppercase tracking-widest transition-colors flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                Back to Site
            </a>
        </div>
    </div>
</body>
</html>
