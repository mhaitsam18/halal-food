<?php

namespace App\Http\Controllers\ReviewSertifikasi;

use App\Http\Controllers\controller as Controller;
use App\Models\Review;
use App\Models\ReviewMenu;
use App\Models\Ingredient;
use App\Models\Report;
use App\Models\Restaurant;
use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
    public function create($id)
    {
        $resto = Restaurant::find(decrypt($id));
        // foreach ($resto->review as $data) {
        //     if ($data->reviewer->user_id == auth()->id()) {
        //         return redirect('/review_saya')->with('prevent-alert', 'Restoran, berhasil dihapus!');
        //     }
        // }
        
        $ingredients = Ingredient::orderBy('name', 'asc')->get();
        $resto = Restaurant::find(decrypt($id));
        $reviewer = Reviewer::where('user_id', auth()->id())->where('restaurant_id', decrypt($id))->first();
        
        return view('review_sertifikasi.certificate_report_create', [
            'ingredients' => $ingredients,
            'reviewer' => $reviewer,
            'resto' => $resto,
            'navbar' => 'Kontributor',
            'title' => 'Buat Laporan Sertifikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::create([
            'restaurant_id' => $request->resto_id,
            'reviewer_id' => $request->reviewer_id,
            'status' => $request->status,
            'comment' => $request->comment,
            
        ]);
        
        foreach ($request->newitem as $value) {
            ReviewMenu::create([
                'review_id' => $review->id,
                'menu_id' => $value['menu_id'],
                'critical_ingredient' => json_encode($value['bahan_kritis']),
                'raw_ingredient' => json_encode($value['bahan_olahan']),
                'additional_ingredient' => json_encode($value['bahan_tambahan']),
                'assist_ingredient' => json_encode($value['bahan_penolong'])
            ]);
        }
        

        $resto = Restaurant::find($request->resto_id);

        if (count($resto->review) == 2) {
            $review = $resto->review;

            if ($review[0]->status == $review[1]->status) {
                $resto->update([
                    'status' => 'Selesai'
                ]);
            } else {
                $resto->update([
                    'status' => 'Proses Superadmin'
                ]);
            }
        }

        return redirect('/review-saya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review, $id)
    {
        $ingredients = Ingredient::orderBy('name', 'asc')->get();
        $report = Report::where('restaurant_id', decrypt($id))->first();
        $reviewer = Reviewer::where('user_id', auth()->id())->where('restaurant_id', decrypt($id))->first();
        $certificate_report = Review::where('restaurant_id', decrypt($id))->whereHas('reviewer', function ($query) {
            $query->where('user_id', auth()->id());
        })->first();

        return view('report.certificate_report_edit', [
            'report' => $report,
            'certificate_report' => $certificate_report,
            'reviewer' => $reviewer,
            'ingredients' => $ingredients,
            'navbar' => 'Kontributor',
            'title' => 'Review Ulang Sertifikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review, $id)
    {
        $certificate_report = Review::find(decrypt($id))->first();

        $certificate_report->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        foreach ($request->newitem as $value) {
            $certificateReport_menu = ReviewMenu::where('certificate_report_id', $certificate_report->id)->where('menu_id', $value['menu_id'])->first();
            $certificateReport_menu->update([
                'critical_ingredient' => json_encode($value['bahan_kritis']),
                'raw_ingredient' => json_encode($value['bahan_olahan']),
                'additional_ingredient' => json_encode($value['bahan_tambahan']),
                'assist_ingredient' => json_encode($value['bahan_penolong'])
            ]);
        }
        return redirect('/report-restaurant')->with('success-alert', [
            'title' => 'Report Berhasil',
            'message' => 'Report berhasil dikirim, reviewer yang bertanggung jawab atas resto ' . $request->resto_name . ' akan segera melakukan review ulang'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
