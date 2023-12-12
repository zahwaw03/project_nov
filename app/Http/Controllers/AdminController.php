<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // halaman dashboard
    public function index()
    {
        $categories = Category::first();
        $posts = Posts::all();

        return view('admin.dashboard' , compact('categories' , 'posts'));
    }

    // halaman error
    public function error()
    {
        return view('admin.halaman-error');
    }

    public function addUser()
    {
        return view('admin.add-user');
    }

    public function addUser_action(Request $request)
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

        return redirect('/manage-admin')->with('success', 'Add User Berhasil');
    }

    // halaman manage users
    public function dataAdmin()
    {
        $users = User::all();

        return view('admin.manage-data-admin' , compact('users'));
    }

    public function edit($id , User $users)
    {
        $users = User::find($id);

        $roles = User::pluck('role'); // Ambil nama dan id dari model Role

        return view('admin.manage-admin-edit' , compact('users' ,'roles'));
    }

    public function Update($id, Request $request)
    {
        $request->validate([
            'firstname' => '',
            'lastname' => '',
            'role' => ''
        ]);

        $user = User::find($id);
        $user->firstname = $request->input('firstname'); 
        $user->lastname = $request->input('lastname'); 
        $user->role = $request->input('role');
        $user->save();

        return redirect('/manage-admin')->with('success' , 'data berhasil di edit');
    }
    
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/manage-admin')->with('success' , 'Data berhasil di hapus');
    }
    // end data admin


    // add category
    public function addCategory()
    {
        return view('admin.add-category');
    }

    public function addCategory_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $categories = New Category([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $categories->save();

        return redirect('/manage-category')->with('success' , 'Add Category Berhasil');
    }

    // halaman manage categories
    public function manageCategory()
    {
        $categories = Category::all();

        return view('admin.manage-category' , compact('categories'));
    }

    public function edit1($id , Category $categories)
    {
        $categories = Category::find($id);

        return view('/admin.manage-category-edit' , compact('categories'));
    }

    public function update1($id , Request $request)
    {
        $request->validate([
            'name' => '',
            'description' => '',
        ]);

        $categories = Category::find($id);
        $categories->name =$request->name;
        $categories->description=$request->description;
        $categories->save();
        return redirect('/manage-category')->with('success', 'Data berhasil di edit');
    }

    public function destroy1(category $categories)
    {
        $categories->delete();

        return redirect('/manage-category')->with('success' , 'Data berhasil di hapus');
    }

}
