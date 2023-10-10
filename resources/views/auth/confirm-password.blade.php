<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #666;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .w-full {
            width: 100%;
        }

        .block {
            display: block;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .flex {
            display: flex;
            flex-direction: column;
            align-items: center;
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

        .primary-button:hover {
            background-color: #fff;
            color: #F18D34;
            border: 1px solid #F18D34;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                <!-- Error Messages -->
                <!-- Replace with your error message rendering logic if needed -->
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="primary-button">
                    Confirm
                </button>
            </div>
        </form>
    </div>
</body>
</html>
