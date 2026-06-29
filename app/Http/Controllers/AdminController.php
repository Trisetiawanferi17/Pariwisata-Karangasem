<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Wisata;

class AdminController extends Controller
{
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
}