import React from 'react';
import { Creator, ShortFilm } from '../types';
import { User, Award, Film } from 'lucide-react';

interface FilmmakersPageProps {
  creators: Creator[];
  films: ShortFilm[];
  onSelectCreator: (creator: Creator) => void;
}

export const FilmmakersPage: React.FC<FilmmakersPageProps> = ({ 
  creators, films, onSelectCreator 
}) => {
  return (
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12 animate-fadeIn">
      <div className="flex flex-col md:flex-row md:items-end justify-between gap-6">
         <div className="space-y-3">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cinema-teal/10 border border-cinema-teal/20 text-cinema-teal text-[10px] font-black uppercase tracking-widest">
               <Award className="w-3 h-3" />
               <span>Industry Directory</span>
            </div>
            <h1 className="font-display font-black text-4xl text-white tracking-tight uppercase leading-none">Visionary Filmmakers</h1>
            <p className="text-sm text-cinema-muted uppercase tracking-[0.2em] font-bold">The minds behind India's most compelling independent stories</p>
         </div>
      </div>

      {creators.length === 0 ? (
        <div className="py-32 text-center bg-cinema-card rounded-[2.5rem] border border-white/5 shadow-2xl">
           <div className="w-20 h-20 rounded-[2rem] bg-cinema-teal/10 border border-cinema-teal/20 flex items-center justify-center text-cinema-teal mx-auto mb-6">
              <Award className="w-10 h-10" />
           </div>
           <h2 className="text-2xl font-black text-white uppercase tracking-tighter mb-2">No Filmmakers Listed</h2>
           <p className="text-cinema-muted max-w-xs mx-auto font-medium">Our director directory is currently being curated with real industry professionals.</p>
        </div>
      ) : (
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
           {creators.map(creator => {
             const creatorFilms = films.filter(f => f.director.includes(creator.name));
             return (
               <div 
                 key={creator.id}
                 onClick={() => onSelectCreator(creator)}
                 className="group relative bg-cinema-card rounded-[2.5rem] border border-white/5 p-8 hover:border-cinema-teal/30 transition-all cursor-pointer shadow-2xl overflow-hidden"
               >
                 {/* Background Glow */}
                 <div className="absolute -bottom-24 -right-24 w-48 h-48 bg-cinema-teal/5 rounded-full blur-[80px] group-hover:bg-cinema-teal/10 transition-colors" />

                 <div className="relative flex flex-col items-center text-center space-y-6">
                    <div className="relative">
                       <div className="w-24 h-24 rounded-[2rem] bg-cinema-surface border-2 border-white/10 overflow-hidden group-hover:border-cinema-teal transition-all duration-500">
                          <img src={creator.avatar} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                       </div>
                       <div className="absolute -bottom-2 -right-2 w-8 h-8 rounded-xl bg-cinema-accent flex items-center justify-center text-white shadow-lg border border-white/10">
                          <Award className="w-4 h-4" />
                       </div>
                    </div>

                    <div className="space-y-1">
                       <h3 className="text-xl font-black text-white group-hover:text-cinema-teal transition-colors tracking-tight">{creator.name}</h3>
                       <p className="text-[10px] text-cinema-muted font-black uppercase tracking-widest">{creator.handle}</p>
                    </div>

                    <p className="text-xs text-cinema-muted line-clamp-3 leading-relaxed font-medium">{creator.bio}</p>

                    <div className="w-full grid grid-cols-2 gap-4 pt-2">
                       <div className="bg-white/5 rounded-2xl p-3 border border-white/5">
                          <p className="text-lg font-black text-white">{creatorFilms.length}</p>
                          <p className="text-[8px] text-cinema-muted uppercase font-black tracking-tighter">Productions</p>
                       </div>
                       <div className="bg-white/5 rounded-2xl p-3 border border-white/5">
                          <p className="text-lg font-black text-white">{(creator.followersCount / 1000).toFixed(1)}K</p>
                          <p className="text-[8px] text-cinema-muted uppercase font-black tracking-tighter">Followers</p>
                       </div>
                    </div>
                 </div>
               </div>
             );
           })}
        </div>
      )}
    </div>
  );
};
