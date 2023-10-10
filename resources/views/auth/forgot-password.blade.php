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

        .mb-4 {
            margin-bottom: 16px;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-gray-600 {
            color: #666;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 4px;
        }

        .mt-2 {
            margin-top: 8px;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .flex {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .w-full {
            width: 100%;
        }

        .block {
            display: block;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        .input-label {
            font-weight: bold;
            margin-bottom: 6px;
            margin-top: 8px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .primary-button {
            background-color: #F18D34;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
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
    <div class="container">
        <!-- Gambar logo -->
        <div class="logo">
            <img src="path/ke/gambar/anda.jpg" alt="logo">
        </div>
        <br>
        <div class="mb-4 text-sm text-gray-600 text-center">
            Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        <!-- (Include your session status message here) -->

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="input-label">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>
            <br>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="primary-button">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</body>
</html>
