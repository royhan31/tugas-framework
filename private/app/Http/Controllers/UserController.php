<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();
        //dd($users);
        return view('user.index', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user.tambah'); 
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
            'nama' => 'required|min:5',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:5',
        ]);
        $foto = $request->file('foto')->store('user');
        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $foto,
            'level' => $request->level
        ]);

        return redirect()->route('user')->with('success','User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.tampil', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'nama' => 'required|min:3',
            'username' => 'required|min:5',
            'email' => 'required|max:255',
        ]);
        if($request->password){
            if($request->foto){
                 $foto_path = $user->foto;
                if (Storage::exists($foto_path)) {
                 Storage::delete($foto_path);
                }
            $foto = $request->file('foto')->store('user'); 
                $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $foto,
            'level' => $request->level
                ]);
            }else{
                $user->update([
                    'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level
            ]);
            }
        }elseif($request->foto){
         $foto_path = $user->foto;
                if (Storage::exists($foto_path)) {
                 Storage::delete($foto_path);
                }
            $foto = $request->file('foto')->store('user'); 
                $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'foto' => $foto,
            'level' => $request->level
                ]);
        }else{
             $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'level' => $request->level
                ]);
        }

        return redirect()->route('user')->with('success','User berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $foto_path = $user->foto;
        if (Storage::exists($foto_path)) {
        Storage::delete($foto_path);
        }
        $user->delete();
        return redirect()->route('user')->with('success','User berhasil dihapus');
    }
}
