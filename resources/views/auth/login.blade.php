<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-size: 14px;
            color: #333;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-container {
            color: red;
            text-align: left;
            margin-bottom: 20px;
            font-size: 14px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            @if ($errors->any())
                <div class="error-container">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
