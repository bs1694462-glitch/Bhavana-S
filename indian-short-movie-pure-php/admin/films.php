<?php
include 'header.php';

$films = get_films();
?>

<div class="space-y-8 animate-fadeIn">
    <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black tracking-tight uppercase">Film Management</h1>
            <p class="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Curate and moderate the cinematic catalog</p>
        </div>
        <button class="px-6 py-3 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-[10px] font-black uppercase tracking-widest shadow-xl transition-all active:scale-95">
            Add New Film
        </button>
    </header>

    <div class="bg-cinema-card rounded-[2rem] border border-cinema-border overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-white/5 text-cinema-muted uppercase font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4">Film Detail</th>
                    <th class="px-6 py-4">Language</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php foreach($films as $film): ?>
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-14 rounded-lg bg-cinema-surface overflow-hidden border border-white/10 shrink-0">
                                <img src="<?php echo $film['posterUrl']; ?>" class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <p class="font-black text-white uppercase tracking-tight"><?php echo $film['title']; ?></p>
                                <p class="text-cinema-muted"><?php echo $film['director']; ?> • <?php echo $film['releaseYear']; ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold text-cinema-teal"><?php echo $film['language']; ?></td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-black uppercase text-[10px]">
                                <?php echo $film['status']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 text-cinema-muted hover:text-white transition-colors">Edit</button>
                            <button class="p-2 text-red-400 hover:text-red-500 transition-colors">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
