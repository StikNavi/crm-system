<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Додано явний імпорт моделі User

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        

        if ($user instanceof User && $user->isAdmin()) {
            return $next($request);
        }

        // Обробка відмов у доступі
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        
        abort(403, 'Доступ заборонено. Потрібні права адміністратора');
    }
}