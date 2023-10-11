<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favorites.favorites', [
            'favorites' => Favorite::with('restaurant')->where('user_id', auth()->id())->get(),
            'navbar' => 'user',
            'title' => 'Daftar Favorit Saya'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $id)
    {
        // favorite record
        $favorite = [
            'user_id' => auth()->user()->id,
            'restaurant_id' => $id
        ];
        if (!Favorite::where('user_id', auth()->user()->id)->where('restaurant_id', $id)->exists()) {
            Favorite::create($favorite);
            return redirect('/restaurant')->with('success-favorite', 'Lihat daftar resto favorite yang dimiliki');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $userId = auth()->user()->id;

        Favorite::where('restaurant_id', $id)
            ->where('user_id', $userId)
            ->delete();

        // Tambahkan kode lain yang Anda perlukan setelah menghapus record.

        return redirect()->back()->with('success', 'Catatan cart telah dihapus.');
    }
}
