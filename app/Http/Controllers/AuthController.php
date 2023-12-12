<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticated(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);

        $credentials = $request->only([
            'email',
            'password',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // $user = Auth::user();


            return redirect('/dashboard');
        }

        return back()->withErrors([
            'LoginError' => 'Email atau Password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'password' => 'required|min:8',
            'confrim_password' => 'required|same:password'
        ]);

        $imageName = ''; // variabel untuk menyimpan nama file gambar

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // nama unik untuk file gambar

            // Simpan file gambar ke direktori yang diinginkan (contoh: public/images)
            $image->move(public_path('images'), $imageName);
        }

        $user = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
            'image' => $imageName, // simpan nama file gambar ke dalam field image
        ]);
        
        $user->save();

        return redirect('/')->with('success', 'Registrasi Berhasil , Silahkan Login ');
    }

     // ganti password
     public function password()
     {
         return view('auth.change-password');
     }
 
     public function password_action(Request $request)
{
    $request->validate([
        'old_password' => [
            'required',
            'current_password',
        ],
        'new_password' => 'required|min:8', 
    ], [
        'new_password.min' => 'password harus 8 karakter', // Pesan error untuk minimal 8 karakter
        'old_password.current_password' => 'password salah',
    ]);

    $user = User::find(Auth::id());
    $user->password = Hash::make($request->new_password);
    $user->save();
    $request->session()->regenerate();

    return redirect('/dashboard')->with('success', 'Password Changed');
}
}
