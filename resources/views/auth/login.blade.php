<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/your/css/styles.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            margin-top: 8px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
        }

        .checkbox-label input[type="checkbox"] {
            margin-right: 8px;
        }

        .submit-button {
            background-color: #F18D34;
            color: #fff;
            border: none;
            padding: 10px 0;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .forgot-password {
            text-align: right;
            margin-top: 8px;
            margin-bottom: 6px;
            font-size: 0.8rem;
            font-family: 'Nunito', sans-serif;
        }

        .forgot-password a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
            .submit-button {
                font-size: 16px; /* Menyesuaikan ukuran font tombol pada layar kecil */
            }
        }
    </style>
</head>
<body>
    <!-- Session Status -->
    <div class="mb-4">
        <!-- Isi dengan pesan session status sesuai kebutuhan -->
    </div>

    <div class="container">
        <!-- Gambar logo -->
        <div class="logo">
            
        </div>
        <br>

        <form method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <!-- jarak -->
                <div style="width: 30px;"></div>
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                @endif
            </div>
            <!-- jarak -->
            <div style="height: 20px;"></div>
            <div class="mt-4">
                <div style="display: flex; align-items: center; justify-content: center;">
                    <button type="submit" class="submit-button">
                        Login
                    </button>
                </div>
            </div>

            <!-- Tambahkan tautan "Belum punya akun?" sesuai kebutuhan -->
            <!-- <div class="mt-4 text-center">
                Don't have an account? <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Register</a>
            </div> -->
        </form>
    </div>
</body>
</html>
