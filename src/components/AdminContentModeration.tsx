import React, { useState } from 'react';
import { ShieldAlert, AlertTriangle, CheckCircle, Flag, MessageSquare } from 'lucide-react';

interface AdminContentModerationProps {
  onToast: (msg: string) => void;
  onUpdatePendingCount: (count: number) => void;
}

export const AdminContentModeration: React.FC<AdminContentModerationProps> = ({ 
  onToast, onUpdatePendingCount 
}) => {
  const [reports, setReports] = useState([]);

  const handleResolve = (id: string) => {
    const newReports = reports.filter(r => r.id !== id);
    setReports(newReports);
    onUpdatePendingCount(newReports.length);
    onToast('Report resolved and content cleared');
  };

  return (
    <div className="space-y-6">
      <div className="flex items-center gap-4">
        <div className="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-500">
           <ShieldAlert className="w-6 h-6" />
        </div>
        <div>
          <h1 className="text-2xl font-black text-white tracking-tight uppercase">Content Moderation</h1>
          <p className="text-xs text-cinema-muted font-bold uppercase tracking-widest mt-1">Safeguard the community from policy violations</p>
        </div>
      </div>

      <div className="bg-cinema-card rounded-[2rem] border border-white/5 overflow-hidden shadow-2xl">
         <div className="p-6 border-b border-white/5 bg-white/[0.01]">
            <div className="flex items-center gap-2">
               <Flag className="w-4 h-4 text-cinema-accent" />
               <span className="text-[10px] font-black text-white uppercase tracking-widest">Active Flags ({reports.length})</span>
            </div>
         </div>
         <div className="divide-y divide-white/5">
            {reports.length === 0 ? (
               <div className="p-20 text-center">
                  <CheckCircle className="w-12 h-12 text-emerald-500 mx-auto mb-4 opacity-20" />
                  <p className="text-cinema-muted font-bold uppercase tracking-[0.2em]">Platform is currently clean</p>
               </div>
            ) : (
               reports.map(report => (
                  <div key={report.id} className="p-6 flex flex-col md:flex-row md:items-center justify-between gap-6 hover:bg-white/[0.01] transition-colors">
                     <div className="flex items-start gap-4">
                        <div className="p-3 rounded-xl bg-white/5 border border-white/10 text-cinema-muted">
                           {report.type === 'Comment' ? <MessageSquare className="w-5 h-5" /> : <AlertTriangle className="w-5 h-5" />}
                        </div>
                        <div className="space-y-1">
                           <div className="flex items-center gap-2">
                              <span className="text-[10px] font-black text-cinema-accent uppercase tracking-widest">{report.reason}</span>
                              <span className="w-1 h-1 rounded-full bg-white/10" />
                              <span className="text-[10px] text-cinema-muted uppercase font-bold">{report.time}</span>
                           </div>
                           <h4 className="text-sm font-black text-white normal-case">Report on {report.type}: {report.target}</h4>
                           <p className="text-[10px] text-cinema-muted uppercase tracking-widest font-bold">Flagged by: {report.user}</p>
                        </div>
                     </div>
                     <div className="flex gap-2">
                        <button className="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-white text-[10px] font-black uppercase tracking-widest border border-white/10 transition-all">
                           Review Content
                        </button>
                        <button 
                           onClick={() => handleResolve(report.id)}
                           className="px-4 py-2 rounded-xl bg-emerald-500/10 hover:bg-emerald-500 text-emerald-400 hover:text-white border border-emerald-500/20 transition-all text-[10px] font-black uppercase tracking-widest"
                        >
                           Dismiss / Resolve
                        </button>
                     </div>
                  </div>
               ))
            )}
         </div>
      </div>
    </div>
  );
};
