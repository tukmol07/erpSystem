<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
        <form action="/Auth/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-sm text-center">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
    </div>
</body>
</html>
