<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Ordonnance;
use App\Models\Pharmacien;
use Illuminate\Http\Request;

class MedicamemtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $medicaments = Medicament::all();
            return response()->json($medicaments, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $medicament = new Medicament([
                "name" => $request->input('name'),
                "reference" => $request->input('reference'),
                "detail" => $request->input('detail'),
            ]);

            if ($request->input('ordonnanceID') != null) {
                $ordonnance = Ordonnance::findOrFail($request->input('ordonnanceID'));
                $ordonnance->medicaments()->attach($medicament);
            }
            $medicament->save();
            return response()->json($medicament, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**asdad
     * Display the specified resource.
     */
    public function show($name)
    {
        try {
            $medicament = Medicament::where('name', $name)->first();
            return response()->json($medicament, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $medicament = Medicament::findOrFail($id);
            $medicament->update($request->all());
            //todo update the intermediate table
            return response()->json($medicament, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $medicament = Medicament::findOrFail($id);
            $medicament->delete();
            return response()->json("Medicament supprimée avec succés", 204);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
