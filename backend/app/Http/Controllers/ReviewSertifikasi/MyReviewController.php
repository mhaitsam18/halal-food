<?php

namespace App\Http\Controllers\ReviewSertifikasi;

use App\Models\MyReview;
use Illuminate\Http\Request;

use App\Http\Controllers\controller as Controller;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Reviewer;
use App\Models\Temporary;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MyReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Session::has('filename')) {
            
            $filename = Session::get('filename');
            foreach ($filename as $file_resto) {
                $temporary = Temporary::where('name', $file_resto)->first();

                if ($temporary) {
                    $file_path = storage_path('app/tmp/' . $temporary->name);
                    File::delete($file_path);
    
                    $temporary->delete();
                }
            }
            Session::remove('filename');
        }
        
        $restos = Restaurant::whereHas('reviewer', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        return view('review_sertifikasi.review_saya', [
            'status' => 'Semua',
            'restos' => $restos,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Review Saya'
        ]);
    }
    public function filter(Request $request, $slug)
    {
        $status = str_replace("-", " ", $slug);
        $status = ucwords($status);

        $start = $request->input('start');
        $end = $request->input('end');

        

        if ($start != '' && $end != '') {
            if ($status == 'All Reviews') {
                $restos = Restaurant::whereBetween('deadline', [$start, $end])->whereHas('reviewer', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            } else {
                $restos = Restaurant::where('status', $status)->whereBetween('deadline', [$start, $end])->whereHas('reviewer', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            }
        } else {
            if ($status == 'All Reviews') {
                $restos = Restaurant::whereHas('reviewer', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            } else {
                $restos = Restaurant::where('status', $status)->whereHas('reviewer', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            }
        }
        

        
        return view('review_sertifikasi.review_saya', [
            'status' => $status,
            'filter_dateStart' => $start,
            'filter_dateEnd' => $end,
            'restos' => $restos,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Review Saya'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyReview  $myReview
     * @return \Illuminate\Http\Response
     */
    public function show(MyReview $myReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyReview  $myReview
     * @return \Illuminate\Http\Response
     */
    public function edit(MyReview $myReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyReview  $myReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyReview $myReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyReview  $myReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyReview $myReview)
    {
        //
    }
}
