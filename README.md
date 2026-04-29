# StudyArch — PHP Learning Portal

A modular, read-only academic course portal built in PHP.
No database required — all content lives in PHP files.

---

## File Structure

```
studyarch/
├── index.php                  ← Homepage (lists all courses)
├── course.php                 ← Course page (chapters + modules accordion)
├── module.php                 ← Module viewer (sidebar + content)
├── 404.php                    ← 404 error page
├── .htaccess                  ← Apache security rules
│
├── includes/
│   ├── config.php             ← ALL course/chapter/module data lives here
│   ├── header.php             ← Shared HTML <head> + top navigation
│   └── footer.php             ← Shared footer + JS
│
├── assets/
│   ├── css/style.css          ← Full stylesheet
│   └── js/app.js              ← Accordion + progress bar JS
│
└── courses/
    └── i2206/
        └── modules/
            ├── m01.php        ← Module content files (pure HTML fragments)
            ├── m02.php
            ├── ...
            └── m12.php
```

---

## Deployment

### Requirements
- PHP 7.4+ (no extensions needed)
- Apache with `mod_rewrite` enabled (or Nginx — see below)
- Any standard web host or local server (XAMPP, MAMP, Laragon, etc.)

### Steps
1. Upload the entire `studyarch/` folder to your web server's public directory (e.g. `public_html/studyarch/`).
2. If the site is NOT at the root (e.g. it's at `https://example.com/studyarch/`):
   - Open `includes/config.php`
   - Change `define('BASE_URL', '');` to `define('BASE_URL', '/studyarch');`
3. Make sure `mod_rewrite` is enabled and `AllowOverride All` is set in Apache config.
4. Visit `https://yoursite.com/studyarch/` — you're live.

### Nginx equivalent of .htaccess
```nginx
location ~ ^/(includes|courses)/ {
    deny all;
    return 403;
}
error_page 404 /404.php;
```

---

## Adding a New Course

1. Open `includes/config.php`.
2. Add a new entry to the `$COURSES` array following the existing `i2206` structure.
3. Create a folder: `courses/{new_course_id}/modules/`
4. Add module `.php` files (pure HTML fragments — no `<html>` or `<body>` tags).
5. Register each module file in `config.php`.

## Adding a Module to an Existing Course

1. Create `courses/i2206/modules/m13.php` with your HTML content.
2. In `config.php`, add to the appropriate chapter's `modules` array:
   ```php
   'm13' => ['id' => 'm13', 'title' => 'Your Module Title', 'file' => 'courses/i2206/modules/m13.php'],
   ```

---

## Security Notes

- Module files are protected from direct browser access via `.htaccess`.
- All user input (`$_GET` parameters) is validated against the `$COURSES` registry before use.
- Output is escaped with `htmlspecialchars()` throughout.
- The site is fully read-only — no forms, no POST handlers, no file uploads.
