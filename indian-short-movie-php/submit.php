<?php
include 'includes/header.php';
?>

<div class="max-w-5xl mx-auto px-4 py-12 animate-fadeIn">
    <div class="relative w-full bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col border border-gray-200">
        <!-- Header -->
        <div class="bg-white px-8 py-7 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-[#f84464] flex items-center justify-center text-white shadow-lg shadow-[#f84464]/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"/><path d="m6.2 5.3 3.1 3.9"/><path d="m12.4 3.4 3.1 4"/><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">SUBMIT SHORT FILM / MOVIE</h2>
                        <span class="px-3 py-1 rounded-full bg-[#fff0f1] text-[#f84464] text-[10px] font-black uppercase tracking-widest border border-[#f84464]/10">Curator Review</span>
                    </div>
                    <p class="text-sm text-gray-500 font-medium mt-0.5">Official submission gateway for filmmakers, creators, and production houses</p>
                </div>
            </div>
            <button onclick="window.history.back()" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 transition-all cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 p-8 sm:p-10 bg-white">
            <!-- Admin Approval Workflow -->
            <div class="mb-10 p-6 bg-[#f0f7ff] border border-[#dbeafe] rounded-2xl flex gap-4">
                <div class="w-6 h-6 rounded-full border-2 border-[#3b82f6] flex items-center justify-center text-[#3b82f6] shrink-0 mt-0.5">
                    <span class="font-serif italic font-bold text-xs">i</span>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#1e3a8a] mb-1">Admin Approval Workflow: <span class="font-medium">All submissions undergo review before public publication. Only approved films will appear on the OTT homepage and browsing catalogs.</span></h4>
                </div>
            </div>

            <form action="#" method="POST" class="space-y-10">
                <!-- Title and Format Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Film Title <span class="text-red-500">*</span></label>
                        <input type="text" required placeholder="e.g. Kaveri The Hidden Current" class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-[#f84464]/5 transition-all placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Format</label>
                        <div class="relative">
                            <select class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all appearance-none cursor-pointer">
                                <option>Short Film</option>
                                <option>Documentary</option>
                                <option>Web Series</option>
                                <option>Reel / Vertical</option>
                            </select>
                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video and Poster Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Master Video -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between px-1">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f84464]"><path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/></svg>
                                <label class="text-xs font-black text-gray-700 uppercase tracking-widest">Master Video <span class="text-red-500">*</span></label>
                            </div>
                            <div class="flex bg-gray-100 p-1 rounded-xl">
                                <button type="button" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all bg-[#f84464] shadow-md text-white">File Upload</button>
                                <button type="button" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all text-gray-500 hover:text-gray-700">Web URL</button>
                            </div>
                        </div>
                        
                        <div class="bg-[#f9fafb] border border-gray-100 rounded-3xl p-2">
                            <div class="relative group cursor-pointer border-2 border-dashed border-gray-200 rounded-[1.5rem] p-12 text-center hover:border-[#f84464] transition-all bg-white">
                                <input type="file" accept="video/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f84464]"><path d="M12 5v14M5 12h14"/></svg>
                                </div>
                                <p class="text-sm font-black text-gray-900">Choose Video (MP4, MOV, WebM)</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Direct upload to local storage</p>
                            </div>
                        </div>
                    </div>

                    <!-- Promotional Poster -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between px-1">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f84464]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                <label class="text-xs font-black text-gray-700 uppercase tracking-widest">Promotional Poster</label>
                            </div>
                            <div class="flex bg-gray-100 p-1 rounded-xl">
                                <button type="button" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all bg-[#f84464] shadow-md text-white">File Upload</button>
                                <button type="button" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all text-gray-500 hover:text-gray-700">Web URL</button>
                            </div>
                        </div>
                        
                        <div class="bg-[#f9fafb] border border-gray-100 rounded-3xl p-2">
                            <div class="relative group cursor-pointer border-2 border-dashed border-gray-200 rounded-[1.5rem] p-12 text-center hover:border-[#f84464] transition-all bg-white">
                                <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f84464]"><path d="M12 5v14M5 12h14"/></svg>
                                </div>
                                <p class="text-sm font-black text-gray-900">Choose Poster (JPG, PNG)</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">2:3 vertical or 16:9 recommended</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Row: Logline and Caption -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Logline / Catchy Hook</label>
                        <textarea placeholder="One-sentence hook summarizing the central conflict" class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all min-h-[100px] resize-none placeholder:text-gray-400"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Short Caption</label>
                        <textarea placeholder="Short social / catalog blurb" class="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all min-h-[100px] resize-none placeholder:text-gray-400"></textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#f84464] hover:bg-[#d93454] text-white font-black py-6 rounded-2xl transition-all shadow-xl shadow-[#f84464]/20 flex items-center justify-center gap-3 group active:scale-[0.98] uppercase text-sm tracking-[0.2em]">
                        <span>Initiate Submission</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
