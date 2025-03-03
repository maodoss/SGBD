<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;
use App\Models\Candidat;
use App\Models\Electeur;
use App\Models\User;
use Validator;

class VoteController extends Controller
{
    /**
     * Afficher les détails de l'élection pour voter
     *
     * @param int $election_id
     * @return \Illuminate\Http\Response
     */
    public function showElection($election_id)
    {
        $election = Election::findOrFail($election_id);
        return view('vote.show', compact('election'));
    }

    /**
     * Enregistrer un vote en utilisant les modèles Candidat et Electeur
     *
     * @param Request $request
     * @param int $election_id
     * @return \Illuminate\Http\Response
     */
    public function storeVote(Request $request, $election_id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'candidate_id' => 'required|exists:candidats,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        // Vérifier si l'utilisateur a déjà voté dans cette élection
        $existingVote = Electeur::where('user_id', $user->id)
                                ->where('election_id', $election_id)
                                ->first();

        if ($existingVote) {
            return redirect()->back()->with('error', 'Vous avez déjà voté dans cette élection.');
        }

        // Enregistrer le vote en créant une nouvelle instance d'Electeur
        $electeur = new Electeur();
        $electeur->user_id = $user->id;
        $electeur->election_id = $election_id;
        $electeur->candidate_id = $request->candidate_id;
        $electeur->save();

        return redirect()->route('election.show', ['election_id' => $election_id])
                         ->with('success', 'Votre vote a été enregistré.');
    }

    /**
     * Afficher les résultats de l'élection
     *
     * @param int $election_id
     * @return \Illuminate\Http\Response
     */
    public function showResults($election_id)
    {
        $election = Election::findOrFail($election_id);
        // Récupérer les votes via le modèle Electeur et charger les informations du candidat
        $votes = Electeur::where('election_id', $election_id)
                         ->with('candidate')
                         ->get();

        return view('vote.results', compact('election', 'votes'));
    }
}

