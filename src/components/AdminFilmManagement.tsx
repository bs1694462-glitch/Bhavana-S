import React, { useState } from 'react';
import { ShortFilm } from '../types';
import { Search, Plus, Edit2, Trash2, Globe, EyeOff, Star, Filter } from 'lucide-react';

interface AdminFilmManagementProps {
  films: ShortFilm[];
  onUpdateFilms: (films: ShortFilm[]) => void;
  onSelectFilm: (film: ShortFilm) => void;
  onOpenSubmitFilm: () => void;
  onToast: (msg: string) => void;
  initialFilter?: string | null;
}

export const AdminFilmManagement: React.FC<AdminFilmManagementProps> = ({ 
  films, onUpdateFilms, onSelectFilm, onOpenSubmitFilm, onToast, initialFilter = null 
}) => {
  const [search, setSearch] = useState(initialFilter || '');
  const [filterLang, setFilterLang] = useState('All');

  React.useEffect(() => {
    if (initialFilter !== null) {
      setSearch(initialFilter);
    }
  }, [initialFilter]);

  const languagePriority = (lang: string) => {
    if (lang === 'Kannada') return 0;
    const indianLangs = ['Hindi', 'Tamil', 'Telugu', 'Malayalam', 'Gujarati', 'Bengali', 'Marathi', 'Urdu', 'Odia', 'Punjabi'];
    if (indianLangs.includes(lang)) return 1;
    return 2;
  };

  const filteredFilms = films
    .filter(f => 
      (
        f.title.toLowerCase().includes(search.toLowerCase()) || 
        f.director.toLowerCase().includes(search.toLowerCase()) ||
        f.genre.toLowerCase().includes(search.toLowerCase()) ||
        f.language.toLowerCase().includes(search.toLowerCase())
      ) &&
      (filterLang === 'All' || f.language === filterLang)
    )
    .sort((a, b) => {
      const pA = languagePriority(a.language);
      const pB = languagePriority(b.language);
      if (pA !== pB) return pA - pB;
      return 0;
    });

  const toggleStatus = (id: string) => {
    const updated = films.map(f => {
      if (f.id === id) {
        const newStatus = f.status === 'published' ? 'pending' : 'published';
        onToast(`Film ${newStatus === 'published' ? 'published' : 'unpublished'}`);
        return { ...f, status: newStatus as any };
      }
      return f;
    });
    onUpdateFilms(updated);
  };

  const deleteFilm = (id: string) => {
    if (window.confirm('Are you sure you want to remove this film from the platform?')) {
      onUpdateFilms(films.filter(f => f.id !== id));
      onToast('Film removed successfully');
    }
  };

  return (
    <div className="space-y-6">
      <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <h1 className="text-2xl font-black text-white tracking-tight uppercase">Film Management</h1>
          <p className="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Curate and moderate the cinematic catalog</p>
        </div>
        <button 
          onClick={onOpenSubmitFilm}
          className="px-6 py-3 rounded-2xl bg-cinema-accent hover:bg-cinema-accentHover text-white text-xs font-black uppercase tracking-widest shadow-xl flex items-center gap-2 transition-all active:scale-95"
        >
          <Plus className="w-4 h-4" />
          <span>Add New Film</span>
        </button>
      </div>

      <div className="bg-cinema-card rounded-[2rem] border border-white/5 overflow-hidden shadow-2xl">
        <div className="p-6 border-b border-white/5 flex flex-col md:flex-row gap-4 justify-between bg-white/[0.01]">
          <div className="relative flex-1 max-w-sm">
            <input 
              type="text" 
              placeholder="Search title, director..." 
              value={search}
              onChange={(e) => setSearch(e.target.value)}
              className="w-full bg-white/5 border border-white/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white focus:outline-none focus:border-cinema-accent transition-all" 
            />
            <Search className="w-4 h-4 text-cinema-muted absolute left-3.5 top-1/2 -translate-y-1/2" />
          </div>
          <div className="flex items-center gap-3">
             <Filter className="w-4 h-4 text-cinema-muted" />
              <select 
                value={filterLang}
                onChange={(e) => setFilterLang(e.target.value)}
                className="bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-[10px] font-bold text-white uppercase tracking-widest focus:outline-none focus:border-cinema-accent appearance-none cursor-pointer"
              >
                 <option value="All">All Languages</option>
                 <option value="Kannada">Kannada</option>
                 <option value="Hindi">Hindi</option>
                 <option value="Tamil">Tamil</option>
                 <option value="Telugu">Telugu</option>
                 <option value="Malayalam">Malayalam</option>
                 <option value="Gujarati">Gujarati</option>
              </select>
          </div>
        </div>

        <div className="overflow-x-auto">
          <table className="w-full text-left text-[10px] uppercase tracking-widest font-bold">
            <thead className="bg-white/[0.03] border-b border-white/5 text-cinema-muted">
              <tr>
                <th className="p-6">Film Detail</th>
                <th className="p-6">Language</th>
                <th className="p-6">Status</th>
                <th className="p-6 text-right">Actions</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-white/5">
              {filteredFilms.map(film => (
                <tr key={film.id} className="hover:bg-white/[0.02] transition-colors group">
                  <td className="p-6 flex items-center gap-4">
                    <div className="w-12 h-16 rounded-xl bg-cinema-surface border border-white/10 overflow-hidden shrink-0 group-hover:border-cinema-accent/50 transition-all">
                      <img src={film.posterUrl} className="w-full h-full object-cover" />
                    </div>
                    <div className="space-y-1">
                      <p className="text-sm font-black text-white normal-case tracking-tight group-hover:text-cinema-accent transition-colors">{film.title}</p>
                      <p className="text-[9px] text-cinema-muted">{film.director} • {film.releaseYear}</p>
                    </div>
                  </td>
                  <td className="p-6">
                    <span className={`${film.language === 'Kannada' ? 'text-cinema-accent font-black' : 'text-cinema-teal'}`}>
                      {film.language}
                    </span>
                  </td>
                  <td className="p-6">
                    <span className={`px-3 py-1 rounded-full border font-black ${
                      film.status === 'published' 
                        ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' 
                        : 'bg-cinema-gold/10 text-cinema-gold border-cinema-gold/20'
                    }`}>
                      {film.status}
                    </span>
                  </td>
                  <td className="p-6 text-right space-x-2">
                    <button 
                      onClick={() => toggleStatus(film.id)}
                      className="p-2.5 rounded-xl bg-white/5 hover:bg-cinema-accent text-cinema-muted hover:text-white transition-all border border-white/10"
                      title={film.status === 'published' ? 'Unpublish' : 'Publish'}
                    >
                      {film.status === 'published' ? <EyeOff className="w-4 h-4" /> : <Globe className="w-4 h-4" />}
                    </button>
                    <button 
                      onClick={() => onSelectFilm(film)}
                      className="p-2.5 rounded-xl bg-white/5 hover:bg-cinema-teal text-cinema-muted hover:text-white transition-all border border-white/10"
                    >
                      <Edit2 className="w-4 h-4" />
                    </button>
                    <button 
                      onClick={() => deleteFilm(film.id)}
                      className="p-2.5 rounded-xl bg-white/5 hover:bg-red-600 text-cinema-muted hover:text-white transition-all border border-white/10"
                    >
                      <Trash2 className="w-4 h-4" />
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};
