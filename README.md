# 🏠 HomeUs - Professional Appliance Repair Platform

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A comprehensive web application for professional appliance repair services with multi-role authentication, booking management, and real-time notifications.

## ✨ Features

### 🎯 Core Functionality
- **Multi-Role Authentication** - Admin, Customer, and Technician portals
- **Service Management** - Complete CRUD operations with image uploads
- **Booking System** - End-to-end booking workflow with status tracking
- **Real-time Notifications** - Instant updates for all stakeholders
- **File Upload System** - Profile pictures, service images, and issue documentation
- **Responsive Design** - Mobile-first approach with Android-style navigation

### 🔐 User Roles

#### 👨‍💼 Admin Portal
- Dashboard with analytics and statistics
- Service category and service management
- Customer and technician management
- Booking oversight and status updates
- Component and notification management
- Settings and configuration

#### 👤 Customer Portal
- Service browsing with advanced filtering
- Booking creation and management
- Profile management with address information
- Booking history and status tracking
- Real-time notifications
- Mobile-optimized interface

#### 🔧 Technician Portal
- Job dashboard with assigned bookings
- Profile management with skills and availability
- Booking status updates and notes
- Notification system
- Mobile-responsive design

### 🎨 Design Features
- **Modern UI/UX** - Clean, professional interface
- **Dark Mode Support** - Toggle between light and dark themes
- **Responsive Design** - Works perfectly on all devices
- **Mobile Navigation** - Android-style bottom navigation for mobile
- **Animations** - Smooth transitions and hover effects
- **Gradient Designs** - Beautiful color schemes and gradients

## 🚀 Quick Start

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM
- SQLite or MySQL database

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/webintez/homus.git
   cd homus
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Storage setup**
   ```bash
   php artisan storage:link
   ```

6. **Start the application**
   ```bash
   php artisan serve
   npm run dev
   ```

## 📊 Database Schema

### Key Tables
- **users** - Admin users
- **customers** - Customer accounts
- **technicians** - Technician profiles
- **service_categories** - Service categories
- **services** - Available services with images
- **bookings** - Customer bookings
- **booking_statuses** - Booking status history
- **notifications** - System notifications
- **settings** - Application settings

### Sample Data
The application comes with pre-seeded data:
- 1 Admin account
- 3 Customer accounts
- 4 Technician accounts
- 8 Service categories
- 13 Services with images
- Sample bookings and notifications

## 🔧 Configuration

### Environment Variables
```env
APP_NAME="HomeUs - Professional Appliance Repair"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=homus
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
```

### File Storage
- Service images: `storage/app/public/services/`
- Profile pictures: `storage/app/public/technician-profiles/`
- Issue images: `storage/app/public/issue-images/`

## 🌐 Deployment

### Hostinger Deployment
Complete deployment package included:
- `HOSTINGER_DEPLOYMENT_GUIDE.md` - Step-by-step deployment
- `DEPLOYMENT_SUMMARY.md` - Quick deployment overview
- `database_mysql_export.sql` - MySQL database export
- `optimize_app.php` - Production optimization script

### Quick Deployment Steps
1. Upload files to Hostinger
2. Import database
3. Configure environment
4. Run optimization scripts

## 📱 Mobile Features

### Android-Style Navigation
- Bottom navigation bar for mobile devices
- Collapsible menu for desktop
- Touch-friendly interface
- Responsive design patterns

### Mobile Optimizations
- Optimized images and assets
- Touch gestures support
- Mobile-specific UI components
- Performance optimizations

## 🎨 UI/UX Features

### Design System
- **Color Palette** - Professional blue and purple gradients
- **Typography** - Clean, readable fonts
- **Spacing** - Consistent spacing system
- **Components** - Reusable UI components

### Dark Mode
- System preference detection
- Manual toggle option
- Persistent storage
- Smooth transitions

### Animations
- Page transitions
- Hover effects
- Loading states
- Micro-interactions

## 🔒 Security Features

- **CSRF Protection** - All forms protected
- **Input Validation** - Server-side validation
- **File Upload Security** - Type and size validation
- **Authentication Guards** - Separate auth systems
- **Password Hashing** - Secure password storage

## 📈 Performance

### Optimizations
- **Caching** - Configuration, routes, and views
- **Image Optimization** - Compressed and resized images
- **Database Indexing** - Optimized queries
- **Asset Minification** - Compressed CSS and JS

### Monitoring
- Error logging
- Performance metrics
- User activity tracking
- System health checks

## 🧪 Testing

### Test Accounts
- **Admin**: admin@example.com / password
- **Customer**: john.smith@example.com / password123
- **Technician**: david.brown@example.com / password123

### Test Features
- All CRUD operations
- File uploads
- Authentication flows
- Mobile responsiveness
- Dark mode functionality

## 📚 Documentation

### Included Documentation
- `ADMIN_README.md` - Admin panel documentation
- `ADMIN_FRONTEND_DOCUMENTATION.md` - Frontend guide
- `DUAL_AUTH_README.md` - Authentication system
- `HOSTINGER_DEPLOYMENT_GUIDE.md` - Deployment guide

### API Documentation
- RESTful API endpoints
- Authentication methods
- Request/response formats
- Error handling

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

### Common Issues
- Check the troubleshooting guides
- Review error logs
- Verify environment configuration
- Test with sample data

### Getting Help
- Create an issue on GitHub
- Check the documentation
- Review the deployment guides

## 🎯 Roadmap

### Planned Features
- [ ] Real-time chat system
- [ ] Payment integration
- [ ] Advanced analytics
- [ ] Mobile app
- [ ] API for third-party integrations

### Recent Updates
- ✅ Image upload system
- ✅ Mobile navigation
- ✅ Dark mode support
- ✅ Service management
- ✅ Booking system

## 📞 Contact

- **Developer**: WebIntez
- **Email**: support@webintez.com
- **GitHub**: [@webintez](https://github.com/webintez)

---

**HomeUs** - Professional appliance repair services at your doorstep! 🏠🔧