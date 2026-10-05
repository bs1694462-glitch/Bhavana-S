/**
 * Indian Short Movie - Vanilla JavaScript
 */

// Modal Handlers
function openVideoModal(title, meta) {
    const modal = document.getElementById('global-video-modal');
    const modalTitle = document.getElementById('modal-film-title');
    const modalMeta = document.getElementById('modal-film-meta');
    
    if (modal && modalTitle && modalMeta) {
        modalTitle.textContent = title;
        modalMeta.textContent = meta;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

function closeVideoModal() {
    const modal = document.getElementById('global-video-modal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }
}

// Watchlist Logic (LocalStorage)
function toggleWatchlist(filmId) {
    let watchlist = JSON.parse(localStorage.getItem('ism_watchlist') || '[]');
    const index = watchlist.indexOf(filmId);
    
    if (index === -1) {
        watchlist.push(filmId);
        showToast('Added to watchlist');
    } else {
        watchlist.splice(index, 1);
        showToast('Removed from watchlist');
    }
    
    localStorage.setItem('ism_watchlist', JSON.stringify(watchlist));
    updateWatchlistUI();
}

function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed bottom-6 right-6 z-[300] flex items-center gap-2.5 px-4 py-3 rounded-2xl bg-cinema-card border border-cinema-border text-white text-xs font-semibold shadow-2xl animate-slideUp';
    toast.innerHTML = `
        <div class="w-2 h-2 rounded-full bg-cinema-accent shadow-[0_0_8px_#e50914]"></div>
        <span>${message}</span>
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// Initialize components
document.addEventListener('DOMContentLoaded', () => {
    // Header transparency on scroll
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.style.background = 'rgba(17, 19, 25, 0.95)';
        } else {
            header.style.background = 'rgba(17, 19, 25, 0.85)';
        }
    });

    // Close modal on escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeVideoModal();
    });
});
