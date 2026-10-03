# Indian Short Movie - Pure PHP 8+ Project

This is a production-ready PHP conversion of the Indian Short Movie website.

## Project Structure

- `/index.php` - Home Page
- `/discover.php` - Film Catalog
- `/watchlist.php` - User Watchlist
- `/filmmakers.php` - Filmmaker Directory
- `/submit-film.php` - Film Submission Form
- `/admin/` - Separate Protected Admin Portal
  - `login.php` - Admin Authentication
  - `index.php` - Admin Dashboard
  - `logout.php` - Session Termination
- `/includes/` - Reusable PHP Components
  - `auth.php` - Server-side Session Management
  - `header.php` - Global Head & Styles
  - `navbar.php` - Public Navigation
  - `footer.php` - Global Footer & Branding
- `/assets/` - Static Files (CSS, JS, Images, Videos)

## Access Credentials (Demo)

### Administrator
- **Email**: `admin@example.com`
- **Password**: `admin123`
- **Role**: Full platform management

### Standard User
- **Email**: `user@example.com`
- **Password**: `user123`
- **Role**: Public features & film submissions

## Key Features Implemented

- **Unified Auth System**: Role-based access control (RBAC) using native PHP 8+ sessions.
- **Protected Admin Portal**: Comprehensive dashboard for film, user, and content moderation.
- **Public User Features**: Standalone login/registration and protected submission flow.
- **Kannada First Priority**: Intelligent sorting and prioritization of Kannada content across the platform.
- **Enhanced Homepage**: New "Top Rated Cinema" and "Trending Now" sections.
- **Responsive Architecture**: Fully responsive mobile menu and admin sidebar.
- **Security Protocols**: Direct URL protection and secure session invalidation.

## Setup

1. Upload all files to your PHP-enabled web server.
2. Ensure the `/assets/` folder is accessible.
3. Access the website via your domain (e.g., `https://yourdomain.com`).
4. Access the Admin Portal at `https://yourdomain.com/admin/`.

---
© 2026 Indian Short Films. All rights reserved.
With love ❤️ HOSTING BABA
