<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id')->get();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
          'judul' => 'min:5',
          'isi_berita' => 'min:10'
        ]);
        $foto = $request->file('foto')->store('blog');

        Blog::create([
          'judul' => $request->judul,
          'isi_berita' => $request->isi_berita,
          'foto' => $foto
        ]);

        return redirect()->route('blog')->with('success','Blog berhasil di tambhakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      if ($request->foto) {
        $foto_path = $blog->foto;
        if (Storage::exists($foto_path)) {
          Storage::delete($foto_path);
        }
        $foto = $request->file('foto')->store('blog');
        $blog->update([
          'judul' => $request->judul,
          'isi_berita' => $request->isi_berita,
          'foto' => $foto
        ]);

      }else {
        $blog->update([
          'judul' => $request->judul,
          'isi_berita' => $request->isi_berita,
        ]);

      }

        return redirect()->route('blog')->with('success','Blog berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
      $foto_path = $blog->foto;
      if (Storage::exists($foto_path)) {
        Storage::delete($foto_path);
      }
        $blog->delete();
        return redirect()->route('blog')->with('success','Blog berhasil dihapus');
    }
}
