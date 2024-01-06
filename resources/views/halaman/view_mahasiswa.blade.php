@extends('index')
@section('title', 'mahasiswa')

@section('isihalaman')
    <br><br>
    <h3><center>Daftar Mahasiswa STMIK Madria Indonesia</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMahasiswaTambah"> 
        Tambah Data Mahasiswa 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Mahasiswa</td>
                <td align="center">NIM</td>
                <td align="center">Nama Mahasiswa</td>
                <td align="center">Jurusan</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($mahasiswa as $index=>$m)
                <tr>
                    <td align="center" scope="row">{{ $index + $mahasiswa->firstItem() }}</td>
                    <td>{{$m->id_mahasiswa}}</td>
                    <td>{{$m->nim}}</td>
                    <td>{{$m->nama_mahasiswa}}</td>
                    <td>{{$m->jurusan}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalMahasiswaEdit{{$m->id_mahasiswa}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Mahasiswa -->
                        <div class="modal fade" id="modalMahasiswaEdit{{$m->id_mahasiswa}}" tabindex="-1" role="dialog" aria-labelledby="modalmahasiswaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalMahasiswaEditLabel">Form Edit Data Mahasiswa</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formmahasiswaedit" id="formmahasiswaedit" action="/mahasiswa/edit/{{ $m->id_mahasiswa}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_mahasiswa" class="col-sm-4 col-form-label">NIM</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan Nim">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_mahasiswa" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $m->nama_mahasiswa}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $m->jurusan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="mahasiswatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data mahasiswa -->
                        |
                        <a href="mahasiswa/hapus/{{$m->id_mahasiswa}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $mahasiswa->currentPage() }} <br />
    Jumlah Data : {{ $mahasiswa->total() }} <br />
    Data Per Halaman : {{ $mahasiswa->perPage() }} <br />

    {{ $mahasiswa->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Mahasiswa -->
    <div class="modal fade" id="modalMahasiswaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMahasiswaTambahLabel">Form Input Data mahasiswa</h5>
                </div>
                <div class="modal-body">
                    <form name="formmahasiswatambah" id="formmahasiswatambah" action="/mahasiswa/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_mahasiswa" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_mahasiswa" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukan Nama Mahasiswa">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="prodi" class="col-sm-4 col-form-label">Jurusan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan Jurusan">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="mahasiswatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data mahasiswa -->
    
@endsection