<?php
include 'includes/header.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Requirement: Login: admin@example.com / admin123
    if ($email === 'admin@example.com' && $password === 'admin123') {
        $_SESSION['user_id'] = 'admin-1';
        $_SESSION['user_name'] = 'System Administrator';
        $_SESSION['user_role'] = 'ADMIN';
        header("Location: admin/dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>

<div class="max-w-md mx-auto py-24 px-4 animate-fadeIn">
    <div class="bg-cinema-card p-10 sm:p-12 rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f84464]/10 via-transparent to-transparent"></div>
        
        <div class="relative z-10 space-y-10">
            <div class="text-center space-y-3">
                <div class="w-16 h-16 rounded-[1.5rem] bg-cinema-accent/10 border border-cinema-accent/20 flex items-center justify-center text-[#f84464] mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                </div>
                <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Sign In</h2>
                <p class="text-xs text-cinema-muted font-bold uppercase tracking-widest">Access your personalized portal</p>
            </div>

            <?php if ($error): ?>
                <div class="p-4 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-400 text-[10px] font-black uppercase text-center tracking-widest">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-1">Email Address</label>
                    <input type="email" name="email" required class="w-full bg-[#0c0d12] border border-white/10 rounded-2xl px-6 py-4 text-xs font-bold text-white outline-none focus:border-[#f84464] transition-all" placeholder="admin@example.com">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 px-1">Password</label>
                    <input type="password" name="password" required class="w-full bg-[#0c0d12] border border-white/10 rounded-2xl px-6 py-4 text-xs font-bold text-white outline-none focus:border-[#f84464] transition-all" placeholder="••••••••">
                </div>
                <button type="submit" class="w-full py-5 rounded-2xl bg-[#f84464] hover:bg-[#ff5575] text-white text-xs font-black uppercase tracking-[0.2em] transition-all shadow-2xl shadow-red-500/20 active:scale-95">Verify & Continue</button>
            </form>
            
            <div class="pt-4 text-center">
                <p class="text-[10px] text-slate-600 font-bold uppercase tracking-widest">Enterprise Authentication System</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
