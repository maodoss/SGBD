<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UtilisateurDge;

class DgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si un utilisateur DGE est connecté
        if (!Session::has('utilisateur_dge_id')) {
            return redirect()->route('AdminLogin')
                ->with('error', 'Veuillez vous connecter en tant qu\'administrateur.');
        }

        // Vérifier si l'utilisateur existe toujours en base
        $utilisateurDge = UtilisateurDge::find(Session::get('utilisateur_dge_id'));
        if (!$utilisateurDge) {
            Session::forget('utilisateur_dge_id');
            return redirect()->route('AdminLogin')
                ->with('error', 'Session invalide. Veuillez vous reconnecter.');
        }

        return $next($request);
    }
}
