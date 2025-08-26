<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        // Contoh data untuk ditampilkan di view
        $quranData = []; // nanti bisa fetch dari database atau API asli
        return view('quran.index', compact('quranData'));
    }
}
