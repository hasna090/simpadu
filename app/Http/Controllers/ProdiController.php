<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;


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

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama' => 'required',
                'kaprodi' => 'required',
                'jurusan' => 'required|max:100'
            ],
            [
                'nama.required' => 'Nama Prodi wajib diisi',
                'kaprodi.required' => 'Kaprodi wajib diisi',
                'jurusan.required' => 'Jurusan wajib diisi',
                'jurusan.max' => 'Jurusan maksimal 100 karakter'
            ]
        );
        Prodi::create($validateData);
        return redirect('/prodi');
    }
    public function show(String $id)
    {
        // Logic to display a specific Prodi record

    }

    public function edit(String $id)
    {
        // Logic to show the form for editing a specific Prodi record
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        $prodi = Prodi::find($id);
        return view('prodi.edit', compact('data', 'prodi'));
    }

    public function update(Request $request, String $id)
    {
        // Logic to update a specific Prodi record
        $validateData = $request->validate(
            [
                'nama' => 'required',
                'kaprodi' => 'required',
                'jurusan' => 'required|max:100'
            ],
            [
                'nama.required' => 'Nama Prodi wajib diisi',
                'kaprodi.required' => 'Kaprodi wajib diisi',
                'jurusan.required' => 'Jurusan wajib diisi',
                'jurusan.max' => 'Jurusan maksimal 100 karakter'
            ]
        );
        Prodi::where('id_prodi', $id)->update($validateData);
        return redirect('/prodi');
    }

    public function destroy(String $id)
    {
        // Logic to delete a specific Prodi record
        $prodi = Prodi::find($id);
        if (!$prodi) {
            return redirect('/prodi')->with('error', 'Prodi not found');
        }
        Prodi::destroy($id);
        return redirect('/prodi');
    }
}
