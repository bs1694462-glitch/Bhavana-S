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
        $_SESSION['user_id'] = '1';
        $_SESSION['user_name'] = 'Super Admin';
        $_SESSION['user_role'] = 'ADMIN';
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials. Access Denied.";
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #07080b; color: white; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8 bg-[#0c0d12] p-10 rounded-[2.5rem] border border-white/5 shadow-2xl animate-fadeIn relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f84464]/5 via-transparent to-transparent"></div>
        
        <div class="relative z-10 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-[2rem] bg-[#f84464] mb-8 shadow-2xl shadow-red-500/20">
                <span class="text-white font-black text-3xl">A</span>
            </div>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Admin Portal</h2>
            <p class="text-slate-400 text-[10px] mt-2 font-black uppercase tracking-[0.3em]">Restricted Access Area</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-2xl text-[10px] font-black uppercase tracking-widest text-center animate-pulse">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6 relative z-10" method="POST">
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5 ml-1">Administrator Email</label>
                    <input type="email" name="email" required class="w-full bg-[#12141d] border border-white/5 rounded-2xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-[#f84464] transition-all" placeholder="admin@example.com">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required class="w-full bg-[#12141d] border border-white/5 rounded-2xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-[#f84464] transition-all" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#f84464] hover:bg-[#ff5575] text-white font-black py-5 rounded-2xl text-[11px] uppercase tracking-[0.3em] transition-all shadow-2xl shadow-red-500/30 active:scale-95">
                Authenticate Securely
            </button>
            
            <div class="pt-2">
                <a href="../index.php" class="block text-center text-[10px] text-slate-500 hover:text-white uppercase font-black tracking-widest transition-colors">Return to Homepage</a>
            </div>
        </form>
    </div>
</body>
</html>
