# Laravel Admin Panel

A comprehensive admin panel built with Laravel 12, featuring OTP-based authentication and website settings management.

## Features

### 🔐 Authentication
- **OTP-based Login**: Secure admin authentication using one-time passwords sent via email
- **Session Management**: Secure session handling with proper logout functionality
- **Admin Middleware**: Protected routes with admin authentication middleware

### ⚙️ Settings Management
- **General Settings**: Website title, contact information, timezone configuration
- **Social Media**: Links to Facebook, Twitter, Instagram, LinkedIn, YouTube, Pinterest
- **Theme Customization**: Primary/secondary colors, fonts, background colors
- **Email Configuration**: SMTP settings for email delivery
- **Custom Code**: Add custom CSS and JavaScript
- **Maintenance Mode**: Toggle website maintenance mode

### 📊 Dashboard
- **Statistics Overview**: User count, active OTPs, website status
- **Quick Actions**: Easy access to settings and maintenance toggle
- **Recent Activity**: Track admin panel activities

## Installation

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

5. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Default Admin Credentials

- **Email**: admin@example.com
- **Password**: password (for initial setup, then use OTP login)

## Usage

### Admin Login
1. Navigate to `/admin/login`
2. Enter your admin email address
3. Click "Send OTP" to receive a one-time password via email
4. Enter the 6-digit OTP code
5. Click "Verify OTP" to access the admin panel

### Managing Settings
1. Access the admin dashboard at `/admin/dashboard`
2. Click on "Settings" in the sidebar
3. Use the tabs to navigate between different setting categories:
   - **General**: Basic website information
   - **Social Media**: Social platform links
   - **Theme**: Visual customization
   - **Email**: SMTP configuration
   - **Custom Code**: CSS and JavaScript

### OTP System
- OTPs are valid for 10 minutes
- Each OTP can only be used once
- Old unused OTPs are automatically cleaned up
- OTPs are sent via the configured SMTP settings

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   │       ├── AuthController.php      # OTP authentication
│   │       ├── DashboardController.php # Admin dashboard
│   │       └── SettingsController.php  # Settings management
│   └── Middleware/
│       └── AdminAuth.php              # Admin authentication middleware
├── Models/
│   ├── Otp.php                        # OTP model with generation/verification
│   └── Setting.php                    # Settings model with caching
resources/
└── views/
    └── admin/
        ├── layouts/
        │   └── app.blade.php          # Admin layout template
        ├── auth/
        │   └── login.blade.php        # OTP login form
        ├── dashboard.blade.php        # Admin dashboard
        └── settings/
            └── index.blade.php        # Settings management interface
routes/
└── admin.php                          # Admin routes
```

## API Endpoints

### Authentication
- `POST /admin/send-otp` - Send OTP to admin email
- `POST /admin/verify-otp` - Verify OTP and login
- `POST /admin/logout` - Logout admin

### Settings
- `GET /admin/settings` - View settings page
- `POST /admin/settings/general` - Update general settings
- `POST /admin/settings/social` - Update social media settings
- `POST /admin/settings/theme` - Update theme settings
- `POST /admin/settings/email` - Update email settings
- `POST /admin/settings/custom` - Update custom code
- `POST /admin/settings/maintenance` - Toggle maintenance mode

## Configuration

### Email Settings
Configure your SMTP settings in the admin panel or in your `.env` file:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="Your App Name"
```

### Cache Configuration
Settings are cached for 1 hour by default. You can modify the cache duration in the `Setting` model.

## Security Features

- **OTP Expiration**: OTPs expire after 10 minutes
- **Single Use**: Each OTP can only be used once
- **CSRF Protection**: All forms include CSRF tokens
- **Input Validation**: All inputs are validated on both client and server side
- **Secure Sessions**: Proper session management with regeneration

## Customization

### Adding New Settings
1. Add the field to the `settings` migration
2. Add the field to the `$fillable` array in the `Setting` model
3. Add the field to the appropriate settings form in the admin interface
4. Add the field to the corresponding controller method

### Styling
The admin panel uses Tailwind CSS 4.0. You can customize the appearance by:
- Modifying the CSS classes in the Blade templates
- Adding custom CSS through the "Custom Code" settings
- Updating the Tailwind configuration

## Troubleshooting

### OTP Not Received
1. Check your SMTP configuration
2. Verify the email address is correct
3. Check your spam folder
4. Ensure the mail queue is running (if using queues)

### Settings Not Saving
1. Check database permissions
2. Verify the settings table exists
3. Check for validation errors in the browser console

### Admin Panel Not Loading
1. Ensure all migrations have been run
2. Check that the admin routes are properly registered
3. Verify the middleware is correctly configured

## License

This admin panel is part of the Laravel Admin Boilerplate project and follows the same MIT license as Laravel.
