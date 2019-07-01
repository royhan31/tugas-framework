<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::orderBy('created_at', 'desc')->paginate(3);
        return view('karyawan.halamankaryawan', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.tambahkaryawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'nama' => 'min:5',
          'jabatan' => 'min:5',
          'tempat_lahir' => 'min:5',
          'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
            ]);

            $imageN = $foto = $request->file('gambar')->store('karyawan');

        Karyawan::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jabatan' => $request->jabatan,
            'gambar' => $imageN
        ]);
        return redirect ()->route('SemuaKaryawan')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.editkaryawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $this->validate($request,[

          'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
            ]);

            $imageN =  $request->file('gambar')->store('karyawan');


        $karyawan->update([
          'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jabatan' => $request->jabatan,
            'gambar' => $imageN
        ]);

        return redirect()->route('SemuaKaryawan')->with('success','Blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $karyawan->delete();
        // return redirect()->route('SemuaKaryawan')->with('success','Blog berhasil dihapus');

        $karyawan = Karyawan::find($id);
        $gambar = $karyawan->gambar;
        unlink('public/images/'. $karyawan->gambar);
        $karyawan->delete();
        return redirect()->route('SemuaKaryawan')->with('success','Blog berhasil dihapus');
    }
}
