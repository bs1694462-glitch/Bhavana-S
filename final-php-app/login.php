<?php include 'includes/header.php'; ?>

<div class="max-w-md mx-auto py-20 px-4 animate-fadeIn">
    <div class="bg-cinema-card p-10 rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f84464]/5 via-transparent to-transparent"></div>
        
        <div class="relative z-10 text-center mb-10">
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Sign In</h2>
            <p class="text-cinema-muted text-[10px] mt-2 font-black uppercase tracking-[0.3em]">Welcome back to Indian Short Movie</p>
        </div>

        <form class="space-y-6 relative z-10" onsubmit="event.preventDefault(); alert('User authentication is currently in sandbox mode.')">
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-black text-cinema-muted uppercase tracking-widest mb-1.5 ml-1">Email Address</label>
                    <input type="email" required class="w-full bg-[#0c0d12] border border-white/5 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-[#f84464] transition-all" placeholder="name@example.com">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-cinema-muted uppercase tracking-widest mb-1.5 ml-1">Password</label>
                    <input type="password" required class="w-full bg-[#0c0d12] border border-white/5 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-[#f84464] transition-all" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#f84464] hover:bg-[#ff5575] text-white font-black py-5 rounded-2xl text-[11px] uppercase tracking-[0.3em] transition-all shadow-2xl shadow-red-500/30 active:scale-95">
                Sign In to Account
            </button>
            
            <div class="text-center pt-4">
                <p class="text-[10px] text-cinema-muted font-bold uppercase tracking-widest">Don't have an account? <a href="#" class="text-white hover:text-[#f84464] transition-colors">Join the Community</a></p>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
