<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        $prodi = Prodi::All();
        return view('mahasiswa.create', compact('data', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // tambah aksi
    {
        $data = $request->except('_token');
        Mahasiswa::create($data);
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //detail
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) // menampilkan form editnya
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // aksi menambah
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //mendelete
    {
        //
    }
}
