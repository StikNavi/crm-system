<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Головна - Працівники</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Для Tailwind або Laravel Mix --}}
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- ХЕДЕР --}}
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Будівельна Фірма</a>
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-500">Головна</a>

                @auth
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('employees.create') }}" class="text-green-600 hover:text-green-800 font-semibold">+ Додати</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-500 hover:text-red-700">Вийти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Увійти</a>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Реєстрація</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- ОСНОВНИЙ ВМІСТ --}}
    <main class="container mx-auto px-4 py-10 flex-grow">
        <h1 class="text-3xl font-bold mb-8 text-center">Наші працівники</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($employees as $employee)
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">
                    @if($employee->photo)
                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Фото {{ $employee->full_name }}" class="w-40 h-40 object-cover rounded-full mx-auto mb-4">
                    @else
                        <div class="w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-gray-500">Без фото</span>
                        </div>
                    @endif

                    <h2 class="text-xl font-semibold">{{ $employee->full_name }}</h2>
                    <p class="text-gray-600">{{ $employee->position }}</p>
                    <p class="text-gray-500">Стаж: {{ $employee->experience }} років</p>

                    @auth
                        @if(Auth::user()->is_admin)
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Ви впевнені?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Видалити</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </main>

    {{-- ФУТЕР --}}
    <footer class="bg-white border-t mt-10">
        <div class="container mx-auto px-4 py-6 text-center text-gray-600">
            &copy; {{ date('Y') }} Будівельна Фірма. Всі права захищено.
        </div>
    </footer>

</body>
</html>
