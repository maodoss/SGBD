<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Election;
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
     * Enregistrer un vote
     *
     * @param Request $request
     * @param int $election_id
     * @return \Illuminate\Http\Response
     */
    public function storeVote(Request $request, $election_id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Vérifier si l'utilisateur a déjà voté
        $user = auth()->user();
        $existingVote = Vote::where('user_id', $user->id)->where('election_id', $election_id)->first();

        if ($existingVote) {
            return redirect()->back()->with('error', 'Vous avez déjà voté dans cette élection.');
        }

        // Enregistrer le vote
        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->election_id = $election_id;
        $vote->candidate_id = $request->candidate_id;
        $vote->save();

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
        $votes = $election->votes()->with('candidate')->get();

        return view('vote.results', compact('election', 'votes'));
    }
}
