<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Admin Login
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    @if($smtpConfigured)
                        Enter your email to receive an OTP
                    @else
                        Enter your email and password to login
                    @endif
                </p>
            </div>

            <!-- Login Form -->
            <form class="mt-8 space-y-6" id="login-form">
                @csrf
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                           class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                           placeholder="Email address">
                    <div id="email-error" class="mt-2 text-sm text-red-600 hidden"></div>
                </div>

                @if(!$smtpConfigured)
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                           class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                           placeholder="Password">
                    <div id="password-error" class="mt-2 text-sm text-red-600 hidden"></div>
                </div>
                @endif

                <div>
                    <button type="submit" id="login-btn" 
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            @if($smtpConfigured)
                                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            @else
                                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            @endif
                        </span>
                        @if($smtpConfigured)
                            Send OTP
                        @else
                            Login
                        @endif
                    </button>
                </div>
            </form>

            <!-- OTP Form (Hidden initially) -->
            <form class="mt-8 space-y-6 hidden" id="otp-form">
                @csrf
                <div>
                    <label for="otp" class="sr-only">OTP Code</label>
                    <input id="otp" name="otp" type="text" maxlength="6" required 
                           class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm text-center text-2xl tracking-widest" 
                           placeholder="000000">
                    <div id="otp-error" class="mt-2 text-sm text-red-600 hidden"></div>
                </div>

                <div class="flex space-x-4">
                    <button type="button" id="back-to-email" 
                            class="flex-1 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Back
                    </button>
                    <button type="submit" id="verify-otp-btn" 
                            class="flex-1 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">
                        Verify OTP
                    </button>
                </div>
            </form>

            <!-- Success/Error Messages -->
            <div id="message" class="hidden">
                <div class="rounded-md p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium" id="message-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let userEmail = '';
        const smtpConfigured = {{ $smtpConfigured ? 'true' : 'false' }};

        // Login form submission
        document.getElementById('login-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password') ? document.getElementById('password').value : null;
            const loginBtn = document.getElementById('login-btn');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            
            // Clear previous errors
            emailError.classList.add('hidden');
            emailError.textContent = '';
            if (passwordError) {
                passwordError.classList.add('hidden');
                passwordError.textContent = '';
            }
            
            // Disable button and show loading
            loginBtn.disabled = true;
            const loadingText = smtpConfigured ? 'Sending...' : 'Logging in...';
            loginBtn.innerHTML = `<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>${loadingText}`;

            try {
                let response;
                let data;

                if (smtpConfigured) {
                    // OTP flow
                    response = await fetch('{{ route("admin.send-otp") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email: email })
                    });
                    data = await response.json();

                    if (data.success) {
                        userEmail = email;
                        document.getElementById('login-form').classList.add('hidden');
                        document.getElementById('otp-form').classList.remove('hidden');
                        showMessage(data.message, 'success');
                    } else {
                        emailError.textContent = data.message;
                        emailError.classList.remove('hidden');
                    }
                } else {
                    // Traditional login flow
                    response = await fetch('{{ route("admin.login.post") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email: email, password: password })
                    });
                    data = await response.json();

                    if (data.success) {
                        showMessage(data.message, 'success');
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1000);
                    } else {
                        if (data.errors) {
                            if (data.errors.email) {
                                emailError.textContent = data.errors.email[0];
                                emailError.classList.remove('hidden');
                            }
                            if (data.errors.password && passwordError) {
                                passwordError.textContent = data.errors.password[0];
                                passwordError.classList.remove('hidden');
                            }
                        } else {
                            emailError.textContent = data.message;
                            emailError.classList.remove('hidden');
                        }
                    }
                }
            } catch (error) {
                emailError.textContent = 'An error occurred. Please try again.';
                emailError.classList.remove('hidden');
            } finally {
                loginBtn.disabled = false;
                const buttonText = smtpConfigured ? 'Send OTP' : 'Login';
                loginBtn.innerHTML = buttonText;
            }
        });

        // OTP form submission
        document.getElementById('otp-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const otp = document.getElementById('otp').value;
            const verifyOtpBtn = document.getElementById('verify-otp-btn');
            const otpError = document.getElementById('otp-error');
            
            // Clear previous errors
            otpError.classList.add('hidden');
            otpError.textContent = '';
            
            // Disable button and show loading
            verifyOtpBtn.disabled = true;
            verifyOtpBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Verifying...';

            try {
                const response = await fetch('{{ route("admin.verify-otp") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ 
                        email: userEmail,
                        otp: otp 
                    })
                });

                const data = await response.json();

                if (data.success) {
                    showMessage(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    otpError.textContent = data.message;
                    otpError.classList.remove('hidden');
                }
            } catch (error) {
                otpError.textContent = 'An error occurred. Please try again.';
                otpError.classList.remove('hidden');
            } finally {
                verifyOtpBtn.disabled = false;
                verifyOtpBtn.innerHTML = 'Verify OTP';
            }
        });

        // Back to login form
        document.getElementById('back-to-email').addEventListener('click', function() {
            document.getElementById('otp-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
            document.getElementById('otp').value = '';
        });

        // Auto-format OTP input
        document.getElementById('otp').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '').substring(0, 6);
        });

        function showMessage(text, type) {
            const messageDiv = document.getElementById('message');
            const messageText = document.getElementById('message-text');
            
            messageText.textContent = text;
            messageDiv.classList.remove('hidden');
            
            // Remove success/error classes
            messageDiv.querySelector('.rounded-md').className = 'rounded-md p-4';
            
            if (type === 'success') {
                messageDiv.querySelector('.rounded-md').classList.add('bg-green-50', 'dark:bg-green-900');
                messageText.classList.add('text-green-800', 'dark:text-green-200');
            } else {
                messageDiv.querySelector('.rounded-md').classList.add('bg-red-50', 'dark:bg-red-900');
                messageText.classList.add('text-red-800', 'dark:text-red-200');
            }
            
            // Hide message after 5 seconds
            setTimeout(() => {
                messageDiv.classList.add('hidden');
            }, 5000);
        }
    </script>
</body>
</html>
