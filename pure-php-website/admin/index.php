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
        $_SESSION['user_name'] = 'System Admin';
        $_SESSION['user_role'] = 'ADMIN';
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials. Please try again.";
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
    <div class="max-w-md w-full space-y-8 bg-[#0c0d12] p-10 rounded-[2.5rem] border border-white/5 shadow-2xl animate-fadeIn">
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-[#f84464] mb-6">
                <span class="text-white font-black text-2xl">A</span>
            </div>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Admin Portal</h2>
            <p class="text-slate-400 text-xs mt-2 font-medium uppercase tracking-widest">Authorized Access Only</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-xl text-xs font-bold text-center">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" method="POST">
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Admin Email</label>
                    <input type="email" name="email" required class="w-full bg-[#12141d] border border-white/5 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-[#f84464] transition-colors" placeholder="admin@example.com">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required class="w-full bg-[#12141d] border border-white/5 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-[#f84464] transition-colors" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#f84464] hover:bg-[#ff5575] text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest transition-all shadow-lg shadow-red-500/20">
                Secure Login
            </button>
            
            <a href="../index.php" class="block text-center text-[10px] text-slate-500 hover:text-white uppercase font-bold tracking-widest transition-colors">Return to Site</a>
        </form>
    </div>
</body>
</html>
