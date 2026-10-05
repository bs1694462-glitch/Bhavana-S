<?php
session_start();
require_once __DIR__ . '/../includes/functions.php';

if (is_admin()) {
    redirect('dashboard.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === 'admin@example.com' && $password === 'admin123') {
        $_SESSION['user_id'] = '1';
        $_SESSION['user_name'] = 'Admin';
        $_SESSION['user_email'] = 'admin@example.com';
        $_SESSION['user_role'] = 'ADMIN';
        redirect('dashboard.php');
    } else {
        $error = 'Invalid email or password.';
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
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cinema: { bg: '#07080b', surface: '#111319', card: '#181b24', border: '#262a36', accent: '#e50914' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cinema-bg text-white font-sans antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[440px] animate-fadeIn">
        <div class="bg-cinema-card border border-cinema-border rounded-[2.5rem] p-10 sm:p-12 shadow-2xl relative overflow-hidden">
            <!-- Background Accent -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-cinema-accent/10 rounded-full blur-[80px]"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-cinema-accent/5 rounded-full blur-[80px]"></div>

            <div class="relative z-10">
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-cinema-accent/10 border border-cinema-accent/20 text-cinema-accent mb-6 shadow-xl shadow-cinema-accent/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                    </div>
                    <h1 class="text-2xl font-black tracking-tight uppercase text-white mb-2">Admin Access</h1>
                    <p class="text-cinema-muted text-[10px] font-bold uppercase tracking-[0.2em]">Secure Gateway Portal</p>
                </div>

                <?php if ($error): ?>
                    <div class="mb-8 p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest text-center">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form action="index.php" method="POST" class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Authorized Email</label>
                        <input type="email" name="email" required placeholder="admin@example.com" 
                               class="w-full bg-cinema-surface border border-cinema-border rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-cinema-accent focus:ring-4 focus:ring-cinema-accent/5 transition-all placeholder:text-gray-700">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Access Key</label>
                        <input type="password" name="password" required placeholder="••••••••" 
                               class="w-full bg-cinema-surface border border-cinema-border rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-cinema-accent focus:ring-4 focus:ring-cinema-accent/5 transition-all placeholder:text-gray-700">
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-cinema-accent hover:bg-cinema-accentHover text-white font-black py-5 rounded-2xl transition-all shadow-xl shadow-cinema-accent/20 uppercase text-[11px] tracking-[0.2em] active:scale-[0.98]">
                            Authenticate Session
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="../index.php" class="text-gray-600 text-[10px] font-black uppercase tracking-[0.2em] hover:text-white transition-all flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Return to Cinema Home
            </a>
        </div>
    </div>

</body>
</html>
