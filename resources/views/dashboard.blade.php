<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('АРТ БУД ПРОЕКТ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            </div>

            {{-- Відображення працівників --}}
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
