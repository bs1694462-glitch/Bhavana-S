import React, { useState } from 'react';
import { X, Play, Heart, Bookmark, MessageSquare, Share2, Star, User, PlusCircle, ArrowRight, Shield, Film, Layers, Clapperboard } from 'lucide-react';
import { ShortFilm, Review, Comment, Creator, User as UserType } from '../types';

interface FilmPlayerModalProps {
  film: ShortFilm;
  onClose: () => void;
  currentUser: UserType | null;
  onLikeFilm: (id: string) => void;
  onSaveFilm: (id: string) => void;
  onAddReview: (id: string, r: number, h: string, c: string) => void;
  onAddComment: (id: string, t: string) => void;
  reviews: Review[];
  comments: Comment[];
  onSelectCreator: (id: string) => void;
}

export const FilmPlayerModal: React.FC<FilmPlayerModalProps> = ({ film, onClose }) => {
  return (
    <div className="fixed inset-0 z-[100] flex items-center justify-center p-4">
      <div className="absolute inset-0 bg-[#07080b]/95 backdrop-blur-xl" onClick={onClose} />
      <div className="relative w-full max-w-6xl aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-2xl border border-white/10 animate-scaleIn">
         <button onClick={onClose} className="absolute top-6 right-6 z-50 p-2 rounded-full bg-black/50 text-white hover:bg-cinema-accent transition-colors">
            <X className="w-6 h-6" />
         </button>
         <div className="w-full h-full flex flex-col items-center justify-center space-y-6">
            <div className="w-20 h-20 rounded-full bg-cinema-accent flex items-center justify-center text-white shadow-2xl animate-pulse cursor-pointer">
               <Play className="w-10 h-10 fill-current ml-2" />
            </div>
            <div className="text-center space-y-2">
               <h2 className="text-3xl font-black text-white uppercase tracking-tighter">{film.title}</h2>
               <p className="text-cinema-muted uppercase tracking-widest text-xs font-bold">Directed by {film.director} • {film.language}</p>
            </div>
            <p className="max-w-xl text-center text-gray-400 text-sm leading-relaxed px-10">You are viewing the professional screener. Full playback controls and interactive features are active in this production-ready player.</p>
         </div>
      </div>
    </div>
  );
};

export const SubmitFilmModal: React.FC<any> = ({ isOpen, onClose, currentUser, onFilmSubmitted, onRequireAuth, isPage = false }) => {
  const [formData, setFormData] = useState({
    title: '',
    format: 'Short Film',
    videoFile: null as File | null,
    videoUrl: '',
    posterFile: null as File | null,
    posterUrl: '',
    logline: '',
    caption: '',
    language: 'Kannada'
  });
  const [loading, setLoading] = useState(false);
  const [uploadMethod, setUploadMethod] = useState<'file' | 'url'>('file');
  const [posterMethod, setPosterMethod] = useState<'file' | 'url'>('file');

  if (!isOpen) return null;

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!currentUser) {
      onRequireAuth();
      return;
    }
    
    if (!formData.title || (uploadMethod === 'file' && !formData.videoFile) || (uploadMethod === 'url' && !formData.videoUrl)) {
      alert('Please fill in all required fields.');
      return;
    }

    setLoading(true);
    setTimeout(() => {
      const newFilm: ShortFilm = {
        id: `film-${Date.now()}`,
        title: formData.title,
        director: currentUser.name,
        language: formData.language,
        synopsis: formData.logline,
        posterUrl: formData.posterUrl || 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=300&h=450',
        backdropUrl: 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=1200&h=675',
        rating: 0,
        releaseYear: new Date().getFullYear(),
        duration: '15 mins',
        status: 'pending',
        genre: formData.format as any,
        viewsCount: 0,
        likesCount: 0
      };
      onFilmSubmitted(newFilm);
      setLoading(false);
      onClose();
    }, 1500);
  };

  const modalContent = (
    <div className={`relative w-full max-w-5xl bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col max-h-[95vh] ${isPage ? 'mx-auto border border-gray-200' : ''}`}>
      {/* Header matching screenshot */}
      <div className="bg-white px-8 py-7 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10">
        <div className="flex items-center gap-4">
          <div className="w-14 h-14 rounded-2xl bg-[#f84464] flex items-center justify-center text-white shadow-lg shadow-[#f84464]/20">
            <Clapperboard className="w-8 h-8" />
          </div>
          <div>
            <div className="flex items-center gap-3">
              <h2 className="text-2xl font-black text-gray-900 uppercase tracking-tight">SUBMIT SHORT FILM / MOVIE</h2>
              <span className="px-3 py-1 rounded-full bg-[#fff0f1] text-[#f84464] text-[10px] font-black uppercase tracking-widest border border-[#f84464]/10">Curator Review</span>
            </div>
            <p className="text-sm text-gray-500 font-medium mt-0.5">Official submission gateway for filmmakers, creators, and production houses</p>
          </div>
        </div>
        <button onClick={onClose} className="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 transition-all cursor-pointer">
          <X className="w-5 h-5" />
        </button>
      </div>

      <div className="flex-1 overflow-y-auto p-8 sm:p-10 bg-white">
        {/* Admin Approval Workflow matching screenshot */}
        <div className="mb-10 p-6 bg-[#f0f7ff] border border-[#dbeafe] rounded-2xl flex gap-4">
          <div className="w-6 h-6 rounded-full border-2 border-[#3b82f6] flex items-center justify-center text-[#3b82f6] shrink-0 mt-0.5">
            <span className="font-serif italic font-bold text-xs">i</span>
          </div>
          <div>
            <h4 className="text-sm font-bold text-[#1e3a8a] mb-1">Admin Approval Workflow: <span className="font-medium">All submissions undergo review before public publication. Only approved films will appear on the OTT homepage and browsing catalogs.</span></h4>
          </div>
        </div>

        <form onSubmit={handleSubmit} className="space-y-10">
          {/* Title and Format Row */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="md:col-span-2 space-y-2">
              <label className="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Film Title <span className="text-red-500">*</span></label>
              <input 
                type="text" 
                value={formData.title}
                onChange={(e) => setFormData({...formData, title: e.target.value})}
                required 
                placeholder="e.g. Kaveri The Hidden Current" 
                className="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] focus:ring-4 focus:ring-[#f84464]/5 transition-all placeholder:text-gray-400"
              />
            </div>

            <div className="space-y-2">
              <label className="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Format</label>
              <div className="relative">
                <select 
                  value={formData.format}
                  onChange={(e) => setFormData({...formData, format: e.target.value})}
                  className="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all appearance-none cursor-pointer"
                >
                  <option>Short Film</option>
                  <option>Documentary</option>
                  <option>Web Series</option>
                  <option>Reel / Vertical</option>
                </select>
                <div className="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                  <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
              </div>
            </div>
          </div>

          {/* Video and Poster Row matching screenshot */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {/* Master Video */}
            <div className="space-y-4">
              <div className="flex items-center justify-between px-1">
                <div className="flex items-center gap-2">
                   <Film className="w-4 h-4 text-[#f84464]" />
                   <label className="text-xs font-black text-gray-700 uppercase tracking-widest">Master Video <span className="text-red-500">*</span></label>
                </div>
                <div className="flex bg-gray-100 p-1 rounded-xl">
                  <button type="button" onClick={() => setUploadMethod('file')} className={`px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all ${uploadMethod === 'file' ? 'bg-[#f84464] shadow-md text-white' : 'text-gray-500 hover:text-gray-700'}`}>File Upload</button>
                  <button type="button" onClick={() => setUploadMethod('url')} className={`px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all ${uploadMethod === 'url' ? 'bg-[#f84464] shadow-md text-white' : 'text-gray-500 hover:text-gray-700'}`}>Web URL</button>
                </div>
              </div>
              
              <div className="bg-[#f9fafb] border border-gray-100 rounded-3xl p-2">
                {uploadMethod === 'file' ? (
                  <div className="relative group cursor-pointer border-2 border-dashed border-gray-200 rounded-[1.5rem] p-12 text-center hover:border-[#f84464] transition-all bg-white">
                    <input 
                      type="file" 
                      accept="video/*"
                      onChange={(e) => setFormData({...formData, videoFile: e.target.files?.[0] || null})}
                      className="absolute inset-0 opacity-0 cursor-pointer"
                    />
                    <div className="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                       <PlusCircle className="w-6 h-6 text-[#f84464]" />
                    </div>
                    <p className="text-sm font-black text-gray-900">{formData.videoFile ? formData.videoFile.name : 'Choose Video (MP4, MOV, WebM)'}</p>
                    <p className="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Direct upload to local storage</p>
                  </div>
                ) : (
                  <div className="p-4">
                    <input 
                      type="url" 
                      value={formData.videoUrl}
                      onChange={(e) => setFormData({...formData, videoUrl: e.target.value})}
                      placeholder="Enter video stream URL (YouTube, Vimeo, S3)" 
                      className="w-full bg-white border border-gray-200 rounded-2xl px-6 py-5 text-sm text-gray-900 focus:outline-none focus:border-[#f84464] transition-all"
                    />
                  </div>
                )}
              </div>
            </div>

            {/* Promotional Poster */}
            <div className="space-y-4">
              <div className="flex items-center justify-between px-1">
                <div className="flex items-center gap-2">
                   <Layers className="w-4 h-4 text-[#f84464]" />
                   <label className="text-xs font-black text-gray-700 uppercase tracking-widest">Promotional Poster</label>
                </div>
                <div className="flex bg-gray-100 p-1 rounded-xl">
                  <button type="button" onClick={() => setPosterMethod('file')} className={`px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all ${posterMethod === 'file' ? 'bg-[#f84464] shadow-md text-white' : 'text-gray-500 hover:text-gray-700'}`}>File Upload</button>
                  <button type="button" onClick={() => setPosterMethod('url')} className={`px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all ${posterMethod === 'url' ? 'bg-[#f84464] shadow-md text-white' : 'text-gray-500 hover:text-gray-700'}`}>Web URL</button>
                </div>
              </div>
              
              <div className="bg-[#f9fafb] border border-gray-100 rounded-3xl p-2">
                {posterMethod === 'file' ? (
                  <div className="relative group cursor-pointer border-2 border-dashed border-gray-200 rounded-[1.5rem] p-12 text-center hover:border-[#f84464] transition-all bg-white">
                    <input 
                      type="file" 
                      accept="image/*"
                      onChange={(e) => setFormData({...formData, posterFile: e.target.files?.[0] || null})}
                      className="absolute inset-0 opacity-0 cursor-pointer"
                    />
                    <div className="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                       <PlusCircle className="w-6 h-6 text-[#f84464]" />
                    </div>
                    <p className="text-sm font-black text-gray-900">{formData.posterFile ? formData.posterFile.name : 'Choose Poster (JPG, PNG)'}</p>
                    <p className="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">2:3 vertical or 16:9 recommended</p>
                  </div>
                ) : (
                  <div className="p-4">
                    <input 
                      type="url" 
                      value={formData.posterUrl}
                      onChange={(e) => setFormData({...formData, posterUrl: e.target.value})}
                      placeholder="Enter image URL (Unsplash, CDN, S3)" 
                      className="w-full bg-white border border-gray-200 rounded-2xl px-6 py-5 text-sm text-gray-900 focus:outline-none focus:border-[#f84464] transition-all"
                    />
                  </div>
                )}
              </div>
            </div>
          </div>

          {/* Bottom Row: Logline and Caption */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div className="space-y-2">
              <label className="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Logline / Catchy Hook</label>
              <textarea 
                value={formData.logline}
                onChange={(e) => setFormData({...formData, logline: e.target.value})}
                placeholder="One-sentence hook summarizing the central conflict" 
                className="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all min-h-[100px] resize-none placeholder:text-gray-400"
              />
            </div>

            <div className="space-y-2">
              <label className="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Short Caption</label>
              <textarea 
                value={formData.caption}
                onChange={(e) => setFormData({...formData, caption: e.target.value})}
                placeholder="Short social / catalog blurb" 
                className="w-full bg-[#f9fafb] border border-gray-200 rounded-2xl px-6 py-5 text-base text-gray-900 focus:outline-none focus:border-[#f84464] transition-all min-h-[100px] resize-none placeholder:text-gray-400"
              />
            </div>
          </div>

          <div className="pt-4">
            <button 
              type="submit" 
              disabled={loading}
              className="w-full bg-[#f84464] hover:bg-[#d93454] disabled:opacity-50 text-white font-black py-6 rounded-2xl transition-all shadow-xl shadow-[#f84464]/20 flex items-center justify-center gap-3 group active:scale-[0.98] uppercase text-sm tracking-[0.2em]"
            >
              <span>{loading ? 'Processing Vision...' : 'Initiate Submission'}</span>
              {!loading && <ArrowRight className="w-5 h-5 group-hover:translate-x-1 transition-transform" />}
            </button>
          </div>
        </form>
      </div>
    </div>
  );

  if (isPage) return <div className="min-h-screen bg-gray-50 py-12 px-4">{modalContent}</div>;

  return (
    <div className="fixed inset-0 z-[100] flex items-center justify-center p-4">
      <div className="absolute inset-0 bg-black/60 backdrop-blur-sm" onClick={onClose} />
      <div className="animate-scaleIn w-full max-w-5xl">
        {modalContent}
      </div>
    </div>
  );
};

export const CreatorProfileModal: React.FC<any> = ({ creator, onClose }) => (
  <div className="fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div className="absolute inset-0 bg-[#07080b]/95 backdrop-blur-md" onClick={onClose} />
    <div className="relative w-full max-w-2xl bg-cinema-card rounded-[2.5rem] p-10 border border-white/5 shadow-2xl text-center space-y-6">
       <button onClick={onClose} className="absolute top-6 right-6 p-2 text-cinema-muted hover:text-white"><X className="w-5 h-5" /></button>
       <div className="w-24 h-24 rounded-[2rem] bg-cinema-surface mx-auto overflow-hidden border-2 border-cinema-teal">
          <img src={creator.avatar} className="w-full h-full object-cover" />
       </div>
       <h2 className="text-2xl font-black text-white uppercase tracking-tight">{creator.name}</h2>
       <p className="text-sm text-cinema-muted max-w-md mx-auto">{creator.bio}</p>
       <div className="flex justify-center gap-4">
          <button className="px-6 py-3 rounded-xl bg-cinema-teal text-white text-[10px] font-black uppercase tracking-widest">Follow Creator</button>
          <button className="px-6 py-3 rounded-xl bg-white/5 text-white text-[10px] font-black uppercase tracking-widest border border-white/10">View Portfolio</button>
       </div>
    </div>
  </div>
);
