<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Jurusan, Kelas, User};

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'jurusan' => Jurusan::get(),
            'kelas' => Kelas::get(),
        ]);
    }

    public function store(Request $request)
    {

        // filepath -> untuk gambar
        // name-> untuk file seperti pdf

        $request->validate([
            'nama_buku' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'author' => 'required',
            'name' => 'required|mimes:csv,txt,xlx,xls,pdf|max:5048',
            'file_path' => 'required|image|mimes:png,jpg,jpeg'

        ]);
        // $fileModel = new Post;
        // if($request->file()) {
        //     $fileName = time().'_'.$request->file->getClientOriginalName();
        //     $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        //     $fileModel->name = time().'_'.$request->file->getClientOriginalName();
        //     $fileModel->file_path = '/storage/' . $filePath;
        //     $fileModel->nama_buku = $request->nama_buku;
        //     $fileModel->jurusan_id = $request->jurusan_id;
        //     $fileModel->kelas_id = $request->kelas_id;
        //     $fileModel->url = $request->url;
        //     $fileModel->save();
    

        $fileName = $request->name->getClientOriginalName();
        $name = $request->name->storeAs('file', $fileName);

        $image = $request->file('file_path');
        $image->storeAs('img', $image->hashName());
        
        Post::create ([
            'nama_buku' => $request->nama_buku,
            'author' => $request->author,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
            'name' => $name,
            'file_path' => $image->hashName()

        ]);
        
        return redirect()->route('posts.index')
                        ->with('success','Data berhasil ditambah.');    
      
    
}

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function edit($id)

    {
        $jur = Jurusan::all();
        $kelas = Kelas::all();
        $post = Post::with('jurusan','kelas')->findorfail($id);
        return view('posts.edit',compact('post','jur','kelas'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'nama_buku' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $fileName = $request->name->getClientOriginalName();
        $name = $request->name->storeAs('file', $fileName);

        $image = $request->file('file_path');
        $image->storeAs('img', $image->hashName());
        
        $post->update ([
            'nama_buku' => $request->nama_buku,
            'author' => $request->author,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
            'name' => $name,
            'file_path' => $image->hashName()

        ]);
        
        return redirect()->route('posts.index')
                        ->with('success','Data berhasil diubah.'); 

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success','Data Berhasil dihapus');
    }
}
