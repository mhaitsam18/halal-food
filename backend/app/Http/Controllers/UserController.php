<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Claim;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authentication.register', [
            'title' => 'Register',
            'navbar' => 'authentication'
        ]);
    }

    public function login_index()
    {
        return view('authentication.login', [
            'title' => 'Login',
            'navbar' => 'authentication'
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
        // Validation Data
        $request->validate(
            [
                'username' => 'required|unique:users',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]+$/',
                'confirm_password' => 'required',
            ],
            [
                'username' => 'Username harus diisi.',
                'first_name.required' => 'Nama depan harus diisi.',
                'last_name.required' => 'Nama belakang harus diisi.',
                'email.required' => 'Email harus diisi.',
                'password.required' => 'Kata Sandi harus diisi.',
                'password.min' => 'Kata Sandi setidaknya terdiri dari 8 karakter.',
                'password.regex' => 'Kata Sandi harus mengandung huruf besar, huruf kecil, dan angka',
                'confirm_password.required' => 'Konfirmasi kata sandi harus diisi.',
                'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
                'email.unique' => 'Email sudah terdaftar.',
            ]
        );

        if ($request['password'] != $request['confirm_password']) {
            return back()->withErrors([
                'confirm_password' => ['Konfirmasi password tidak sesuai dengan password yang dimasukkan']
            ])->withInput();
        }

        $user = new User([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'profile_picture' => $request->profile_picture,
        ]);

        try {
            $user->save();
            return redirect('/login')
                ->with('success', 'Pengguna ' . $request->first_name . ' ' . $request->last_name . ', berhasil terdaftar, silahkan login ke akun anda.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/register')
                ->with('errors', 'You ' . $request->first_name . ' ' . $request->last_name . ' already becoming user');
        }
    }

    public function authenticate(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $request->validate(
            [
                'email' => 'required|email:rfc,dns',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email:rfc,dns' => 'Format email tidak sesuai',
                'password.required' => 'Password harus diisi',
            ]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Selamat Datang ' . $request->first_name . ' ' . $request->last_name . '!');
        }

        // if not succeed
        return back()->withErrors([
            'email' => ['Email atau password tidak sesuai']
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $claim = Claim::get();
        return view('profile.profile', [
            'navbar' => 'user',
            'title' => 'Profile',
            'claim' => $claim,
        ]);
    }

    public function edit_profile($encryptedId)
    {
        //Dekripsi
        $decryptedId = Crypt::decryptString($encryptedId);
        $user = User::find($decryptedId);
        $claim = Claim::get();
        if (auth()->user()->id !== $user->id) {
            // ID pengguna tidak cocok, kembalikan respons "Access Denied"
            return response()->json(['message' => 'Access Denied'], 403);
        }

        return view('profile.edit_profile', [
            'user' => $user,
            'title' => 'Profile | Edit',
            'navbar' => 'user',
            'claim' => $claim,
        ]);
    }

    public function update_profile(Request $request, $encryptedId)
    {
        //Dekripsi
        $decryptedId = Crypt::decryptString($encryptedId);
        $user = User::find($decryptedId);

        //Validate
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'profile_picture' => 'image|mimes:jpeg,png,jpg',
                'certificate' => 'image|mimes:jpeg,png,jpg'
            ],
            [
                'first_name.required' => 'Nama depan harus diisi.',
                'last_name.required' => 'Nama belakang harus diisi.',
                'profile_picture.mimes' => 'Format foto profil tidak sesuai.',
                'certificate.mimes' => 'Format sertifikat tidak sesuai.'
            ]
        );

        // Ubah Foto Profil
        if ($request->hasFile('profile_picture')) {
            $image = time() . '_' . $request->profile_picture->getClientOriginalName();
            $request->profile_picture->move(public_path('storage/images'), $image);
            $user->profile_picture = $image;
        }

        // Ubah Sertifikat
        if ($request->hasFile('certificate')) {
            $certificate = time() . '_' . $request->certificate->getClientOriginalName();
            $request->certificate->move(public_path('storage/certificate'), $certificate);
            $user->certificate = $certificate;
        }

        // Update data pengguna
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'experience' => $request->experience,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/profile');
    }

    public function edit_password($encryptedId)
    {
        //Dekripsi
        $decryptedId = Crypt::decryptString($encryptedId);
        $user = User::find($decryptedId);
        $claim = Claim::get();

        return view('profile.edit_password', [
            'user' => $user,
            'title' => 'Profile | Ganti Password',
            'navbar' => 'user',
            'claim' => $claim,
        ]);
    }

    public function update_password(Request $request, $encryptedId)
    {
        //Dekripsi
        $decryptedId = Crypt::decryptString($encryptedId);
        $user = User::find($decryptedId);

        //Ubah Password
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]+$/',
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'old_password.required' => 'Kata sandi harus diisi',
                'new_password.required' => 'Kata sandi harus diisi',
                'new_password.min' => 'Kata Sandi setidaknya terdiri dari 8 karakter.',
                'new_password.regex' => 'Kata Sandi harus mengandung huruf besar, huruf kecil, dan angka',
                'confirm_password.required' => 'Kata sandi harus diisi',
                'confirm_password.same' => 'Kata sandi tidak cocok'
            ]
        );

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('/profile')->with('success-password', 'Kata sandi berhasil diubah');
        } else {
            return redirect()->back()->withErrors([
                'old_password' => 'Password lama tidak sesuai',
            ])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
