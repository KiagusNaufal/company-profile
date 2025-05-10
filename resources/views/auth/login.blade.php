<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kami</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .login-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .login-card:hover {
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.15);
        }
        .input-field:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .btn-login {
            background-image: linear-gradient(to right, #4f46e5, #7c3aed);
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-image: linear-gradient(to right, #4338ca, #6d28d9);
            transform: translateY(-2px);
        }
        .show-password {
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="login-card w-full max-w-md bg-white rounded-xl overflow-hidden p-8">
            <div class="text-center mb-8">
                <img src="{{ asset('image/company.svg') }}" alt="Company Logo" class="h-32 mx-auto mb-4">
                <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
                <p class="text-gray-600">Masuk ke akun Anda</p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-4 bg-red-50 text-red-600 rounded-lg">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form id="loginForm" class="space-y-6" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div id="clientErrorMessage" class="hidden p-4 bg-red-50 text-red-600 rounded-lg"></div>
                
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none"
                               placeholder="email@contoh.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none"
                               placeholder="••••••••">
                        <button type="button" class="show-password absolute" onclick="togglePassword()">
                            <svg id="eyeIcon" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login w-full py-3 px-4 text-white font-medium rounded-lg shadow">
                    <span id="loginText">Masuk</span>
                    <span id="loginLoader" class="hidden">
                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>
            </form>

        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        // Handle form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('clientErrorMessage');
            const loginText = document.getElementById('loginText');
            const loginLoader = document.getElementById('loginLoader');
            
            // Reset error message
            errorMessage.classList.add('hidden');
            
            // Client-side validation
            let isValid = true;
            
            if (!email.includes('@') || !email.includes('.')) {
                errorMessage.textContent = 'Format email tidak valid';
                errorMessage.classList.remove('hidden');
                isValid = false;
            }
            
            if (password.length < 6) {
                errorMessage.textContent = 'Password minimal 6 karakter';
                errorMessage.classList.remove('hidden');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
                return;
            }
            
            // Show loading state if validation passes
            loginText.classList.add('hidden');
            loginLoader.classList.remove('hidden');
            
            // Form will submit normally to server
        });
    </script>
</body>
</html>