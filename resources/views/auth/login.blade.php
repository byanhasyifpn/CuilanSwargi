<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Cuilan Swargi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E514B',
                        secondary: '#FBF7CA',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-lg shadow-xl p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-primary mb-2">Admin Panel</h1>
                    <p class="text-gray-600">Cuilan Swargi</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                               required>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2">
                            <span class="text-gray-700">Ingat Saya</span>
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90 transition">
                        Login
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-primary hover:text-primary/80">
                        &larr; Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>