<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
     // add-post
     public function addPost()
     {
         $categories = Category::all();

         $post = Posts::first();

         $users = User::first();
 
         return view('user.add-post' , compact('categories' , 'post' , 'users'));
     }
 
     public function addPost_action(Request $request)
     {
         $request->validate([
             'title' => 'required',
             'body' => 'required',
             'category_id' => 'required',
             'author_id' => 'required',
             'image' => 'required'
         ]);

         $imageName = ''; // variabel untuk menyimpan nama file gambar

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // nama unik untuk file gambar

            // Simpan file gambar ke direktori yang diinginkan (contoh: public/images)
            $image->move(public_path('images'), $imageName);
        }

        $post = new Posts([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'author_id' => $request->input('author_id'),
            'image' => $imageName, // simpan nama file gambar ke dalam field image
        ]);
        
        $post->save();

        return redirect('/dashboard')->with('success', 'Add User Berhasil');
     }


     public function edit($id)
     {
        $categories = Category::all();

        $posts = Posts::find($id);

        $users = User::first();

        $names = Category::pluck('name'); // Ambil nama dan id dari model Role

        return view('user.add-post-edit' , compact('posts' ,'names' , 'categories' , 'users'));
     }

     public function Update($id, Request $request)
     {
         $request->validate([
             'title' => '',
             'body' => '',
             'category_id' => '',
             'author_id' => '',
             'image' => ''
         ]);

         $imageName = ''; // variabel untuk menyimpan nama file gambar

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // nama unik untuk file gambar

            // Simpan file gambar ke direktori yang diinginkan (contoh: public/images)
            $image->move(public_path('images'), $imageName);
        }
 
         $posts = posts::find($id);
         $posts->title = $request->input('title'); 
         $posts->body = $request->input('body'); 
         $posts->category_id = $request->input('category_id');
         $posts->author_id = $request->input('author_id');
         $posts->image = $imageName;
         $posts->save();
 
         return redirect('/dashboard')->with('success' , 'data berhasil di edit');
     }

     public function destroy(Posts $posts)
     {
        $posts->delete();

        return redirect('/dashboard')->with('success' , 'data berhasil di hapus');
     }

}
