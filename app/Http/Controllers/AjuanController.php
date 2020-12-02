<?php

namespace App\Http\Controllers;

use App\ajuan;
use App\kategori_post;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjuanController extends Controller
{
    protected $messages = [
        'required' => 'Form harus di isi',
        'email' => 'Harus di isi email',
        'image' => 'file harus gambar',
        'mimes' => 'file harus jpeg,jpg,png',
        'file' => 'harus input file',
        'confirmed' => 'password tidak cocok',
        'unique' => 'sudah ada',
    ];
    protected $validasi = [
        'nama' => ['required', 'string', 'max:255'],
        'judul' => ['required', 'string', 'max:255'],
        'kategori' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string', 'min:8','max:255'],
        'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg',
    ];

    public function index()
    {
        $data = [
            'ajuan' => ajuan::all(),
        ];
        //
        return view('ajuan.table', $data);
    }

    public function create()
    {
        //
        $data = [
            'kategori' => kategori_post::all(),
        ];

        return view('ajuan.ajuan', $data);
    }

    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        // dd($request);
        $request->thumbnail->originalName =
            time() . '_' . $request->thumbnail->getClientOriginalName();

        $request->thumbnail->move(
            'img/thumbnail',
            $request->thumbnail->originalName
        );

        ajuan::create([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $request->thumbnail->originalName,
            'kategori_id' => $request->kategori,
            'tanggal' => date('Y-m-d'),
        ]);
        return redirect('mading/ajuan')->with(
            'status',
            'Ajuan  Berhasil di ajuakan.'
        );
    }

    public function show(ajuan $ajuan)
    {
        //
        $data = [
            'ajuan' => $ajuan,
        ];

        return view('ajuan.detail', $data);
    }

    public function publish(ajuan $ajuan)
    {
        post::create([
            'judul' => $ajuan->judul,
            'nama' => $ajuan->nama,
            'deskripsi' => $ajuan->deskripsi,
            'thumbnail' => $ajuan->thumbnail,
            'kategori_id' => $ajuan->kategori_id,
            'tanggal' => date('Y-m-d'),
            'user_id' => Auth::user()->id,
        ]);

        ajuan::destroy($ajuan->id);

        return redirect('ajuan')->with('status', 'ajuan berhasil dipublish.');
    }
}