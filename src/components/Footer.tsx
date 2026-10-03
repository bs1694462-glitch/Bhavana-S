import React from 'react';
import { Film, Clapperboard, Shield, Heart, Phone, Facebook, Instagram, Youtube, MessageCircle } from 'lucide-react';
import { IndianShortMovieLogo } from './Navbar';

interface FooterProps {
  onNavigateTab: (tab: string) => void;
  onOpenSubmitFilm: () => void;
}

export const Footer: React.FC<FooterProps> = ({
  onNavigateTab,
  onOpenSubmitFilm
}) => {
  return (
    <footer className="bg-cinema-surface border-t border-cinema-border mt-16 pt-12 pb-8">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* 4-Column Grid matching reference */}
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
          
          {/* Brand Info */}
          <div className="md:col-span-1 space-y-4">
            <div className="flex items-center gap-3">
              <IndianShortMovieLogo isMobile={true} />
            </div>
            <p className="text-xs text-cinema-muted leading-relaxed">
              Dedicated platform celebrating independent storytelling, short cinema, and visionary filmmakers across all Indian languages.
            </p>
          </div>

          {/* Discover */}
          <div>
            <h4 className="text-xs font-bold text-white uppercase tracking-wider mb-4">Discover</h4>
            <ul className="space-y-2 text-xs text-cinema-muted">
              <li>
                <button 
                  onClick={() => onNavigateTab('films')} 
                  className="hover:text-cinema-accent transition-colors text-left"
                >
                  Trending Now
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('films')} 
                  className="hover:text-cinema-accent transition-colors text-left"
                >
                  Top Rated
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('films')} 
                  className="hover:text-cinema-accent transition-colors text-left"
                >
                  Hindi Short Films
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('films')} 
                  className="hover:text-cinema-accent transition-colors text-left"
                >
                  Gujarati Short Films
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('films')} 
                  className="hover:text-cinema-accent transition-colors text-left"
                >
                  Tamil Short Films
                </button>
              </li>
            </ul>
          </div>

          {/* Filmmakers */}
          <div>
            <h4 className="text-xs font-bold text-white uppercase tracking-wider mb-4">Filmmakers</h4>
            <ul className="space-y-2 text-xs text-cinema-muted">
              <li>
                <button 
                  onClick={onOpenSubmitFilm} 
                  className="hover:text-cinema-gold transition-colors flex items-center gap-1.5 text-left"
                >
                  <Clapperboard className="w-3.5 h-3.5 text-cinema-gold" />
                  <span>Submit Your Film</span>
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('filmmakers')} 
                  className="hover:text-white transition-colors text-left"
                >
                  Filmmaker Directory
                </button>
              </li>
            </ul>
          </div>

          {/* Platform */}
          <div>
            <h4 className="text-xs font-bold text-white uppercase tracking-wider mb-4">Platform</h4>
            <ul className="space-y-2 text-xs text-cinema-muted">
              <li>
                <button 
                  onClick={() => onNavigateTab('about')} 
                  className="hover:text-white transition-colors text-left"
                >
                  About Us
                </button>
              </li>
              <li>
                <button 
                  onClick={() => onNavigateTab('contact')} 
                  className="hover:text-white transition-colors text-left"
                >
                  Contact Support
                </button>
              </li>
            </ul>
          </div>

        </div>

        {/* Bottom Exact Copyright & Hosting Baba Attribution */}
        <div className="border-t border-cinema-border/50 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-cinema-muted">
          <div className="flex flex-wrap items-center gap-1.5 sm:gap-2">
            <span>© 2026 Indian Short Films. All rights reserved.</span>
            <span className="hidden md:inline">|</span>
            <span>Designed and developed by With love ❤️ <a href="https://webhostingbaba.com/" target="_blank" rel="noopener noreferrer" style={{ color: '#e50914' }} className="font-bold hover:underline transition-opacity hover:opacity-90">HOSTING BABA</a></span>
          </div>

          {/* Official Social Links & Contact */}
          <div className="flex items-center gap-6">
            <a href="tel:9945443044" className="hover:text-white transition-colors flex items-center gap-1.5">
              <Phone className="w-3.5 h-3.5" />
              <span>9945443044</span>
            </a>
            <div className="flex items-center gap-4">
              <a href="https://www.facebook.com/profile.php?id=61594788760056" target="_blank" rel="noopener noreferrer" className="hover:text-[#1877F2] transition-colors" title="Facebook">
                <Facebook className="w-4 h-4" />
              </a>
              <a href="https://www.instagram.com/indian.short.movie/" target="_blank" rel="noopener noreferrer" className="hover:text-[#E4405F] transition-colors" title="Instagram">
                <Instagram className="w-4 h-4" />
              </a>
              <a href="https://www.youtube.com/@Indianshortmovie-i2" target="_blank" rel="noopener noreferrer" className="hover:text-[#FF0000] transition-colors" title="YouTube">
                <Youtube className="w-4 h-4" />
              </a>
              <a href="https://wa.me/919945443044" target="_blank" rel="noopener noreferrer" className="hover:text-[#25D366] transition-colors" title="WhatsApp">
                <svg viewBox="0 0 24 24" className="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.394 0 12.03c0 2.12.553 4.189 1.606 6.006L0 24l6.117-1.605a11.803 11.803 0 005.925 1.583h.005c6.635 0 12.032-5.393 12.035-12.032a11.762 11.762 0 00-3.483-8.491z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>

      </div>
    </footer>
  );
};
