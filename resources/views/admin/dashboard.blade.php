<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-blue-900 text-white p-5">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <ul class="mt-4">
                <li class="py-2"><a href="#" class="hover:underline">Dashboard</a></li>
                <li class="py-2"><a href="#" class="hover:underline">Users</a></li>
                <li class="py-2"><a href="#" class="hover:underline">Settings</a></li>
                <li class="py-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-10">
            <h1 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
            <p class="mt-2 text-gray-700">You are logged in as an admin.</p>
        </div>
    </div>
</body>
</html>
