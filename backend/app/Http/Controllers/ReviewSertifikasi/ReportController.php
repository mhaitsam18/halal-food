<?php

namespace App\Http\Controllers\ReviewSertifikasi;

use App\Http\Controllers\controller as Controller;
use App\Models\CertificateReport;
use App\Models\ImageReport;
use App\Models\Ingredient;
use App\Models\Report;
use App\Models\Restaurant;
use App\Models\Reviewer;
use App\Models\Temporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::whereHas('restaurant', function ($query) {
            $query->whereHas('reviewer', function ($query2) {
                $query2->where('user_id', auth()->id());
            });
        })->get();

        $resto = Restaurant::whereHas('report')->whereHas('reviewer', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();


        return view('report.report', [
            'restos' => $resto,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Pengaduan'
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
        $request->validate(
            [
                'comment' => 'required'
            ],
            [
                'comment.required' => 'Komentar harus diisi'
            ]
        );

        $report = Report::create([
            'user_id' => auth()->id(),
            'restaurant_id' => $request->resto_id,
            'comment' => $request->comment,
            'status' => 'Perlu Diproses'
        ]);

        $report_id = $report->id;

        // Store Temporary
        $filename = Session::get('filename');
        foreach ($filename as $file_report) {
            $temporary = Temporary::where('name', $file_report)->first();
            $extension = pathinfo($temporary->name, PATHINFO_EXTENSION);

            $image_path = storage_path('app/tmp/' . $temporary->name);
            ImageReport::create([
                'report_id' => $report_id,
                'name' => $temporary->name,
            ]);

            if (File::exists($image_path)) {
                Storage::move('tmp/' . $temporary->name, 'public/images_report/' . $temporary->name);
                File::delete($image_path);

                $temporary->delete();
            }
        }

        return back()->with('success-alert', [
            'title' => 'Report Berhasil',
            'message' => 'Report berhasil dikirim, reviewer yang bertanggung jawab atas resto ' . $request->resto_name . ' akan segera melakukan review ulang'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report, $id)
    {
        $report = Report::where('restaurant_id', base64_decode($id))->first();
        
        return view('report.report_show', [
            'report' => $report,
            'navbar' => 'Kontributor',
            'title' => 'Detail Pengaduan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
