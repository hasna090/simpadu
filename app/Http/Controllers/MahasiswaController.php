<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $validateData = $request->validate(
            [
                'nim' => 'required|unique:mahasiswa|max:10',
                'password' => 'required',
                'nama' => 'required|max:100',
                'tanggalLahir' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|max:100',
                'foto' => 'required|file|max:2048',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah terdaftar',
                'nim.max.' => 'NIM maksimal 10 karakter',
                'password.required' => 'Password wajib diisi',
                'nama.required' => 'Nama wajib diisi',
                'tanggalLahir.required' => 'Tanggal lahir wajib diisi',
                'telp.required' => 'Nomor Telpon wajib diisi',
                'telp.max' => 'Telpon maksimal 20 karakter',
                'email.required' => 'Email wajib diisi',
                'email.max' => 'Email maksimal 100 karakter'
            ]
        );
        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('images');
        }
        $validateData['password'] = Hash::make($validateData['password']);
        $data = array_merge($validateData, $request->only('idprodi'));
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
        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::All();
        return view('mahasiswa.edit', compact('data', 'mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // aksi menambah/edit
    {
        //

        $validateData = $request->validate(
            [
                'nama' => 'required|max:100',
                'tanggalLahir' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|max:100',
                'foto' => 'image|file|max:2048',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'tanggalLahir.required' => 'Tanggal lahir wajib diisi',
                'telp.required' => 'Nomor Telpon wajib diisi',
                'telp.max' => 'Telpon maksimal 20 karakter',
                'email.required' => 'Email wajib diisi',
                'email.max' => 'Email maksimal 100 karakter'
            ]
        );
        $mahasiswa = Mahasiswa::find($id);
        if ($request->file('foto')) {
            if ($mahasiswa->foto) {
                Storage::delete($mahasiswa->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('images');
        }
        if ($request->input(['password'])) {
            $validateData['password'] = Hash::make($request->password);
        }
        $data = array_merge($validateData, $request->only('idprodi'));
        Mahasiswa::where('nim', $id)->update($data);
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //mendelete
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
