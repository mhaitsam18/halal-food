<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Image;
use App\Models\Area;
use App\Models\Claim;
use App\Models\RestaurantFeedback;
use App\Models\Temporary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ContentRestaurantController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::query();

        if ($request->filled('area')) {
            $restaurants->where('area_id', $request->area);
        }

        return view('content_restaurant.restaurant', [
            'restaurants' => $restaurants->get(),
            'areas' => Area::all(),
            'navbar' => 'user',
            'title' => 'Restoran'
        ]);
    }

    public function show($area, $name, $id)
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
        if (Auth::check()) {
            $user_feedback = RestaurantFeedback::where('restaurant_id', $id)->where('user_id', auth()->user()->id)->first();
        } else {
            $user_feedback = null;
        }
        return view('content_restaurant.restaurant_detail', [
            'restaurant' => Restaurant::find($id),
            'images' => Image::where('restaurant_id', $id)->get(),
            'feedback' => RestaurantFeedback::where('restaurant_id', $id)->get(),
            'avg_rate' => RestaurantFeedback::where('restaurant_id', $id)->avg('rating'),
            'user_feedback' => $user_feedback,
            'user' => auth()->user(),
            'title' => 'Detail Restoran',
            'navbar' => 'user',
        ]);
    }

    function find(Request $request)
    {
        $request->validate([
            'keyword' => 'required|min:1'
        ]);

        $search_text = $request->input('keyword');
        $restaurants = Restaurant::where('name', 'LIKE', '%' . $search_text . '%')->get();

        return view('content_restaurant.restaurant', [
            'restaurants' => $restaurants,
            'areas' => Area::all(),
            'navbar' => 'user',
            'title' => 'Hasil Pencarian Resto'
        ]);
    }

    function manage_resto_index(Request $request)
    {
        return view('manage_resto.manage_resto', [
            'claimed_resto' => Claim::with('restaurant')->where('user_id', auth()->id())->get(),
            'navbar' => 'user',
            'title' => 'Kelola Resto Saya'
        ]);
    }

    function manage_resto_show($area, $name, $id)
    {
        return view('manage_resto.manage_resto_show', [
            'claimed_resto' => Claim::with('restaurant')->where('user_id', auth()->id())->where('restaurant_id', $id)->first(),
            'images' => Image::where('restaurant_id', $id)->get(),
            'navbar' => 'user',
            'title' => 'Kelola Resto Saya'
        ]);
    }

    function manage_resto_edit($area, $name, $id)
    {
        return view('manage_resto.manage_resto_edit', [
            'claimed_resto' => Claim::with('restaurant')->where('user_id', auth()->id())->where('restaurant_id', $id)->first(),
            'images' => Image::where('restaurant_id', $id)->get(),
            'navbar' => 'user',
            'title' => 'Kelola Resto Saya'
        ]);
    }
}
