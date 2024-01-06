<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model MahasiswaModel
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    //method untuk tampil data mahasiswa
    public function mahasiswatampil()
    {
        $datamahasiswa = MahasiswaModel::orderby('id_mahasiswa', 'ASC')
        ->paginate(5);

        return view('halaman/view_mahasiswa',['mahasiswa'=>$datamahasiswa]);
    }

    //method untuk tambah data mahasiswa
    public function mahasiswatambah(request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jurusan' => 'required'
        ]);

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jurusan' => $request->jurusan
        ]);
        return redirect('/mahasiswa');
    }

    //method untuk hapus data mahasiswa
    public function mahasiswahapus($id_mahasiswa)
    {
        $datamahasiswa=MahasiswaModel::find($id_mahasiswa);
        $datamahasiswa->delete();

        return redirect()->back();
    }

    //method untuk edit data mahasiswa
    public function mahasiswaedit($id_mahasiswa, request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jurusanprodi' => 'required'
        
        ]);

        $id_mahasiswa = MahasiswaModel::find($id_mahasiswa);
        $id_mahasiswa->nim    = $request->nim;
        $id_mahasiswa->nama_mahasiswa       = $request->nama_mahasiswa;
        $id_mahasiswa->jurusan   = $request->jurusan;

        $id_mahasiswa->save();
        
        return redirect()->back();
    }  
}