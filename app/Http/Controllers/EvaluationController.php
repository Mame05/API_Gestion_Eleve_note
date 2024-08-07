<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $request->validate([
            'date' => 'required|date',
            'note' => 'required|integer|min:0|max:20',
            'etudiant_id' => 'required|exists:etudiants,id',
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        // Création de l'évaluation
        $evaluation = Evaluation::create($request->all());

        return response()->json([
            'message' => 'Note ajoutée avec succès',
            'data' => $evaluation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        $evaluation->update($request->all());

        return response()->json([
            'message' => 'Note mise à jour avec succès',
            'data' => $evaluation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return response()->json([
            'message' => 'Note supprimée avec succès',
            'data' => null
        ], 200);
    }
}
