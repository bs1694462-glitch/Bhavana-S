import React from 'react';
import { ShortFilm, Creator } from '../types';
import { Play, Info, Star, TrendingUp, Clock, Grid, Award, ArrowRight } from 'lucide-react';

interface HomePageProps {
  films: ShortFilm[];
  creators: Creator[];
  onSelectFilm: (film: ShortFilm) => void;
  onNavigateTab: (tab: string, filter?: string | null) => void;
  onSelectCreator: (creator: Creator) => void;
}

export const HomePage: React.FC<HomePageProps> = ({ films, creators, onSelectFilm, onNavigateTab, onSelectCreator }) => {
  // ... existing code ...
  // Helper to prioritize Kannada and Sort
  const languagePriority = (lang: string) => {
    if (lang === 'Kannada') return 0;
    const indianLangs = ['Hindi', 'Tamil', 'Telugu', 'Malayalam', 'Gujarati', 'Bengali', 'Marathi', 'Urdu', 'Odia', 'Punjabi'];
    if (indianLangs.includes(lang)) return 1;
    return 2;
  };

  // 1. Top Rated Section (Sorted by rating, then Kannada priority)
  const topRated = [...films].sort((a, b) => {
    if (b.rating !== a.rating) return b.rating - a.rating;
    return languagePriority(a.language) - languagePriority(b.language);
  }).slice(0, 6);

  // 2. Trending Section (Sorted by views, then Kannada priority)
  const trending = [...films].sort((a, b) => {
    if (b.viewsCount !== a.viewsCount) return b.viewsCount - a.viewsCount;
    return languagePriority(a.language) - languagePriority(b.language);
  }).slice(0, 6);

  // 3. Recently Added (Assuming newest are at the end of the list or have higher IDs)
  const recentlyAdded = [...films].reverse().sort((a, b) => {
     return languagePriority(a.language) - languagePriority(b.language);
  }).slice(0, 6);

  const genres = [
    { name: 'Drama', desc: 'Short Films & Docs' },
    { name: 'Thriller', desc: 'Short Films & Docs' },
    { name: 'Mystery', desc: 'Short Films & Docs' },
    { name: 'Comedy', desc: 'Short Films & Docs' },
    { name: 'Folk Folklore', desc: 'Short Films & Docs' },
    { name: 'Documentary', desc: 'Short Films & Docs' },
    { name: 'Romance', desc: 'Short Films & Docs' },
    { name: 'Action', desc: 'Short Films & Docs' },
    { name: 'Indie Experimental', desc: 'Short Films & Docs' },
    { name: 'Kannada (ಕನ್ನಡ)', desc: 'Regional Excellence', isLang: true },
    { name: 'Hindi (हिन्दी)', desc: 'Bollywood Heart', isLang: true },
    { name: 'Tamil (தமிழ்)', desc: 'Kollywood Vision', isLang: true },
    { name: 'Telugu (తెలుగు)', desc: 'Tollywood Power', isLang: true },
    { name: 'Malayalam (മലയാളം)', desc: 'Realistic Stories', isLang: true },
    { name: 'Gujarati (ગુજરાતી)', desc: 'Urban Narratives', isLang: true }
  ];

  const handleGenreClick = (genre: string) => {
    // If it's a language, we strip the native script for search consistency or use it directly
    const filter = genre.split(' (')[0];
    onNavigateTab('films', filter);
  };

  const featured = films.find(f => f.isFeatured) || films[0];

  return (
    <div className="space-y-16 pb-20">
      {/* Hero Spotlight */}
      {featured && (
        <section className="relative rounded-3xl overflow-hidden border border-cinema-border bg-cinema-card shadow-2xl h-[480px] sm:h-[540px]">
          <img src={featured.backdropUrl} className="absolute inset-0 w-full h-full object-cover" />
          <div className="absolute inset-0 bg-gradient-to-t from-[#07080b] via-[#07080b]/60 to-transparent" />
          <div className="absolute inset-0 bg-gradient-to-r from-[#07080b] via-[#07080b]/80 to-transparent" />
          
          <div className="absolute bottom-0 left-0 right-0 p-8 sm:p-12 max-w-3xl space-y-6">
            <div className="flex items-center gap-3">
              <span className="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-cinema-accent text-white shadow-lg">Featured</span>
              <span className="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-cinema-surface/80 border border-cinema-border text-cinema-teal uppercase tracking-widest">{featured.language}</span>
            </div>
            <h1 className="font-display font-black text-4xl sm:text-6xl text-white tracking-tight leading-none">{featured.title}</h1>
            <p className="text-sm text-gray-300 line-clamp-3 leading-relaxed max-w-xl">{featured.synopsis}</p>
            <div className="flex items-center gap-4 pt-2">
              <button 
                onClick={() => onSelectFilm(featured)}
                className="px-8 py-4 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-xs font-black uppercase tracking-widest shadow-2xl flex items-center gap-2 transition-all active:scale-95"
              >
                <Play className="w-4 h-4 fill-current" />
                <span>Watch Film</span>
              </button>
              <button className="px-6 py-4 rounded-2xl bg-cinema-surface/90 hover:bg-cinema-surface text-white text-xs font-black uppercase tracking-widest border border-cinema-border flex items-center gap-2 transition-all backdrop-blur-md">
                <Info className="w-4 h-4" />
                <span>Details</span>
              </button>
            </div>
          </div>
        </section>
      )}

      {/* 1. TOP RATED CINEMA */}
      {topRated.length > 0 && (
        <section id="top-rated" className="space-y-6">
          <div className="flex items-center justify-between border-l-4 border-cinema-gold pl-4">
            <div className="flex items-center gap-3">
              <Star className="w-6 h-6 text-cinema-gold" />
              <h2 className="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Top Rated Cinema</h2>
            </div>
            <button 
              onClick={() => onNavigateTab('films')}
              className="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors"
            >
              Explore All
            </button>
          </div>
          <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            {topRated.map(film => (
              <FilmCard key={film.id} film={film} onSelect={onSelectFilm} />
            ))}
          </div>
        </section>
      )}

      {/* 2. TRENDING NOW */}
      {trending.length > 0 && (
        <section id="trending" className="space-y-6">
          <div className="flex items-center justify-between border-l-4 border-cinema-accent pl-4">
            <div className="flex items-center gap-3">
              <TrendingUp className="w-6 h-6 text-cinema-accent" />
              <h2 className="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Trending Now</h2>
            </div>
            <button 
              onClick={() => onNavigateTab('films')}
              className="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors"
            >
              Explore All
            </button>
          </div>
          <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            {trending.map(film => (
              <FilmCard key={film.id} film={film} onSelect={onSelectFilm} />
            ))}
          </div>
        </section>
      )}

      {/* 3. RECENTLY ADDED STORIES */}
      {recentlyAdded.length > 0 && (
        <section id="recent" className="space-y-6">
          <div className="flex items-center justify-between border-l-4 border-cinema-teal pl-4">
            <div className="flex items-center gap-3">
              <Clock className="w-6 h-6 text-cinema-teal" />
              <h2 className="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Recently Added Stories</h2>
            </div>
            <button 
              onClick={() => onNavigateTab('films')}
              className="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors"
            >
              Explore All
            </button>
          </div>
          <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            {recentlyAdded.map(film => (
              <FilmCard key={film.id} film={film} onSelect={onSelectFilm} />
            ))}
          </div>
        </section>
      )}

      {/* 4. EXPLORE GENRES */}
      <section id="genres" className="space-y-6">
        <div className="flex items-center justify-between border-l-4 border-purple-500 pl-4">
          <div className="flex items-center gap-3">
            <Grid className="w-6 h-6 text-purple-500" />
            <h2 className="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Explore Genres</h2>
          </div>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {genres.map((genre, idx) => (
            <div 
              key={idx}
              onClick={() => handleGenreClick(genre.name)}
              className={`group relative overflow-hidden rounded-2xl border transition-all cursor-pointer shadow-xl p-6 ${
                genre.isLang 
                  ? 'bg-white border-gray-200 hover:border-cinema-accent' 
                  : 'bg-cinema-card border-cinema-border hover:border-cinema-accent'
              }`}
            >
              <div className="absolute inset-0 bg-gradient-to-br from-cinema-accent/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
              <h3 className={`text-xl font-black transition-colors mb-1 ${genre.isLang ? 'text-black' : 'text-white group-hover:text-cinema-accent'}`}>{genre.name}</h3>
              <p className={`text-xs uppercase tracking-widest font-bold ${genre.isLang ? 'text-gray-500' : 'text-cinema-muted'}`}>{genre.desc}</p>
            </div>
          ))}
        </div>
      </section>

      {/* VISIONARY FILMMAKERS */}
      {creators.length > 0 && (
        <section id="filmmakers" className="space-y-8">
          <div className="flex items-center justify-between border-l-4 border-cinema-teal pl-4">
            <div className="flex items-center gap-3">
              <Award className="w-6 h-6 text-cinema-teal" />
              <h2 className="font-display font-black text-2xl sm:text-3xl text-white tracking-tight uppercase">Visionary Filmmakers</h2>
            </div>
            <button 
              onClick={() => onNavigateTab('filmmakers')}
              className="text-[10px] font-bold text-cinema-teal hover:text-white uppercase tracking-widest transition-colors flex items-center gap-1"
            >
              <span>View All</span>
              <ArrowRight className="w-3 h-3" />
            </button>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {creators.slice(0, 2).map(creator => (
              <div 
                key={creator.id}
                onClick={() => onSelectCreator(creator)}
                className="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden flex flex-col sm:flex-row items-center gap-8"
              >
                <div className="relative shrink-0">
                  <div className="w-32 h-32 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                    <img src={creator.avatar} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                  </div>
                  <div className="absolute -bottom-2 -right-2 w-8 h-8 rounded-xl bg-cinema-accent flex items-center justify-center text-white shadow-lg border border-white/10">
                    <Award className="w-4 h-4" />
                  </div>
                </div>
                <div className="space-y-4 text-center sm:text-left">
                  <div>
                    <h3 className="text-2xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight">{creator.name}</h3>
                    <p className="text-xs text-cinema-muted font-black uppercase tracking-widest">{creator.handle}</p>
                  </div>
                  <p className="text-sm text-cinema-muted line-clamp-2 leading-relaxed font-medium">{creator.bio}</p>
                  <div className="flex items-center justify-center sm:justify-start gap-4">
                    <span className="text-[10px] font-bold text-white bg-white/5 px-3 py-1.5 rounded-lg border border-white/5 uppercase tracking-widest">
                      {films.filter(f => f.director.includes(creator.name)).length} Productions
                    </span>
                    <span className="text-[10px] font-bold text-cinema-teal bg-cinema-teal/5 px-3 py-1.5 rounded-lg border border-cinema-teal/10 uppercase tracking-widest">
                      {(creator.followersCount / 1000).toFixed(1)}K Followers
                    </span>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </section>
      )}
    </div>
  );
};

const FilmCard = ({ film, onSelect }: { film: ShortFilm, onSelect: (f: ShortFilm) => void }) => (
  <div 
    onClick={() => onSelect(film)}
    className="bg-cinema-card rounded-2xl overflow-hidden border border-cinema-border group hover:border-cinema-gold/50 transition-all cursor-pointer flex flex-col shadow-xl relative"
  >
    <div className="relative aspect-[2/3] w-full overflow-hidden bg-cinema-surface">
      <img src={film.posterUrl} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
      <div className="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <div className="w-12 h-12 rounded-full bg-cinema-accent/90 flex items-center justify-center shadow-2xl scale-75 group-hover:scale-100 transition-transform duration-300">
           <Play className="w-5 h-5 text-white fill-current ml-1" />
        </div>
      </div>
      <div className="absolute top-2 right-2 px-2 py-0.5 rounded-md text-[10px] font-black bg-black/70 backdrop-blur-md text-cinema-gold border border-white/10 flex items-center gap-1">
        <Star className="w-2.5 h-2.5 fill-current" />
        {film.rating.toFixed(1)}
      </div>
      {film.language === 'Kannada' && (
        <span className="absolute top-2 left-2 px-2 py-0.5 rounded-md text-[8px] font-black uppercase bg-cinema-accent text-white border border-white/10 shadow-lg z-10">
          Kannada First
        </span>
      )}
    </div>
    <div className="p-4 space-y-2 flex-1 flex flex-col justify-between">
      <div>
        {film.localTitle && film.language === 'Kannada' && (
          <p className="text-cinema-accent text-[10px] font-black uppercase tracking-tight mb-1">{film.localTitle}</p>
        )}
        <h3 className="font-bold text-xs text-white truncate group-hover:text-cinema-accent transition-colors tracking-tight">{film.title}</h3>
        <span className="text-[10px] text-cinema-muted block truncate font-medium">{film.director}</span>
      </div>
      <div className="flex items-center justify-between text-[10px] pt-1">
        <span className={`${film.language === 'Kannada' ? 'text-cinema-accent font-black' : 'text-cinema-teal font-bold'} uppercase tracking-widest`}>
          {film.language}
        </span>
        <span className="text-cinema-muted font-mono">{film.releaseYear}</span>
      </div>
    </div>
  </div>
);
