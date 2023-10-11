<?php

namespace App\Http\Controllers;

use App\Models\RestaurantHalalCertificate;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Image;

class CertifiedRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_regular()
    {
        $restos = Restaurant::whereHas('restauranthalalcertificate', function ($query) {
            $query->where('certificate_type', 'Regular');
        })->with('restauranthalalcertificate')->with('area')->get();

        return view('mui_certification.regular', [
            'restos' => $restos,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Sertifikasi MUI - Reguler'
        ]);
    }

    public function index_self_declare()
    {
        $restos = Restaurant::whereHas('restauranthalalcertificate', function ($query) {
            $query->where('certificate_type', 'Self Declare');
        })->with('restauranthalalcertificate')->with('area')->get();

        return view('mui_certification.self_declare', [
            'restos' => $restos,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Sertifikasi MUI - Self Declare'
        ]);
    }

    public function show($id)
    {
        $restos = Restaurant::where('id', decrypt($id))
            ->with('restauranthalalcertificate')
            ->with('area')
            ->with('menu')
            ->first();

        return view('mui_certification.certified_restaurant_show', [
            'resto' => $restos,
            'navbar' => 'Kontributor',
            'title' => 'Detail Resto',
            'images' => Image::where('restaurant_id', decrypt($id))->get(),
        ]);
    }
}
