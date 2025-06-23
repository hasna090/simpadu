<?php

namespace App\Http\Controllers;

class ProdiController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display all Prodi records
        $prodi = \App\Models\Prodi::all();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        // Logic to show the form for creating a new Prodi record
        return view('prodi.create');
    }

    public function store($request)
    {
        // Logic to store a new Prodi record
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:10',
        ]);

        \App\Models\Prodi::create($request->all());
        return redirect()->route('prodi.index')->with('success', 'Prodi created successfully.');
    }

    public function show($id)
    {
        // Logic to display a specific Prodi record
        $prodi = \App\Models\Prodi::findOrFail($id);
        return view('prodi.show', compact('prodi'));
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific Prodi record
        $prodi = \App\Models\Prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    public function update($request, $id)
    {
        // Logic to update a specific Prodi record
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:10',
        ]);

        $prodi = \App\Models\Prodi::findOrFail($id);
        $prodi->update($request->all());
        return redirect()->route('prodi.index')->with('success', 'Prodi updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete a specific Prodi record
        $prodi = \App\Models\Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi deleted successfully.');
    }
}
