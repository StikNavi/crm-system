<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('АРТ БУД ПРОЕКТ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Повідомлення про успіх --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Відображення працівників --}}
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($employees as $employee)
                    <div class="border-b border-gray-300 pb-8 mb-8">
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
                            <p class="text-gray-500">Стаж: {{ $employee->experience }} р</p>

                            {{-- Кнопка "Створити завдання" для клієнта --}}
                            @if(Auth::user() && Auth::user()->role === 'user')
                                <a href="{{ route('employees.tasks.create', ['employee' => $employee->id]) }}"
                                   class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Створити завдання
                                </a>
                            @endif

                            {{-- Кнопка "Видалити" тільки для адміністратора --}}
                            @if(Auth::user() && Auth::user()->role === 'admin')
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Ви впевнені, що хочете видалити цього працівника?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 py-2 px-4 rounded text-white">
                                        Видалити
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
