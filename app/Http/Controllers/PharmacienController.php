<?php

namespace App\Http\Controllers;

use App\Models\Pharmacien;
use Illuminate\Http\Request;

class PharmacienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pharmaciens=Pharmacien::all();
            return response()->json($pharmaciens);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des pharmaciens");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $pharmacien=new Pharmacien([
                "name"=>$request->input("name"),
                "lastname"=>$request->input("lastname"),
                "email"=>$request->input("email"),
                "speciality"=>$request->input("speciality"),
                "password"=>$request->input("password"),
            ]);
            $pharmacien->save();
            return response()->json($pharmacien);
        }catch (\Exception $e) {
            return Response()->json("insertion impossible $e");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pharmacien = Pharmacien::findOrFail($id);
            return response()->json($pharmacien);
        }catch (\Exception $e) {
            return response()->json("probleme de récupération des données");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $pharmacien = Pharmacien::findOrFail($id);
            $pharmacien->Pharmacien::update($request->all());
            return response()->json($pharmacien);
        }catch (\Exception $e) {
            return response()->json("probleme de modification");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $pharmacien = Pharmacien::findOrFail($id);
            $pharmacien->delete();
            return response()->json("Pharmacien supprimer");
        }
        catch (\Exception $e) {
            return response()->json("probleme de suppression");
        }
    }
}
