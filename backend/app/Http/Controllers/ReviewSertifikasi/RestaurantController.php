<?php

namespace App\Http\Controllers\ReviewSertifikasi;

use App\Models\Restaurant;
use Illuminate\Http\Request;

use App\Http\Controllers\controller as Controller;
use App\Imports\MenuImport;
use App\Models\Area;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Reviewer;
use App\Models\Temporary;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class RestaurantController extends Controller
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

        $areas = Area::all();
        return view('review_sertifikasi.restaurant_create', [
            'areas' => $areas,
            'navbar' => 'Kontributor',
            'title' => 'Tambah Resto'
        ]);
    }

    public function temporaryImage_store(Request $request)
    {

        // Jika Input Image
        if ($request->hasFile('image')) {
            $image_resto = $request->file('image');
            $image_filename = hexdec(uniqid()) . '.' . $image_resto->extension();
            $image_resto->storeAs('tmp/' , $image_filename);

            Temporary::create([
                'name' => $image_filename
            ]);
            Session::push('filename', $image_filename);
            return $image_filename;
        }

        // Jika Input Menu
        if ($request->hasFile('menu')) {
            $menu_resto = $request->file('menu');
            $menu_filename = hexdec(uniqid()) . '.' . $menu_resto->extension();
            $menu_resto->storeAs('tmp/' , $menu_filename);

            Temporary::create([
                'name' => $menu_filename
            ]);
            Session::push('filename', $menu_filename); //save session filename
            return $menu_filename;
        }
    }

    public function temporaryImage_destroy(Request $request)
    {
        $temporary = Temporary::where('name', $request->image)->first();
        if($temporary){
            $file_path = storage_path('/app/tmp/' . $temporary->name);
            if (File::exists($file_path)) {
                File::delete($file_path);

                Temporary::where([
                    'name' => $temporary->name
                ])->delete();
                return 'deleted';
            }

            else {
                return 'not found';
            }
        }
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
        $request->validate(
            [
                'name_resto' => 'required',
                'full_address' => 'required',
                'area' => 'required',
                'owner_name' => 'required',
                'phone_number' => 'required',
                'image' => 'required',
                'deadline' => 'required',
                'menu' => 'required'
            ],
            [
                'name_resto.required' => 'Nama resto harus diisi',
                'full_address.required' => 'Alamat lengkap harus diisi',
                'area.required' => 'Daerah harus diisi',
                'owner_name.required' => 'Nama pemilik harus diisi',
                'phone_number.required' => 'Nomor HP harus diisi',
                'image.required' => 'Foto resto harus diisi',
                'deadline.required' => 'deadline harus diisi',
                'menu.required' => 'Input file menu harus diisi',
                'menu.mimes' => 'Input file menu harus dalam format .xls atau .xlsx'
            ]
        );

        $restaurant = new Restaurant([
            'user_id' => $request->user_id,
            'name' => $request->name_resto,
            'full_address' => $request->full_address,
            'area_id' => $request->area,
            'owner_name' => $request->owner_name,
            'phone_number' => $request->phone_number,
            'deadline' => $request->deadline,
            'status' => 'Menunggu Kontributor',
        ]);


        $restaurant->save();
        $restaurantId = $restaurant->id;

        // Store Temporary
        $filename = Session::get('filename');
        foreach ($filename as $file_resto) {
            $temporary = Temporary::where('name', $file_resto)->first();
            $extension = pathinfo($temporary->name, PATHINFO_EXTENSION);

            if ($extension == 'xlsx') {
                $menu_path = storage_path('app/tmp/' . $temporary->name);
                Excel::import(new MenuImport($restaurantId), $menu_path);

                $restaurant->update([
                    'filename_menu' => $temporary->name,
                ]);

                if (File::exists($menu_path)) {
                    Storage::move('tmp/' . $temporary->name, 'public/menu/' . $temporary->name);
                    File::delete($menu_path);

                    $temporary->delete();
                }
            } else {
                $image_path = storage_path('app/tmp/' . $temporary->name);
                Image::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $temporary->name,
                ]);

                if (File::exists($image_path)) {
                    Storage::move('tmp/' . $temporary->name, 'public/images/' . $temporary->name);
                    File::delete($image_path);

                    $temporary->delete();
                }
            }
        }

        // Store Reviewer
        Reviewer::create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $request->user_id,
        ]);

        Session::remove('filename');

        return redirect('review-saya')->with('success-alert', [
            'title' => 'Tambah Restaurant Berhasil',
            'message' => 'Tambah restaurant telah berhasil dilakukan, sekarang anda dapat menunggu kontributor lain bergabung untuk menjadi reviewer di Restaurant' . $restaurant->name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resto = Restaurant::find(decrypt($id));
        return view('review_sertifikasi.restaurant_show', [
            'resto' => $resto,
            'navbar' => 'Kontributor',
            'title' => 'Detail Resto'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Session::has('filename')) {
            Session::remove('filename');
        }
        $resto = Restaurant::find(decrypt($id));
        return view('review_sertifikasi.restaurant_edit', [
            'resto' => $resto,
            'no' => 1,
            'navbar' => 'Kontributor',
            'title' => 'Ubah Resto'
        ]);
    }

    public function temporaryImage_edit(Request $request)
    {

    }

    public function image_edit(Request $request)
    {
        $image = Image::where('restaurant_id', $request->resto_id)->get();
        return response()->json([
            'file'=>$image,
            'request' =>$request->resto_id
        ]);
    }

    public function image_destroy($id)
    {
        $image_resto = Image::where('id', $id)->first();
        $image_path = storage_path() . '/app/public/images/' . $image_resto->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_name = $image_resto->image;
        $image_resto->delete();
        return response()->json([
            'status' => 'Success',
            'image_name' => $image_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $resto_id = decrypt($id);
        $resto = Restaurant::where('id', $resto_id)->first();

        $resto->update([
            'name' => $request->name_resto,
            'full_address' => $request->full_address,
            'area' => $request->area,
            'owner_name' => $request->owner_name,
            'phone_number' => $request->phone_number,
            'deadline' => $request->deadline,
        ]);

        // User Upload File Menu Baru
        if ($request->hasFile('menu')) {
            $menuold_path = storage_path() . '/app/public/menu/' . $resto->filename_menu;
            File::delete($menuold_path);
            Menu::where('restaurant_id', $resto_id)->delete();

            $newmenu = $request->file('menu');
            $newfilename_menu = hexdec(uniqid()) . '.' . $newmenu->extension();
            $newmenu->storeAs('public/menu/' , $newfilename_menu);
            
            Excel::import(new MenuImport($resto_id), $newmenu);
            $resto->update([
                'filename_menu' => $newfilename_menu,
            ]);
        }

        $image_resto = Session::get('filename');
        if ($image_resto != null) {
            for ($i = 0; $i < count($image_resto); $i++) {
                $temporary = Temporary::where('name', $image_resto[$i])->first();
    
                if ($temporary) { //if exist
    
                    Image::create([
                        'restaurant_id' => $resto_id,
                        'name' => $image_resto[$i],
                    ]);
    
                    //hapus file and folder temporary
                    $image_path = storage_path() . '/app/tmp/' . $temporary->image;
                    if (File::exists($image_path)) {
                        Storage::move('tmp/' . $temporary->image, 'public/images/' . $temporary->image);
                        File::delete($image_path);
                        $temporary->delete();
                    }
                }
            }
            Session::remove('filename');
        }

        return redirect('/review_saya')->with('success-password','Kata sandi berhasil diubah');
        // $file_menu = $request->file('menu');
        // $filename_menu = hexdec(uniqid()) . '.' . $file_menu->extension();
        // $menu->update([
        //     ''
        // ]);


        // $file_menu->storeAs('public/menu/' , $filename_menu);
        // Excel::import(new MenuImport($restaurantId), $file_menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resto = Restaurant::findOrFail(decrypt($id));
        try {
            $resto_name = $resto->name;
            $resto->delete();
            return back()->with('success-alert', 'Restoran ' . $resto_name . ', berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('errors-alert', 'Restoran ' . $resto_name . ', gagal dihapus!');
        }
    }
}
