@extends('template.main')

@section('content')
    <!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <a href="mahasiswa/create" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Telp</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa as $m) 
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $m->nim }}</td>
                                            <td>{{ $m->nama }}</td>
                                            <td>{{ $m->tanggalLahir }}</td>
                                            <td>{{ $m->telp }}</td>
                                            <td>{{ $m->email }}</td>
                                            <td>{{ $m->prodi->nama }}</td>
                                            <td>
                                <img src="{{ $m->foto ? asset('storage/' . $m->foto) : asset('img/default.png') }}"
                                      alt="Foto Mahasiswa"
                                      width="60"
                                      class="img-thumbnail">
                            </td>
                                            <td>
                                                <div style="display: flex; gap: 5px">
                                                    <a href="{{ url ("mahasiswa/$m->nim/edit") }}" 
                                                         class="btn btn-warning" >Edit</a>
                                                <form action="{{ url ("mahasiswa/$m->nim") }}" method="POST"> 
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" 
                                                     onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                </form>    
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
@endsection
