<?php

namespace App\Http\Controllers;

use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display all Prodi records
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        $prodi = Prodi::All();
        return view('prodi.index', compact('data', 'prodi'));
    }

    public function create()
    {
        // Logic to show the form for creating a new Prodi record
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        return view('prodi.create', compact('data'));
    }

    public function store($request)
    {
        // Logic to store a new Prodi record
        $validateData = $request->validate(
            [
                'nama' => 'required',
                'kaprodi' => 'required',
                'jurusan' => 'required|max:100'
            ],
        );
        Prodi::create($validateData);
        return redirect('/prodi');
    }
    public function show($id)
    {
        // Logic to display a specific Prodi record

    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific Prodi record

    }

    public function update($request, $id)
    {
        // Logic to update a specific Prodi record




    }

    public function destroy($id)
    {
        // Logic to delete a specific Prodi record

    }
}
