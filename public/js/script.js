/**
 * Indian Short Movie - Vanilla JavaScript Core Script
 * Production Ready: Home, About, Gallery/Projects, Contact, and Admin Portal
 */

// Default Seed Catalog
const DEFAULT_FILMS = [];

// LocalStorage Helper
function getFilms() {
  try {
    const saved = localStorage.getItem('ism_films');
    if (saved) return JSON.parse(saved);
  } catch (e) {
    console.error(e);
  }
  return DEFAULT_FILMS;
}

function saveFilms(films) {
  try {
    localStorage.setItem('ism_films', JSON.stringify(films));
  } catch (e) {
    console.error(e);
  }
}

// Global Modal Handlers
function openVideoModal(filmId) {
  const films = getFilms();
  const film = films.find(f => f.id === filmId) || films[0];
  const modal = document.getElementById('global-video-modal');
  const modalTitle = document.getElementById('modal-film-title');
  const modalVideo = document.getElementById('modal-video-player');

  if (modal && modalVideo && film) {
    modalTitle.textContent = film.title + ' (' + film.duration + ')';
    modalVideo.src = film.videoUrl || 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4';
    modal.classList.add('active');
    modalVideo.play().catch(e => console.log('Autoplay prevented', e));
  }
}

function closeVideoModal() {
  const modal = document.getElementById('global-video-modal');
  const modalVideo = document.getElementById('modal-video-player');
  if (modal && modalVideo) {
    modalVideo.pause();
    modalVideo.src = '';
    modal.classList.remove('active');
  }
}

// Carousel Scroll Handlers
function scrollTrack(trackId, direction) {
  const track = document.getElementById(trackId);
  if (track) {
    const amount = direction === 'next' ? 400 : -400;
    track.scrollBy({ left: amount, behavior: 'smooth' });
  }
}

// Mobile Menu Toggle
function toggleMobileNav() {
  const menu = document.getElementById('mobile-nav-menu');
  if (menu) {
    menu.classList.toggle('active');
  }
}

// Contact Form Submission
function handleContactSubmit(e) {
  e.preventDefault();
  const name = document.getElementById('contact-name')?.value;
  const email = document.getElementById('contact-email')?.value;
  const message = document.getElementById('contact-message')?.value;
  const alertBox = document.getElementById('contact-alert');

  if (!name || !email || !message) {
    alert('Please fill out all required fields.');
    return;
  }

  // Save to messages store
  const existingMsgs = JSON.parse(localStorage.getItem('ism_contact_messages') || '[]');
  existingMsgs.unshift({
    id: 'msg-' + Date.now(),
    name,
    email,
    message,
    date: new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })
  });
  localStorage.setItem('ism_contact_messages', JSON.stringify(existingMsgs));

  if (alertBox) {
    alertBox.style.display = 'block';
    alertBox.textContent = 'Thank you! Your message has been received. Our team will contact you shortly.';
  }

  e.target.reset();
}

// Init Page Logic on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
  // Ensure starting at top without delay
  window.scrollTo(0, 0);

  // Close modal on escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeVideoModal();
  });
});
