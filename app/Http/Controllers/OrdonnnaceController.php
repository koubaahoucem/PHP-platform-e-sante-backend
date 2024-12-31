<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;

class OrdonnnaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $ordonnances = Ordonnance::all();
            return response()->json($ordonnances);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $ordonnance = new Ordonnance([
                "reference" => $request->get('reference'),
                "dataOrdonnance" => $request->get('dataOrdonnance'),
                "detailsOrdonnance" => $request->get('detailsOrdonnance'),
                "pharmacienID" => $request->get('pharmacienID'),
            ]);
            $ordonnance->save();
            return response()->json($ordonnance);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $ordonnance = Ordonnance::findOrFail($id);
            return response()->json($ordonnance);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $ordonnance = Ordonnance::findOrFail($id);
            $ordonnance->update($request->all());
            return response()->json($ordonnance);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $ordonnance = Ordonnance::findOrFail($id);
            $ordonnance->delete();
            return response()->json("Ordonnance supprimée avec succés");
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
