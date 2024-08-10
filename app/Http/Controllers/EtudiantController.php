<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
     /**
     * Custom JSON response method.
     */
    protected function customJsonResponse($message, $data)
    {
        return response()->json([
            "message" => $message,
            "data" => $data
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        //dd($etudiants);
        return $this->customJsonResponse("Liste des étudiants", $etudiants);
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
    public function store(StoreEtudiantRequest $request)
    {
        $etudiant = new Etudiant();
        $etudiant->fill($request->validated());
        $etudiant->mot_de_passe = bcrypt($request->mot_de_passe); // Hash the password

        // Save the student record
        $etudiant->save();


        return $this->customJsonResponse("Etudiant ajouté avec succées",$etudiant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return $this->customJsonResponse("Étudiant récupéré avec succés", $etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // Met à jour tous les champs envoyés dans la requête
        $etudiant->update($request->all());

        return response()->json([
            'message' => 'Étudiant modifié avec succès.',
            'etudiant' => $etudiant
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return $this->customJsonResponse("Etudiant supprimé avec succès", null, 200);
    }
    public function restore($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();
        $etudiant->restore();
        return $this->customJsonResponse("Etudiant restauré avec succès", $etudiant);
    }
    public function forceDelete($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();

        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant non trouvé ou déjà supprimé définitivement", null, 404);
        }

        $etudiant->forceDelete();
        return $this->customJsonResponse("Etudiant supprimé définitivement", null, 200);
    }
    public function trashed()
    {
        $etudiants = Etudiant::onlyTrashed()->get();
        return $this->customJsonResponse("Etudiant archivés", $etudiants);
    }
}
