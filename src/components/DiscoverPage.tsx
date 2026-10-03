import React, { useState, useEffect } from 'react';
import { ShortFilm } from '../types';
import { Search, Filter, Star, Play, Grid, List, Globe } from 'lucide-react';

interface DiscoverPageProps {
  films: ShortFilm[];
  onSelectFilm: (film: ShortFilm) => void;
}

export const DiscoverPage: React.FC<DiscoverPageProps> = ({ films, onSelectFilm }) => {
  const [search, setSearch] = useState('');
  const [filterLang, setFilterLang] = useState('All');
  const [filterGenre, setFilterGenre] = useState('All');
  const [viewMode, setViewMode] = useState<'grid' | 'list'>('grid');

  useEffect(() => {
    // Check for filter in URL
    const params = new URLSearchParams(window.location.search);
    const filter = params.get('filter');
    if (filter) {
      if (['Kannada', 'Hindi', 'Telugu', 'Tamil', 'Malayalam', 'Marathi', 'Bengali', 'Gujarati', 'Punjabi', 'Odia', 'Assamese'].includes(filter)) {
        setFilterLang(filter);
      } else if (['Drama', 'Thriller', 'Mystery', 'Comedy', 'Folk Folklore', 'Documentary', 'Romance', 'Action', 'Indie Experimental'].includes(filter)) {
        setFilterGenre(filter);
      }
    }
  }, []);

  const languagePriority = (lang: string) => {
    if (lang === 'Kannada') return 0;
    const indianLangs = ['Hindi', 'Telugu', 'Tamil', 'Malayalam', 'Marathi', 'Bengali', 'Gujarati', 'Punjabi', 'Odia', 'Assamese', 'Urdu'];
    const idx = indianLangs.indexOf(lang);
    if (idx !== -1) return idx + 1;
    return 100;
  };

  const filteredFilms = films
    .filter(f => 
      (f.title.toLowerCase().includes(search.toLowerCase()) || f.director.toLowerCase().includes(search.toLowerCase())) &&
      (filterLang === 'All' || f.language === filterLang) &&
      (filterGenre === 'All' || f.genre === filterGenre) &&
      f.status === 'published'
    )
    .sort((a, b) => {
      const pA = languagePriority(a.language);
      const pB = languagePriority(b.language);
      if (pA !== pB) return pA - pB;
      return b.rating - a.rating;
    });

  const genres = ['All', 'Drama', 'Thriller', 'Mystery', 'Comedy', 'Folk Folklore', 'Documentary', 'Romance', 'Action', 'Indie Experimental'];
  const languages = ['All', 'Kannada', 'Hindi', 'Telugu', 'Tamil', 'Malayalam', 'Marathi', 'Bengali', 'Gujarati', 'Punjabi', 'Odia', 'Assamese'];

  return (
    <div className="space-y-10">
      <div className="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div className="space-y-3">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-accent/10 border border-cinema-accent/20 text-cinema-accent text-[10px] font-black uppercase tracking-widest">
            <Globe className="w-3 h-3" />
            <span>Discover Cinema</span>
          </div>
          <h1 className="font-display font-black text-5xl text-white tracking-tight uppercase leading-none">Film Catalog</h1>
          <p className="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">Explore the best of Indian independent storytelling</p>
        </div>
        
        <div className="flex items-center gap-2 bg-white/5 p-1.5 rounded-2xl border border-white/5">
          <button 
            onClick={() => setViewMode('grid')}
            className={`p-2.5 rounded-xl transition-all ${viewMode === 'grid' ? 'bg-cinema-accent text-white' : 'text-cinema-muted hover:text-white'}`}
          >
            <Grid className="w-5 h-5" />
          </button>
          <button 
            onClick={() => setViewMode('list')}
            className={`p-2.5 rounded-xl transition-all ${viewMode === 'list' ? 'bg-cinema-accent text-white' : 'text-cinema-muted hover:text-white'}`}
          >
            <List className="w-5 h-5" />
          </button>
        </div>
      </div>

      <div className="bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 shadow-2xl space-y-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div className="md:col-span-2 relative group">
            <input 
              type="text" 
              placeholder="Search by title, director or cast..." 
              value={search}
              onChange={(e) => setSearch(e.target.value)}
              className="w-full bg-white/5 border border-white/10 rounded-2xl pl-12 pr-6 py-4 text-sm text-white focus:outline-none focus:border-cinema-accent focus:ring-4 focus:ring-cinema-accent/10 transition-all placeholder-white/20"
            />
            <Search className="w-5 h-5 text-cinema-muted absolute left-4 top-1/2 -translate-y-1/2 group-focus-within:text-cinema-accent transition-colors" />
          </div>

          <div className="relative">
            <select 
              value={filterLang}
              onChange={(e) => setFilterLang(e.target.value)}
              className="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm text-white focus:outline-none focus:border-cinema-accent transition-all appearance-none cursor-pointer"
            >
              {languages.map(l => <option key={l} value={l}>{l === 'All' ? 'All Languages' : l}</option>)}
            </select>
            <Globe className="w-4 h-4 text-cinema-muted absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none" />
          </div>

          <div className="relative">
            <select 
              value={filterGenre}
              onChange={(e) => setFilterGenre(e.target.value)}
              className="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm text-white focus:outline-none focus:border-cinema-accent transition-all appearance-none cursor-pointer"
            >
              {genres.map(g => <option key={g} value={g}>{g === 'All' ? 'All Genres' : g}</option>)}
            </select>
            <Filter className="w-4 h-4 text-cinema-muted absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none" />
          </div>
        </div>

        <div className="flex flex-wrap gap-2">
           <span className="text-[10px] font-black text-cinema-muted uppercase tracking-widest mr-2 py-2">Quick Filters:</span>
           {['Kannada', 'Hindi', 'Telugu', 'Tamil'].map(l => (
             <button 
               key={l}
               onClick={() => setFilterLang(l)}
               className={`px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest transition-all border ${filterLang === l ? 'bg-cinema-accent border-cinema-accent text-white' : 'bg-white/5 border-white/5 text-cinema-muted hover:text-white'}`}
             >
               {l}
             </button>
           ))}
        </div>
      </div>

      {filteredFilms.length === 0 ? (
        <div className="py-24 text-center bg-cinema-card rounded-[3rem] border border-white/5 space-y-6">
           <div className="w-20 h-20 rounded-[2rem] bg-white/5 flex items-center justify-center text-cinema-muted mx-auto">
              <Search className="w-8 h-8" />
           </div>
           <div className="space-y-2">
              <h3 className="text-xl font-black text-white uppercase">No productions found</h3>
              <p className="text-cinema-muted text-sm max-w-xs mx-auto">Try adjusting your filters or search query to discover more independent films.</p>
           </div>
        </div>
      ) : (
        <div className={viewMode === 'grid' ? "grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8" : "space-y-6"}>
          {filteredFilms.map(film => (
            <div 
              key={film.id}
              onClick={() => onSelectFilm(film)}
              className={`group bg-cinema-card rounded-[2rem] border border-white/5 overflow-hidden hover:border-cinema-accent/50 transition-all shadow-2xl cursor-pointer ${viewMode === 'list' ? 'flex items-center gap-8 p-4' : ''}`}
            >
              <div className={`relative overflow-hidden bg-cinema-surface ${viewMode === 'grid' ? 'aspect-[2/3]' : 'w-32 h-44 shrink-0 rounded-2xl'}`}>
                <img src={film.posterUrl} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                <div className="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                   <div className="w-12 h-12 rounded-full bg-cinema-accent flex items-center justify-center text-white">
                      <Play className="w-6 h-6 fill-current ml-1" />
                   </div>
                </div>
                {film.language === 'Kannada' && (
                  <span className="absolute top-3 left-3 px-2 py-0.5 rounded bg-cinema-accent text-white text-[7px] font-black uppercase tracking-widest z-10">Kannada</span>
                )}
              </div>
              
              <div className={`p-6 space-y-4 ${viewMode === 'list' ? 'flex-1 p-0' : ''}`}>
                 <div className="space-y-1">
                    {film.localTitle && film.language === 'Kannada' && (
                      <p className="text-cinema-accent text-[8px] font-black uppercase tracking-widest">{film.localTitle}</p>
                    )}
                    <h3 className="text-lg font-black text-white group-hover:text-cinema-accent transition-colors truncate uppercase tracking-tighter">{film.title}</h3>
                    <p className="text-[10px] text-cinema-muted font-bold uppercase tracking-widest">{film.director} • {film.releaseYear}</p>
                 </div>
                 
                 {viewMode === 'list' && (
                   <p className="text-xs text-cinema-muted line-clamp-2 max-w-2xl">{film.synopsis}</p>
                 )}

                 <div className="flex items-center justify-between pt-4 border-t border-white/5">
                    <span className="text-[9px] font-black text-cinema-teal uppercase tracking-[0.2em]">{film.language}</span>
                    <div className="flex items-center gap-1.5 px-2 py-0.5 rounded bg-black/40 border border-white/5">
                       <Star className="w-3 h-3 text-cinema-gold fill-current" />
                       <span className="text-[10px] font-black text-white">{film.rating}</span>
                    </div>
                 </div>
              </div>
            </div>
          ))}
        </div>
      )}
    </div>
  );
};
