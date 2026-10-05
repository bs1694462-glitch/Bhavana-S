<?php
include 'includes/header.php';

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
}
?>

<div class="max-w-4xl mx-auto px-4 py-12 animate-fadeIn">
    <?php if ($submitted): ?>
        <div class="bg-cinema-card border border-cinema-border rounded-[2rem] p-12 text-center shadow-2xl">
            <div class="w-20 h-20 rounded-[2rem] bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-500 mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">Submission Received</h2>
            <p class="text-cinema-muted max-w-sm mx-auto font-medium mb-8">Your film has been queued for curator review. You will receive an email once it is approved for publication.</p>
            <a href="index.php" class="inline-block px-10 py-4 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white font-black uppercase text-xs tracking-widest transition-all shadow-lg shadow-cinema-accent/20">Return Home</a>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col border border-gray-200">
            <div class="bg-white px-8 py-7 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10 text-gray-900">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#f84464] flex items-center justify-center text-white shadow-lg shadow-[#f84464]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"/><path d="m6.2 5.3 3.1 3.9"/><path d="m12.4 3.4 3.1 4"/><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-3">
                            <h2 class="text-2xl font-black uppercase tracking-tight">SUBMIT SHORT FILM</h2>
                            <span class="px-3 py-1 rounded-full bg-[#fff0f1] text-[#f84464] text-[10px] font-black uppercase tracking-widest border border-[#f84464]/10">Curator Review</span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mt-0.5">Official submission gateway for filmmakers</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 p-8 sm:p-10 bg-white text-gray-900">
                <div class="mb-10 p-6 bg-[#f0f7ff] border border-[#dbeafe] rounded-2xl flex gap-4">
                    <div class="w-6 h-6 rounded-full border-2 border-[#3b82f6] flex items-center justify-center text-[#3b82f6] shrink-0 mt-0.5">
                        <span class="font-serif italic font-bold text-xs">i</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#1e3a8a] mb-1">Admin Approval Workflow: <span class="font-medium text-[#1e3a8a]">All submissions undergo review before publication.</span></h4>
                    </div>
                </div>

                <form action="submit.php" method="POST" class="space-y-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Film Title *</label>
                            <input type="text" name="title" required placeholder="e.g. Kaveri The Hidden Current" class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-[#f84464]/5 transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Language</label>
                            <select name="language" class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all appearance-none cursor-pointer">
                                <option>Kannada</option>
                                <option>Hindi</option>
                                <option>Tamil</option>
                                <option>Telugu</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-[#f84464] hover:bg-[#d93454] text-white font-black py-6 rounded-2xl transition-all shadow-xl shadow-[#f84464]/20 flex items-center justify-center gap-3 active:scale-[0.98] uppercase text-sm tracking-[0.2em]">
                        <span>Initiate Submission</span>
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
