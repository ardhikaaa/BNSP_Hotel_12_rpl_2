<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Produk;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::with('produk')->get();
        return view ('booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all(); // ambil semua data produk
        return view('booking.create', compact('produks')); // arahkan ke booking.blade.php
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'identitas' => 'required|string|max:50',
            'produk_id' => 'required|exists:produks,id',
            'date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'breakfast' => 'nullable|boolean',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // ambil harga per malam
        $price = $produk->price;
        $duration = $request->duration;
        $breakfast = $request->boolean('breakfast');

        // hitung harga kamar
        $roomCost = $price * $duration;

        // hitung biaya breakfast
        $breakfastCost = $breakfast ? (80000 * $duration) : 0;

        // total awal (harga kamar + breakfast)
        $total = $roomCost + $breakfastCost;

        // diskon jika lebih dari 3 malam
        if ($duration > 3) {
            $total = $total - ($total * 0.10); // diskon 10%
        }


        // simpan booking
        Booking::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'identitas' => $request->identitas,
            'produk_id' => $produk->id,
            'price' => $price,
            'date' => $request->date,
            'duration' => $duration,
            'breakfast' => $breakfast,
            'total' => $total,
        ]);

        return redirect('booking')->with('success', 'Pemesanan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}