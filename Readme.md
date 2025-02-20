# Saturn Theme

A modern, clean, and responsive theme for Paymenter with enhanced UI/UX features.

## One-Click Installation

```bash
sudo bash -c "$(curl -fsSL https://raw.githubusercontent.com/craterXO/Saturn-Paymenter-theme/main/install.sh)"
```

## Manual Installation

### Prerequisites
- Paymenter installed and running
- Node.js and npm installed
- Composer installed

### Manual Installation Steps

1. Navigate to your themes directory and create the theme folder:
```bash
cd themes/
mkdir Saturn
```

2. Clone the repository:
```bash
git clone https://github.com/craterXO/Saturn-Paymenter-theme.git
```

3. Set proper permissions:
```bash
chmod -R 755 Saturn
chown -R www-data:www-data Saturn
```

4. Compile assets from Paymenter root:
```bash
npm run build
```

5. Clear Laravel cache:
```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan optimize
```

### Theme Activation

1. Go to Admin Panel → Settings → Themes
2. Select "Saturn Theme"
3. Save changes

### Troubleshooting

If you encounter 500 errors:
1. Check permissions
2. Clear all caches
3. Check Laravel logs in storage/logs/laravel.log
4. Verify all files are in correct locations

## Features
- Responsive design
- Dark mode support
- Enhanced UI components
- Mobile-friendly layout
- Custom login/register pages
- Improved dashboard layout

## Support
For support, please create an issue in the repository.

## License
MIT License
