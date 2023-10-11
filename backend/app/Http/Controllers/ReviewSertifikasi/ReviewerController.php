<?php

namespace App\Http\Controllers\ReviewSertifikasi;

use App\Models\Reviewer;
use Illuminate\Http\Request;

use App\Http\Controllers\controller as Controller;
use App\Models\Restaurant;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user();
        $resto = Restaurant::where('status', 'Menunggu Kontributor')->whereDoesntHave('reviewer', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderByRaw('RAND()')->get();
        return view('list_restaurant.list_restaurant', [
            'restos' => $resto,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'List Restoran'
        ]);
    }

    public function filter(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $resto = Restaurant::where('status', 'Menunggu Kontributor')->whereBetween('deadline', [$start, $end])->whereDoesntHave('reviewer', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderByRaw('RAND()')->get();
        return view('list_restaurant.list_restaurant', [
            'filter_dateStart' => $start,
            'filter_dateEnd' => $end,
            'restos' => $resto,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'List Restoran'
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
    public function store(Request $request)
    {
        Reviewer::create([
            'restaurant_id' => $request->resto_id,
            'user_id' => $request->user_id
        ]);
        
        $resto = Restaurant::find($request->resto_id);

        if (count($resto->reviewer) == '2') {
            $resto->update([
                'status' => 'Dalam Review'
            ]);
        } 

        return redirect('/list_restoran')->with([
            'success-password','Kata sandi berhasil diubah'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function show(Reviewer $reviewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviewer $reviewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviewer $reviewer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviewer $reviewer)
    {
        //
    }
}
