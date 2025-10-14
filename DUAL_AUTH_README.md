# Dual Authentication System

The admin panel now supports two authentication methods based on SMTP configuration:

## 🔐 Authentication Methods

### 1. **OTP Authentication** (When SMTP is configured)
- **When**: SMTP settings are properly configured (host, port, username, password)
- **Process**: 
  1. Enter admin email
  2. Click "Send OTP"
  3. Check email for 6-digit code
  4. Enter OTP and click "Verify OTP"
- **Security**: High - requires access to email account

### 2. **Password Authentication** (When SMTP is not configured)
- **When**: SMTP settings are missing or incomplete
- **Process**:
  1. Enter admin email and password
  2. Click "Login"
- **Security**: Standard - requires email and password

## ⚙️ How It Works

The system automatically detects SMTP configuration by checking:
- `smtp_host` - SMTP server hostname
- `smtp_port` - SMTP server port
- `smtp_username` - SMTP username
- `smtp_password` - SMTP password

If all four values are present and not empty, OTP authentication is enabled.
Otherwise, traditional password authentication is used.

## 🚀 Current Status

**SMTP Status**: Not configured
**Authentication Method**: Password Login
**Admin Credentials**:
- Email: `admin@example.com`
- Password: `password`

## 📝 Configuration

### To Enable OTP Authentication:
1. Go to Admin Panel → Settings → Email
2. Fill in SMTP configuration:
   - SMTP Host (e.g., `smtp.gmail.com`)
   - SMTP Port (e.g., `587`)
   - SMTP Username (your email)
   - SMTP Password (your app password)
   - Encryption (TLS/SSL)
3. Save settings
4. Next login will use OTP authentication

### To Disable OTP Authentication:
1. Go to Admin Panel → Settings → Email
2. Clear any of the required SMTP fields
3. Save settings
4. Next login will use password authentication

## 🔄 Switching Between Methods

The system automatically switches between authentication methods based on SMTP configuration:

- **SMTP Configured** → OTP Login Form
- **SMTP Not Configured** → Password Login Form

No manual intervention required - the system detects the configuration and shows the appropriate form.

## 🛡️ Security Features

### OTP Authentication:
- 6-digit numeric codes
- 10-minute expiration
- Single-use only
- Auto-cleanup of expired codes
- Email delivery verification

### Password Authentication:
- Standard Laravel authentication
- Session management
- CSRF protection
- Input validation

## 🎯 Use Cases

### Development/Testing:
- Use password authentication for quick access
- No email setup required

### Production:
- Configure SMTP for OTP authentication
- Enhanced security for production environments

## 📱 User Experience

The login form dynamically adapts:
- **With SMTP**: Shows email field + "Send OTP" button
- **Without SMTP**: Shows email + password fields + "Login" button

Users see appropriate instructions and interface based on the current configuration.
