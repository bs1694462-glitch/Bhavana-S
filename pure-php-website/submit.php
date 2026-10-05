<?php include 'includes/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-12 animate-fadeIn">
    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl">
        <!-- Header -->
        <div class="bg-white px-8 py-7 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-[#f84464] flex items-center justify-center text-white shadow-lg shadow-red-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"/><line x1="16" y1="8" x2="2" y2="22"/><line x1="17.5" y1="15" x2="9" y2="15"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tighter leading-none">Submit Short Film / Movie</h2>
                    <div class="inline-flex items-center gap-1.5 px-2 py-0.5 mt-1.5 rounded-lg bg-[#f84464]/10 text-[#f84464] text-[10px] font-black uppercase tracking-widest border border-[#f84464]/20">
                        Curator Review
                    </div>
                </div>
            </div>
            <a href="index.php" class="p-2 rounded-xl hover:bg-gray-100 transition-colors text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </a>
        </div>

        <div class="p-8 sm:p-10 space-y-10">
            <!-- Info Box -->
            <div class="bg-[#f0f7ff] border border-[#bcdfff] rounded-3xl p-6 flex gap-5">
                <div class="shrink-0 w-12 h-12 rounded-2xl bg-[#007bff] flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <div class="space-y-1">
                    <h3 class="text-base font-black text-[#004085] uppercase tracking-tight">Admin Approval Workflow</h3>
                    <p class="text-xs text-[#004085]/70 leading-relaxed font-medium">All submissions undergo rigorous curator review. Once approved by the admin panel, your film will be featured on the platform catalog and filmmaker directory.</p>
                </div>
            </div>

            <form class="space-y-8 text-black">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Film Title</label>
                        <input type="text" placeholder="Enter full movie name" class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-sm font-bold focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-red-500/5 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Format</label>
                        <select class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-sm font-bold focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-red-500/5 transition-all appearance-none">
                            <option>Short Film</option>
                            <option>Documentary</option>
                            <option>Experimental</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Master Video File / Web URL</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-3xl p-10 text-center space-y-4 hover:border-[#f84464] hover:bg-red-500/5 transition-all group">
                        <div class="w-12 h-12 rounded-2xl bg-[#f84464]/10 flex items-center justify-center text-[#f84464] mx-auto group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        </div>
                        <div class="space-y-1">
                            <p class="text-sm font-black text-gray-900">Direct upload or provide URL</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">MP4, MOV, WebM (Max 2GB)</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Promotional Poster / Web URL</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-3xl p-10 text-center space-y-4 hover:border-[#f84464] hover:bg-red-500/5 transition-all group">
                        <div class="w-12 h-12 rounded-2xl bg-[#f84464]/10 flex items-center justify-center text-[#f84464] mx-auto group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                        <div class="space-y-1">
                            <p class="text-sm font-black text-gray-900">Choose Poster Image</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">JPG, PNG, WEBP (Vertical Recommended)</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Logline / Catchy Hook</label>
                        <input type="text" placeholder="One sentence summary of your film" class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-sm font-bold focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-red-500/5 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Short Caption</label>
                        <textarea rows="4" placeholder="Describe your creative vision and background..." class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-sm font-bold focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-red-500/5 transition-all"></textarea>
                    </div>
                </div>

                <button type="button" onclick="alert('Submission received for review!')" class="w-full bg-[#f84464] hover:bg-[#ff5575] text-white font-black py-5 rounded-[2rem] text-xs uppercase tracking-[0.2em] transition-all shadow-2xl shadow-red-500/30">
                    Verify & Submit Production
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
