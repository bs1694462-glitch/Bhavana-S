import React from 'react';
import { ShortFilm } from '../types';
import { Clock, CheckCircle, XCircle, Play, ArrowRight } from 'lucide-react';

interface AdminSubmissionsQueueProps {
  films: ShortFilm[];
  onUpdateFilms: (films: ShortFilm[]) => void;
  onSelectFilm: (film: ShortFilm) => void;
  onOpenSubmitFilm: () => void;
  onToast: (msg: string) => void;
}

export const AdminSubmissionsQueue: React.FC<AdminSubmissionsQueueProps> = ({ 
  films, onUpdateFilms, onSelectFilm, onToast 
}) => {
  const languagePriority = (lang: string) => {
    if (lang === 'Kannada') return 0;
    const indianLangs = ['Hindi', 'Tamil', 'Telugu', 'Malayalam', 'Gujarati', 'Bengali', 'Marathi', 'Urdu', 'Odia', 'Punjabi'];
    if (indianLangs.includes(lang)) return 1;
    return 2;
  };

  const pending = films
    .filter(f => f.status === 'pending' || f.status === 'under_review')
    .sort((a, b) => {
      const pA = languagePriority(a.language);
      const pB = languagePriority(b.language);
      if (pA !== pB) return pA - pB;
      return 0;
    });

  const updateStatus = (id: string, status: ShortFilm['status']) => {
    const updated = films.map(f => f.id === id ? { ...f, status } : f);
    onUpdateFilms(updated);
    onToast(`Submission updated to ${status}`);
  };

  return (
    <div className="space-y-6">
      <div className="flex items-center gap-4">
        <div className="w-12 h-12 rounded-2xl bg-cinema-gold/10 border border-cinema-gold/20 flex items-center justify-center text-cinema-gold">
           <Clock className="w-6 h-6" />
        </div>
        <div>
          <h1 className="text-2xl font-black text-white tracking-tight uppercase">Submissions Queue</h1>
          <p className="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Review and approve new cinematic talent</p>
        </div>
      </div>

      <div className="grid grid-cols-1 gap-4">
        {pending.length === 0 ? (
          <div className="py-20 text-center bg-cinema-card rounded-3xl border border-white/5">
            <p className="text-cinema-muted font-bold uppercase tracking-[0.2em]">Queue is currently empty</p>
          </div>
        ) : (
          pending.map(film => (
            <div key={film.id} className="bg-cinema-card rounded-3xl border border-white/5 p-6 flex flex-col md:flex-row items-center gap-6 group hover:border-cinema-gold/30 transition-all">
              <div className="w-24 h-32 rounded-xl bg-cinema-surface border border-white/10 overflow-hidden shrink-0 shadow-lg">
                <img src={film.posterUrl} className="w-full h-full object-cover" />
              </div>
              <div className="flex-1 space-y-2 min-w-0">
                <div className="flex items-center gap-2">
                   <span className="px-2 py-0.5 rounded text-[8px] font-black uppercase bg-cinema-gold/20 text-cinema-gold border border-cinema-gold/30">{film.status}</span>
                   <span className="text-[10px] text-cinema-muted font-bold uppercase tracking-widest">{film.language}</span>
                </div>
                <h3 className="text-xl font-black text-white group-hover:text-cinema-accent transition-colors truncate">{film.title}</h3>
                <p className="text-xs text-cinema-muted line-clamp-2">{film.synopsis || 'No synopsis provided for this submission.'}</p>
                <div className="flex items-center gap-4 pt-2">
                   <button onClick={() => onSelectFilm(film)} className="text-[10px] font-black text-cinema-teal uppercase tracking-widest flex items-center gap-1 hover:text-white transition-colors">
                      <Play className="w-3 h-3 fill-current" />
                      Watch Screener
                   </button>
                   <span className="w-1 h-1 rounded-full bg-white/10" />
                   <span className="text-[10px] text-cinema-muted uppercase font-bold">Directed by {film.director}</span>
                </div>
              </div>
              <div className="flex md:flex-col gap-2 shrink-0">
                <button 
                  onClick={() => updateStatus(film.id, 'published')}
                  className="px-4 py-3 rounded-xl bg-emerald-500/10 hover:bg-emerald-500 text-emerald-400 hover:text-white border border-emerald-500/20 transition-all flex items-center gap-2 text-[10px] font-black uppercase tracking-widest"
                >
                  <CheckCircle className="w-4 h-4" />
                  Approve
                </button>
                <button 
                  onClick={() => updateStatus(film.id, 'rejected')}
                  className="px-4 py-3 rounded-xl bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white border border-red-500/20 transition-all flex items-center gap-2 text-[10px] font-black uppercase tracking-widest"
                >
                  <XCircle className="w-4 h-4" />
                  Reject
                </button>
              </div>
            </div>
          ))
        )}
      </div>
    </div>
  );
};
