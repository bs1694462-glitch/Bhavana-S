import React from 'react';
import { ShortFilm } from '../types';
import { Star, Play, Trash2, Heart } from 'lucide-react';

interface WatchlistPageProps {
  films: ShortFilm[];
  savedFilmIds: string[];
  onSelectFilm: (film: ShortFilm) => void;
  onRemoveFromWatchlist: (id: string) => void;
  onNavigateTab: (tab: string) => void;
}

export const WatchlistPage: React.FC<WatchlistPageProps> = ({ 
  films, savedFilmIds, onSelectFilm, onRemoveFromWatchlist, onNavigateTab 
}) => {
  const languagePriority = (lang: string) => {
    if (lang === 'Kannada') return 0;
    const indianLangs = ['Hindi', 'Tamil', 'Telugu', 'Malayalam', 'Gujarati', 'Bengali', 'Marathi', 'Urdu', 'Odia', 'Punjabi'];
    if (indianLangs.includes(lang)) return 1;
    return 2;
  };

  const savedFilms = films
    .filter(f => savedFilmIds.includes(f.id))
    .sort((a, b) => {
      const pA = languagePriority(a.language);
      const pB = languagePriority(b.language);
      if (pA !== pB) return pA - pB;
      return 0;
    });

  return (
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10 animate-fadeIn">
      <div className="text-center space-y-3">
         <div className="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-cinema-accent/10 border border-cinema-accent/20 text-cinema-accent mb-2">
            <Heart className="w-8 h-8 fill-current" />
         </div>
         <h1 className="font-display font-black text-4xl text-white tracking-tight uppercase">My Watchlist</h1>
         <p className="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Your curated collection of Indian independent cinema</p>
      </div>

      {savedFilms.length === 0 ? (
        <div className="py-24 text-center bg-cinema-card rounded-3xl border border-white/5 space-y-6 shadow-2xl">
          <p className="text-cinema-muted font-bold uppercase tracking-[0.3em]">Your watchlist is waiting for stories</p>
          <button 
            onClick={() => onNavigateTab('films')}
            className="px-8 py-4 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-[10px] font-black uppercase tracking-[0.2em] transition-all shadow-xl"
          >
            Discover Films
          </button>
        </div>
      ) : (
        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
          {savedFilms.map(film => (
            <div key={film.id} className="group relative bg-cinema-card rounded-2xl overflow-hidden border border-white/5 hover:border-cinema-accent/50 transition-all shadow-xl">
               <div className="aspect-[2/3] relative overflow-hidden bg-cinema-surface">
                  <img src={film.posterUrl} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                  <div className="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center gap-4 transition-opacity">
                     <button onClick={() => onSelectFilm(film)} className="p-4 rounded-full bg-cinema-accent text-white shadow-2xl hover:scale-110 transition-transform">
                        <Play className="w-6 h-6 fill-current ml-1" />
                     </button>
                  </div>
                  <button 
                    onClick={() => onRemoveFromWatchlist(film.id)}
                    className="absolute top-3 right-3 p-2 rounded-xl bg-black/60 backdrop-blur-md text-white hover:text-red-500 transition-colors border border-white/10"
                  >
                    <Trash2 className="w-4 h-4" />
                  </button>
               </div>
               <div className="p-4 space-y-1">
                  <h3 className="font-bold text-sm text-white truncate group-hover:text-cinema-accent transition-colors">{film.title}</h3>
                  <div className="flex items-center justify-between text-[10px] uppercase font-black tracking-widest text-cinema-teal">
                     <span>{film.language}</span>
                     <span className="text-cinema-gold">★ {film.rating}</span>
                  </div>
               </div>
            </div>
          ))}
        </div>
      )}
    </div>
  );
};
