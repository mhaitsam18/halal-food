<?php

namespace App\Http\Controllers;

use App\Models\RestaurantFeedback;
use Illuminate\Http\Request;

class RestaurantFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {

        $feedback = new RestaurantFeedback([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'restaurant_id' => $id,
            'user_id' => auth()->user()->id,
        ]);
        $feedback->save();
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantFeedback  $restaurantFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantFeedback $restaurantFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantFeedback  $restaurantFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantFeedback $restaurantFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantFeedback  $restaurantFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = RestaurantFeedback::findOrFail($id);

        $feedback->rating = $request->rating;
        $feedback->comment = $request->comment;

        $feedback->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantFeedback  $restaurantFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = RestaurantFeedback::find($id);
        $feedback->delete();

        return redirect()->back();
    }
}
