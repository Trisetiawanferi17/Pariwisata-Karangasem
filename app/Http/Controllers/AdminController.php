<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Wisata;

class AdminController extends Controller
{
    // ===== DASHBOARD =====
    public function dashboard()
    {
        $total_pengguna = User::count();
        $total_komentar = Comment::count();
        $total_destinasi = Wisata::count();
        
        $komentar_terbaru = Comment::with(['user', 'wisata'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'total_pengguna',
            'total_komentar',
            'total_destinasi',
            'komentar_terbaru'
        ));
    }

    // ===== CRUD WISATA =====
    
    // Menampilkan daftar wisata
    public function wisataIndex()
    {
        $wisata = Wisata::all();
        return view('admin.wisata.index', compact('wisata'));
    }

    // Menampilkan form tambah wisata
    public function wisataCreate()
    {
        return view('admin.wisata.create');
    }

    // Menyimpan data wisata baru
    public function wisataStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|string|max:50',
            'jam_buka' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'gambar' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'fasilitas' => 'nullable|string',
        ]);

        Wisata::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'jam_buka' => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
            'rating' => $request->rating ?? 0,
            'fasilitas' => $request->fasilitas ? json_encode(explode(',', $request->fasilitas)) : null,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil ditambahkan!');
    }

    // Menampilkan form edit wisata
    public function wisataEdit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    // Mengupdate data wisata
    public function wisataUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|string|max:50',
            'jam_buka' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'gambar' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'fasilitas' => 'nullable|string',
        ]);

        $wisata = Wisata::findOrFail($id);
        $wisata->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'jam_buka' => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
            'rating' => $request->rating ?? 0,
            'fasilitas' => $request->fasilitas ? json_encode(explode(',', $request->fasilitas)) : null,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil diupdate!');
    }

    // Menghapus data wisata
    public function wisataDestroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil dihapus!');
    }
}