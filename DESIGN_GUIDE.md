# JEAUONIA Portfolio - Design Guide

## 🎨 Design Overview

Your portfolio website is now styled as **JEAUONIA** - a modern, aesthetic portfolio platform inspired by contemporary design trends. The design emphasizes minimalism, typography, and elegant interactions.

## 📱 Design Features

### Color Palette
- **Primary Colors**: Soft pink (`#f97316`, `#ec4899`) to orange gradients
- **Background**: Cream/beige gradient (`#faf8f6` → `#f3f0ec`)
- **Text**: Dark gray (`#3a3a3a`) with lighter accents (`#888888`)
- **Accents**: Pink 400, Orange 400 for CTAs and highlights

### Typography
- **Font Family**: Montserrat (sans-serif fallback)
- **Font Weights**: 300 (light), 400 (regular), 500 (medium), 600 (semibold)
- **Letter Spacing**: 0.5px (body) to 3px (headers)
- **Line Height**: 1.6

### Layout
- **Container Max Width**: 1280px (max-w-7xl)
- **Grid**: 1 column (mobile), 2 columns (tablet), 3 columns (desktop)
- **Spacing**: 16px (base unit), 32px (section), 64px (major section)
- **Border Radius**: 6-8px (standard), 12px (large), 24px (full rounded)

## 📄 Page Structures

### 1. Homepage (Portfolio Index)
**File**: `resources/views/projects/index.blade.php`

**Sections**:
- **Header Info**: Brand name "JEAUONIA", tagline, publish button
- **Featured Gallery**: 3-column grid of projects with hover effects
- **Info Section**: Brand description with gradient background
- **Stats Section**: Display project count and engagement metrics
- **Pagination**: Styled pagination links

**Features**:
- Smooth hover animations (scale 1.1)
- Gradient overlays on media hover
- Shadow effects on cards
- Icons for external links (Figma, GitHub, Globe, TikTok)
- Author name displayed on each project

### 2. Create Design Page
**File**: `resources/views/projects/create.blade.php`

**Sections**:
- **Section ①**: Design Basics (title, description)
- **Section ②**: Media Upload (drag-drop, preview)
- **Section ③**: Project Links (Figma, GitHub, Live, TikTok)
- **Section ④**: Tags (comma-separated)

**Features**:
- Drag-and-drop file upload
- Image and video preview
- Form validation with error messages
- Gradient buttons
- Icon-labeled link inputs
- Numbered sections for clarity

### 3. Edit Design Page
**File**: `resources/views/projects/edit.blade.php`

**Structure**: Similar to Create, but with:
- Current media display
- Optional media change
- Pre-filled form data
- Update button instead of Create

## 🎯 Interactive Elements

### Buttons
```
Primary Button:
- Background: Gradient pink → orange
- Hover: Darker gradient
- Padding: 12px 28px
- Border Radius: 6px
- Text: White, uppercase, tracking-widest
```

### Cards
```
Project Card:
- Background: White with subtle border
- Hover: Lift (translateY -6px), shadow increase
- Image: Scale up 1.08
- Border Radius: 8px
```

### Form Inputs
```
Input/Textarea:
- Border: 1px solid gray-300
- Focus: Ring 2px solid pink-300
- Background: Cream on focus (#fdf8f6)
- Border Radius: 8px (rounded-lg)
```

## 🚀 Getting Started

### Installation & Setup
```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate

# Compile assets
npm run build
```

### Development
```bash
# Start development server
php artisan serve

# In another terminal, watch for asset changes
npm run dev
```

### Access the Portfolio
- **Home**: http://localhost:8000
- **Create Design**: http://localhost:8000/projects/create
- **Edit Design**: http://localhost:8000/projects/{id}/edit

## 📸 What Users Can Do

### 1. Create a Design
- Upload image or video
- Add title and description
- Add project links (Figma, GitHub, Live, TikTok)
- Add tags for categorization
- Publish to portfolio

### 2. View Portfolio
- Browse all published designs in a responsive grid
- See preview with hover effects
- View author information
- Access external links directly

### 3. Edit a Design
- Update all project information
- Change media if needed
- Update links and tags
- Save changes

### 4. Delete a Design
- One-click delete with confirmation
- Removes project from portfolio

## 🎨 Customization Tips

### Change Colors
Edit `resources/views/layouts/app.blade.php`:
```css
/* Pink → Your Color */
from-pink-400 to-orange-400  /* Change to from-[yourColor]-400 to-[yourColor]-500 */

/* Text Color */
text-gray-800  /* Adjust gray values */
```

### Adjust Spacing
Modify container padding and gaps in Tailwind classes:
```html
px-8    <!-- Horizontal padding -->
py-16   <!-- Vertical padding -->
gap-8   <!-- Grid/flex gap -->
```

### Modify Typography
In the `<style>` section of `app.blade.php`:
```css
font-family: 'Montserrat', sans-serif;  /* Change font */
letter-spacing: 3px;  /* Adjust letter spacing */
font-weight: 300;  /* Adjust weights */
```

## 📁 File Structure

```
resources/views/
├── layouts/
│   └── app.blade.php          (Main layout with styling)
└── projects/
    ├── index.blade.php         (Portfolio homepage)
    ├── create.blade.php        (Create design form)
    ├── edit.blade.php          (Edit design form)
    └── index_final.blade.php   (Alternative layout - not in use)
```

## 🔒 Security Features

- CSRF protection on all forms
- File upload validation (max 100MB)
- Only image/video files allowed
- Database sanitization via Eloquent ORM
- Route model binding for safety

## ⚡ Performance Tips

1. **Image Optimization**: Compress images before upload
2. **Lazy Loading**: Images will load progressively (from Tailwind defaults)
3. **Pagination**: Projects paginated at 15 per page
4. **Caching**: Consider adding caching for production

## 🐛 Troubleshooting

### Images not showing
```bash
# Link storage
php artisan storage:link
```

### Database issues
```bash
# Fresh migration
php artisan migrate:fresh

# Reset with seeding
php artisan migrate:fresh --seed
```

### Asset not loading
```bash
# Recompile assets
npm run build
```

## 📝 Notes

- **No Dummy Data**: Database starts empty - add real projects
- **Drag & Drop**: Fully functional file upload with preview
- **Responsive**: Mobile-first design, works on all devices
- **Fast**: Optimized queries with pagination
- **Easy to Maintain**: Clean, organized code structure

## 🎓 Learning Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Font Awesome Icons](https://fontawesome.com)
- [Blade Template Engine](https://laravel.com/docs/blade)

---

**Last Updated**: March 2026
**Version**: 1.0
**Status**: Production Ready ✅
