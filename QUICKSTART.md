# 🚀 JEAUONIA Portfolio - Quick Start Guide

## Getting Started in 5 Minutes

### Step 1: Start the Server
```bash
cd /Users/jacquel/Documents/portofolio
php artisan serve
```

Visit: **http://localhost:8000**

### Step 2: Create Your First Design
1. Click **"+ PUBLISH NEW DESIGN"** button
2. Fill in the form:
   - **Design Title**: Your project name
   - **Description**: Story behind your design
   - **Media**: Upload image or video
   - **Links**: Add Figma, GitHub, Live URL, or TikTok
   - **Tags**: e.g., "UI Design, Web Design"
3. Click **PUBLISH DESIGN**

### Step 3: Manage Your Portfolio
- **View**: All projects display in a responsive grid
- **Edit**: Click EDIT on any project to update
- **Delete**: Click DELETE to remove projects

---

## ✨ Features Ready to Use

| Fitur | Status | Path |
|-------|--------|------|
| Daftar Projects | ✅ | `GET /` |
| Tambah Project | ✅ | `GET /projects/create` |
| Edit Project | ✅ | `GET /projects/{id}/edit` |
| Hapus Project | ✅ | `DELETE /projects/{id}` |
| Upload Gambar | ✅ | Drag & drop di form |
| Upload Video | ✅ | Drag & drop di form |
| Preview | ✅ | Auto-show saat pilih file |

---

## 📂 File-file yang Dibuat

```
✅ Migration       → database/migrations/2026_03_24_000003_create_projects_table.php
✅ Model Project   → app/Models/Project.php
✅ Controller      → app/Http/Controllers/ProjectController.php
✅ Routes          → routes/web.php
✅ View Index      → resources/views/projects/index.blade.php
✅ View Create     → resources/views/projects/create.blade.php
✅ View Edit       → resources/views/projects/edit.blade.php
✅ Layout          → resources/views/layouts/app.blade.php
✅ Factory         → database/factories/ProjectFactory.php
✅ Seeder          → database/seeders/DatabaseSeeder.php
```

---

## 🎯 Penggunaan

### A. Tampilkan Semua Projects
```
http://localhost:8000/
```
Menampilkan grid projects dengan pagination

### B. Tambah Project Baru
```
http://localhost:8000/projects/create
```
- Isi title (wajib)
- Isi description (opsional)
- Upload gambar atau video
- Submit form

### C. Edit Project
Klik tombol "Edit" di project card
- Update title/description
- Ganti gambar/video
- Submit changes

### D. Hapus Project
Klik tombol "Hapus" di project card
- Confirm deletion
- File akan otomatis terhapus dari storage

---

## 📝 Testing dengan Sample Data

Setelah `php artisan db:seed`, akan tersedia:
- 1 user: `test@example.com`
- 6 sample projects

Semua project sudah punya description, tinggal upload gambar/video jika ingin.

---

## 🔍 Debug Commands

```bash
# Lihat semua routes
php artisan route:list

# Clear cache
php artisan cache:clear
php artisan route:clear

# Reset database
php artisan migrate:fresh --seed

# Check storage link
ls -la public/storage
```

---

## 💾 Database Queries Berguna

```php
// Get all projects
$projects = Project::with('user')->get();

// Get projects dari user tertentu
$userProjects = User::find(1)->projects;

// Get project dengan latest first
$projects = Project::latest()->get();

// Delete project (dan file media nya)
$project = Project::find(1);
Storage::disk('public')->delete($project->media_path);
$project->delete();
```

---

## 🎨 Customize Styling

Edit file-file view di `resources/views/` untuk customize tampilan.
Sudah menggunakan Tailwind CSS, jadi mudah di-customize.

---

## ⚠️ Common Issues & Solutions

| Issue | Solusi |
|-------|--------|
| File upload tidak muncul | Run `php artisan storage:link` |
| Database connection error | Check `.env` dan pastikan MySQL running |
| 404 pada routes | Run `php artisan route:clear` |
| Storage folder tidak ada | Run `php artisan migrate` dulu |

---

## 📊 Project Structure

```
📦 portofolio/
 ├── 📁 app/
 │   ├── 📁 Http/Controllers/
 │   │   └── ProjectController.php
 │   └── 📁 Models/
 │       ├── User.php
 │       └── Project.php
 ├── 📁 database/
 │   ├── 📁 migrations/
 │   ├── 📁 factories/
 │   └── 📁 seeders/
 ├── 📁 resources/views/
 │   ├── 📁 layouts/
 │   └── 📁 projects/
 ├── 📁 routes/
 ├── 📁 storage/app/public/projects/
 │   ├── 📁 images/
 │   └── 📁 videos/
 ├── 📁 public/storage/
 └── .env
```

---

## 🚀 Production Checklist

- [ ] Update `.env` untuk production
- [ ] Set `APP_DEBUG=false`
- [ ] Set proper database credentials
- [ ] Test file uploads
- [ ] Test delete functionality
- [ ] Check pagination
- [ ] Verify storage links working

---

## 📞 Support

Untuk setup lebih lanjut, lihat file:
- `PORTFOLIO_SETUP.md` - Dokumentasi lengkap
- `README.md` - Original Laravel README

Happy coding! 🎉
