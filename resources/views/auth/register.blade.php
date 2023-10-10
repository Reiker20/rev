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

        .mt-4 {
            margin-top: 16px;
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

        /* .submit-button:hover {
            background-color: #fff;
            color: #F18D34;
            border: 1px solid #F18D34;
        } */

        .mt-5 {
            margin-top: 20px;
        }

        .text-center {
            text-align: center;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-gray-600 {
            color: #666;
        }

        .hover\:text-gray-900:hover {
            color: #333;
        }

        .underline {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
                <!-- Isi dengan pesan error jika ada kesalahan di sini -->
            </div>

            <div class="mt-5">
                <div style="display: flex; align-items: center; justify-content: center;">
                    <button type="submit" class="submit-button">
                        Register
                    </button>
                </div>
            </div>

            <!-- tambahkan text button sudah punya akun? di sebelah kanan -->
            <div class="mt-4 text-center">
                Already have an account? <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
