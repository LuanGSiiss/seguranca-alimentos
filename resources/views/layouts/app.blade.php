<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Alimentos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('alimentos.index') }}" class="text-xl font-bold text-gray-800">
                        <i class="fas fa-utensils mr-2 text-green-600"></i>
                        Sistema de Alimentos
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('alimentos.index') }}" 
                       class="text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('alimentos.*') ? 'text-green-600 font-semibold' : '' }}">
                        <i class="fas fa-apple-alt mr-1"></i>Alimentos
                    </a>
                    <a href="{{ route('porcoes.index') }}" 
                       class="text-gray-600 hover:text-purple-600 transition-colors {{ request()->routeIs('porcoes.*') ? 'text-purple-600 font-semibold' : '' }}">
                        <i class="fas fa-balance-scale mr-1"></i>Porções
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        @if(session('success'))
            <div class="container mx-auto px-4 mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mx-auto px-4 mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="container mx-auto px-4 py-6">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} Sistema de Alimentos. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>