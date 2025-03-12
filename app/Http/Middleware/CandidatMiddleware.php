<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\candidats;

class CandidatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si un candidat est connecté
        if (!Session::has('candidat_id')) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter en tant que candidat.');
        }

        // Vérifier si le candidat existe toujours en base de données
        $candidat = candidats::find(Session::get('candidat_id'));
        if (!$candidat) {
            Session::forget('candidat_id');
            return redirect()->route('login')->with('error', 'Session invalide. Veuillez vous reconnecter.');
        }

        return $next($request);
    }
}
