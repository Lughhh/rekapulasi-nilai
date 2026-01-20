<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font & Icon --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    @stack('styles')
</head>

<body class="min-h-screen flex flex-col bg-gray-100 font-[Inter]">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b shadow-md sticky top-0 z-20">
        <div class="px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl font-bold">@yield('page-title')</h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600 hidden md:block">
                    {{ auth()->user()->name ?? 'User' }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 text-white px-3 py-2 rounded-lg">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex flex-1">
        {{-- SIDEBAR --}}
        <aside id="sidebar"
               class="w-64 bg-purple-700 text-white min-h-screen hidden md:block">
            <div class="p-4 border-b border-purple-500">
                <h2 class="font-bold text-lg uppercase">
                    {{ auth()->user()->role }}
                </h2>
            </div>

            <nav class="p-2 space-y-1">
                @if(auth()->user()->role === 'dosen')
                    <a href="{{ route('dosen.dashboard') }}"
                       class="block p-3 rounded hover:bg-purple-600">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                @endif
            </nav>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar')?.classList.toggle('hidden');
        }
    </script>
</body>
</html>
