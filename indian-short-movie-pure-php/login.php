<?php
session_start();
require_once __DIR__ . '/includes/functions.php';

if (is_logged_in()) {
    redirect('index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mock login for normal user
    if ($email === 'user@example.com' && $password === 'password') {
        $_SESSION['user_id'] = '2';
        $_SESSION['user_name'] = 'Demo User';
        $_SESSION['user_email'] = 'user@example.com';
        $_SESSION['user_role'] = 'USER';
        redirect('index.php');
    } else if ($email === 'admin@example.com' && $password === 'admin123') {
        $_SESSION['user_id'] = '1';
        $_SESSION['user_name'] = 'Admin';
        $_SESSION['user_email'] = 'admin@example.com';
        $_SESSION['user_role'] = 'ADMIN';
        redirect('index.php');
    } else {
        $error = 'Invalid credentials. Try admin@example.com / admin123';
    }
}

include 'includes/header.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex items-center justify-center animate-fadeIn">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black tracking-tight uppercase mb-2">Welcome Back</h1>
            <p class="text-gray-500 text-sm font-bold uppercase tracking-widest">Sign in to your account</p>
        </div>

        <div class="bg-cinema-card border border-cinema-border rounded-[2rem] p-8 sm:p-10 shadow-2xl">
            <?php if ($error): ?>
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500 text-xs font-bold text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Email Address</label>
                    <input type="email" name="email" required placeholder="user@example.com" 
                           class="w-full bg-cinema-surface border border-cinema-border rounded-xl px-5 py-4 text-sm focus:outline-none focus:border-cinema-accent transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" 
                           class="w-full bg-cinema-surface border border-cinema-border rounded-xl px-5 py-4 text-sm focus:outline-none focus:border-cinema-accent transition-all">
                </div>

                <button type="submit" class="w-full bg-cinema-accent hover:bg-cinema-accentHover text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-cinema-accent/20 uppercase text-xs tracking-widest active:scale-[0.98]">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
