<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    // Halaman beranda: tampilkan 3 buku terbaru
    public function home()
    {
        $reviews = Review::with('book')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('home', compact('reviews'));
    }

    // Halaman daftar resensi dengan pagination
    public function index()
    {
        $reviews = Review::with('book')
            ->orderByDesc('created_at')
            ->paginate(3);

        return view('reviews.index', compact('reviews'));
    }

    // Halaman detail resensi
    public function show($id)
    {
        $review = Review::with('book')->findOrFail($id);

        return view('reviews.show', compact('review'));
    }
}
