import React, { useState } from 'react';
import { X, LogIn, Mail, Lock, Shield, User as UserIcon } from 'lucide-react';
import { User } from '../types';
import { PlatformStore } from '../services/platformStore';

interface AuthModalProps {
  isOpen: boolean;
  onClose: () => void;
  onAuthSuccess: (user: User) => void;
  isAdmin?: boolean;
  isStandalone?: boolean;
}

export const AuthModal: React.FC<AuthModalProps> = ({ 
  isOpen, onClose, onAuthSuccess, isAdmin = false, isStandalone = false 
}) => {
  const [isLogin, setIsLogin] = useState(true);
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState<string | null>(null);
  const [loading, setLoading] = useState(false);

  if (!isOpen) return null;

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError(null);
    setLoading(true);

    try {
      const response = await fetch('/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
      });

      const data = await response.json();

      if (data.success) {
        if (isAdmin && data.user.role !== 'ADMIN') {
          setError('Unauthorized: Admin account required');
          setLoading(false);
          return;
        }
        PlatformStore.setCurrentSession(data.user);
        onAuthSuccess(data.user);
        if (!isStandalone) onClose();
      } else {
        setError(data.message || 'Authentication failed.');
      }
    } catch (err) {
      setError('Connection error. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  const containerClasses = isStandalone 
    ? "relative w-full max-w-md bg-cinema-card rounded-[2.5rem] p-8 sm:p-10 shadow-2xl border border-white/5 animate-scaleIn overflow-hidden"
    : "relative w-full max-w-md bg-cinema-card rounded-[2.5rem] p-8 sm:p-10 shadow-2xl border border-white/5 animate-scaleIn overflow-hidden";

  return (
    <div className={isStandalone ? "w-full min-h-[calc(100vh-80px)] flex items-center justify-center bg-[#07080b] p-4" : "fixed inset-0 z-[100] flex items-center justify-center p-4"}>
      {!isStandalone && <div className="absolute inset-0 bg-[#07080b]/95 backdrop-blur-md" onClick={onClose} />}
      
      <div className={containerClasses}>
        {/* Glow Effect */}
        <div className={`absolute -top-24 -left-24 w-48 h-48 ${isAdmin ? 'bg-cinema-accent/20' : 'bg-cinema-accent/10'} rounded-full blur-[100px]`} />
        
        {!isStandalone && (
          <button onClick={onClose} className="absolute top-6 right-6 p-2 text-cinema-muted hover:text-white transition-colors cursor-pointer">
            <X className="w-5 h-5" />
          </button>
        )}

        <div className="text-center space-y-4 mb-10">
          <div className={`w-20 h-20 rounded-[2rem] bg-gradient-to-br ${isAdmin ? 'from-cinema-accent to-[#8b5cf6] shadow-cinema-accent/30' : 'from-cinema-accent to-[#dc2626] shadow-cinema-accent/20'} flex items-center justify-center text-white mx-auto shadow-2xl transition-transform hover:scale-110 duration-500`}>
            {isAdmin ? <Shield className="w-10 h-10" /> : <LogIn className="w-10 h-10" />}
          </div>
          <div className="space-y-1">
            <h2 className="text-3xl font-black text-white tracking-tighter leading-none uppercase">
              {isAdmin ? 'Admin Portal' : (isLogin ? 'Welcome Back' : 'Join the Club')}
            </h2>
            <p className="text-[10px] text-cinema-muted uppercase tracking-[0.3em] font-black">
              {isAdmin ? 'System Administrator Access' : (isLogin ? 'Member Login' : 'Create Viewer Account')}
            </p>
          </div>
        </div>

        {error && (
          <div className="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl flex items-center gap-3 text-red-400 text-xs font-bold animate-shake">
            <Shield className="w-5 h-5 shrink-0" />
            <span>{error}</span>
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-5">
          <div className="space-y-2">
            <label className="text-[10px] font-bold text-cinema-muted uppercase tracking-widest ml-1">Email Address</label>
            <div className="relative group">
              <input 
                type="email" 
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required 
                placeholder="name@example.com" 
                className="w-full bg-cinema-surface border border-white/5 rounded-2xl px-5 py-4 text-sm text-white focus:outline-none focus:border-cinema-accent focus:ring-4 focus:ring-cinema-accent/10 transition-all placeholder-cinema-muted/50"
              />
              <Mail className="w-4 h-4 text-cinema-muted absolute right-5 top-1/2 -translate-y-1/2 group-focus-within:text-cinema-accent transition-colors" />
            </div>
          </div>

          <div className="space-y-2">
            <div className="flex items-center justify-between px-1">
              <label className="text-[10px] font-bold text-cinema-muted uppercase tracking-widest">Secure Password</label>
              {isLogin && <button type="button" className="text-[9px] font-black text-cinema-teal hover:underline uppercase tracking-widest">Forgot?</button>}
            </div>
            <div className="relative group">
              <input 
                type="password" 
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                required 
                placeholder="••••••••" 
                className="w-full bg-cinema-surface border border-white/5 rounded-2xl px-5 py-4 text-sm text-white focus:outline-none focus:border-cinema-accent focus:ring-4 focus:ring-cinema-accent/10 transition-all placeholder-cinema-muted/50"
              />
              <Lock className="w-4 h-4 text-cinema-muted absolute right-5 top-1/2 -translate-y-1/2 group-focus-within:text-cinema-accent transition-colors" />
            </div>
          </div>

          <button 
            type="submit" 
            disabled={loading}
            className="w-full bg-cinema-accent hover:bg-cinema-accentHover disabled:opacity-50 text-white font-black py-4.5 rounded-2xl transition-all shadow-[0_20px_50px_-10px_rgba(229,9,20,0.3)] flex items-center justify-center gap-3 group active:scale-[0.98]"
          >
            <span>{loading ? 'Processing...' : (isLogin ? 'Sign In' : 'Register')}</span>
            {!loading && <LogIn className="w-5 h-5 group-hover:translate-x-1 transition-transform" />}
          </button>
        </form>

        <div className="mt-8 text-center">
          <p className="text-xs text-cinema-muted font-medium">
            {isLogin ? "Don't have an account?" : "Already have an account?"}
            <button 
              onClick={() => setIsLogin(!isLogin)}
              className="ml-2 text-cinema-teal font-black hover:underline uppercase tracking-widest text-[10px]"
            >
              {isLogin ? 'Create One' : 'Log In Now'}
            </button>
          </p>
        </div>
        
        <div className="mt-8 pt-6 border-t border-white/5 flex items-center justify-center gap-3 opacity-30">
          <Shield className="w-3 h-3 text-white" />
          <span className="text-[8px] font-black text-white uppercase tracking-[0.4em]">Secure Encryption Active</span>
        </div>
      </div>
    </div>
  );
};
