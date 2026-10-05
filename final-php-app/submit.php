<?php
include 'includes/header.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_film = [
        'id' => 'film-' . time(),
        'title' => $_POST['title'] ?? 'Untitled',
        'director' => $_POST['director'] ?? 'Unknown',
        'language' => $_POST['language'] ?? 'Unknown',
        'genre' => $_POST['genre'] ?? 'Other',
        'synopsis' => $_POST['synopsis'] ?? '',
        'releaseYear' => (int)($_POST['releaseYear'] ?? date('Y')),
        'posterUrl' => $_POST['posterUrl'] ?? 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?w=800&auto=format&fit=crop&q=60',
        'backdropUrl' => $_POST['backdropUrl'] ?? '',
        'status' => 'pending',
        'rating' => 0.0,
        'viewsCount' => 0,
        'likesCount' => 0
    ];
    
    save_film($new_film);
    $message = "Your film has been submitted successfully and is now in the review queue!";
}
?>

<div class="max-w-4xl mx-auto px-4 py-16 animate-fadeIn">
    <div class="bg-white rounded-[3rem] overflow-hidden shadow-2xl relative">
        <div class="bg-gradient-to-br from-[#f84464] to-[#8b5cf6] px-10 py-12 text-white">
            <h1 class="text-4xl font-black uppercase tracking-tighter leading-none mb-4">Submit Your Film</h1>
            <p class="text-white/80 text-sm font-medium max-w-xl">Join India's most prestigious independent short film catalog. Your submission will be reviewed by our expert curators within 48-72 hours.</p>
        </div>

        <?php if ($message): ?>
            <div class="p-10 bg-emerald-50 border-b border-emerald-100 flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <p class="text-emerald-800 font-bold text-sm uppercase tracking-tight"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" class="p-10 sm:p-16 space-y-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Film Title</label>
                    <input type="text" name="title" required class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold" placeholder="e.g. Mungaru Male">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Director Name</label>
                    <input type="text" name="director" required class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold" placeholder="e.g. Yogaraj Bhat">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Language</label>
                    <select name="language" required class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold">
                        <option value="Kannada">Kannada (ಕನ್ನಡ)</option>
                        <option value="Hindi">Hindi (हिन्दी)</option>
                        <option value="Tamil">Tamil (தமிழ்)</option>
                        <option value="Telugu">Telugu (తెలుగు)</option>
                        <option value="Malayalam">Malayalam (മലയാളം)</option>
                        <option value="Bengali">Bengali (বাংলা)</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Genre</label>
                    <select name="genre" required class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold">
                        <option value="Drama">Drama</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Romance">Romance</option>
                        <option value="Action">Action</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Poster URL</label>
                    <input type="url" name="posterUrl" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold" placeholder="https://unsplash.com/...">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Release Year</label>
                    <input type="number" name="releaseYear" value="<?php echo date('Y'); ?>" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Synopsis</label>
                <textarea name="synopsis" rows="4" required class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-200 focus:border-[#f84464] outline-none transition-all text-slate-900 font-bold" placeholder="Briefly describe the story of your short film..."></textarea>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full py-5 rounded-2xl bg-slate-900 hover:bg-black text-white text-xs font-black uppercase tracking-[0.2em] transition-all shadow-2xl active:scale-95">Send for Curator Review</button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
