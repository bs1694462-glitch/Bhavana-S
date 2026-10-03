import express from 'express';
import session from 'express-session';
import cookieParser from 'cookie-parser';
import { createServer as createViteServer } from 'vite';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

async function createServer() {
  const app = express();
  const port = 3000;

  app.use(express.json());
  app.use(cookieParser());
  app.use(session({
    secret: 'indian-short-movie-secret-key-2026',
    resave: false,
    saveUninitialized: false,
    cookie: { 
      secure: false, // Set to true if using https
      httpOnly: true,
      maxAge: 24 * 60 * 60 * 1000 // 24 hours
    }
  }));

  // --- Mock Database / Real Auth Logic ---
  const users = [
    { id: '1', email: 'admin@example.com', password: 'admin123', role: 'ADMIN', name: 'Admin' }
  ];

  // API: Login
  app.post('/api/login', (req, res) => {
    const { email, password } = req.body;
    const user = users.find(u => u.email === email && u.password === password);
    
    if (user) {
      (req.session as any).userId = user.id;
      (req.session as any).userRole = user.role;
      (req.session as any).userName = user.name;
      (req.session as any).userEmail = user.email;
      
      const { password, ...userWithoutPassword } = user;
      return res.json({ success: true, user: userWithoutPassword });
    }
    
    return res.status(401).json({ success: false, message: 'Invalid email or password.' });
  });

  // API: Current User
  app.get('/api/me', (req, res) => {
    if ((req.session as any).userId) {
      return res.json({
        id: (req.session as any).userId,
        role: (req.session as any).userRole,
        name: (req.session as any).userName,
        email: (req.session as any).userEmail
      });
    }
    return res.status(401).json({ success: false });
  });

  // API: Logout
  app.post('/api/logout', (req, res) => {
    req.session.destroy((err) => {
      if (err) return res.status(500).json({ success: false });
      res.clearCookie('connect.sid');
      return res.json({ success: true });
    });
  });

  // Admin Protection Middleware (for future API expansion)
  const requireAdmin = (req: express.Request, res: express.Response, next: express.NextFunction) => {
    if ((req.session as any).userRole === 'ADMIN') {
      next();
    } else {
      res.status(403).json({ success: false, message: 'Admin access required.' });
    }
  };

  // --- Vite Dev Server Middleware ---
  const vite = await createViteServer({
    server: { middlewareMode: true },
    appType: 'custom',
  });

  app.use(vite.middlewares);

  app.use('*', async (req, res) => {
    try {
      const url = req.originalUrl;
      let template = await vite.transformIndexHtml(url, 
        `<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <link rel="icon" type="image/svg+xml" href="/vite.svg" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Indian Short Movie - India's Stories on Screen</title>
          </head>
          <body>
            <div id="root"></div>
            <script type="module" src="/src/main.tsx"></script>
          </body>
        </html>`
      );
      res.status(200).set({ 'Content-Type': 'text/html' }).end(template);
    } catch (e: any) {
      vite.ssrFixStacktrace(e);
      res.status(500).end(e.stack);
    }
  });

  app.listen(port, () => {
    console.log(`Server started at http://localhost:${port}`);
  });
}

createServer();
