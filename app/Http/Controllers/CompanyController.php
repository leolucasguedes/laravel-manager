<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empresa_nome' => 'required|string|max:255',
        ]);

        $empresa = Company::create($validatedData);

        return response()->json($empresa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Company::findOrFail($id);
        return response()->json($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'empresa_nome' => 'sometimes|string|max:255',
        ]);

        $empresa = Company::findOrFail($id);
        $empresa->update($validatedData);

        return response()->json($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empresa = Company::findOrFail($id);
        $empresa->delete();

        return response()->json(['message' => 'Empresa deletada com sucesso'], 204);
    }
}
