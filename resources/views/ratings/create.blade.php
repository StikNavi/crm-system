<x-app-layout>
    <div class="container">
        <h2>Оцінити працівника</h2>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="" method="POST">
            @csrf
            <label for="employee_id">Працівник:</label>
            <select name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>

            <label for="score">Оцінка (1–5):</label>
            <select name="score" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>

            <button type="submit">Оцінити</button>
        </form>
    </div>
</x-app-layout>