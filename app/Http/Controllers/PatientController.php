<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $patient = Patient::with('pharmacien')->get();
            return response()->json($patient);
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
            $validated = $request->validate([
                'name' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:patients',
                'pharmacienID' => 'required|exists:pharmaciens,id',
            ]);
            $patient = new Patient([
                "name" => $request->input("name"),
                "lastname" => $request->input("lastname"),
                "email" => $request->input("email"),
                "pharmacienID" => $request->input("pharmacienID"),
            ]);
            $patient->save();

            return response()->json($patient);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $patient = Patient::with('pharmacien')->findOrFail($id);
            return response()->json($patient);
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
            $patient = Patient::findOrFail($id);
            $patient->Patient::update($request->all());
            return response()->json($patient);
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
            $patient = Patient::findOrFail($id);
            $patient->delete();
            return response()->json("Patient supprimée avec succés");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
