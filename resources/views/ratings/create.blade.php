<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Додати працівника') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Додати працівника</h2>

        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Фото</label>
                <input type="file" name="photo" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">ПІБ</label>
                <input type="text" name="full_name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Посада</label>
                <input type="text" name="position" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-1">Стаж роботи (роки)</label>
                <input type="number" name="experience" class="w-full border rounded px-3 py-2" min="0" required>
            </div>

            <div class="text-center">
                <button type="submit" 
        class="bg-blue-500 hover:bg-blue-600 font-medium px-6 py-3  duration-200 shadow-xl 
              hover:scale-105 active:scale-95 block mx-auto
              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    Додати працівника
</button>
            </div>
        </form>
    </div>
</x-app-layout>
