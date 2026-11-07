<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Cart::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        //memastikan  pilihan harga sudah dipilih sebelum menambahkan ke keranjang
        $request->validate([
            'purchase_option' => 'required',
        ]);

        if ($request->action === 'add_to_cart') {
            // menemtukan isi field subscription_package_id
            //  kalao "none" artinya satuam, bukan harga dari paket langganan
            // Tambahkan buku ke keranjang
            $packageId = $request->purchase_option == 'none' ? null : $request->subscription_package_id;

            // updateprcreate : jika pengguna ini udh perna masukin buku ini(userid dan bookid),
            // maka update pilihan pembayarannya(subscriptionpackageid), kalo blm ada maka buat data baru.
            // updateorcreate(['cari data berdsarkan apa'], ['update field apa aja])

            Cart::updateOrCreate([
                'user_id' => Auth::user()->id,
                'book_id' => $request->book_id,
            ], [
                'subscription_packages_id' => $packageId,
            ]);

            return redirect()->route('carts')->with('success', 'Buku berhasil ditambahkan ke keranjang.');
        } else {
            //proseskecheckout
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
