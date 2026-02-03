<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'My Portfolio App')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body class="bg-gray-100 text-gray-900">
        <nav class="bg-white border-b">
            <div class="max-w'6xl mx-auto px-4 py-3 flex justify-between items-center">
                <a href="{{ route('items.index') }}" class="font-semibold">
                    Inventory App
                </a>

                <div class="flex gap-4">
                    @auth
                        <span class="text-sm text-gray-600">
                            {{ auth()->user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm text-red-600 hover:underline">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto px-4 py-6">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </body>
</html>
