@extends('admin.halaman-dashboard-admin')

@section('title' , 'Dashboard')

@section('content')



<div class="container dashboard__container">
     <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right"></i></button>
     <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left"></i></button>
     <aside>
          <ul>
               <li>
                    <a href="/add-post"><i class="uil uil-pen"></i>
                         <h5>Add Post</h5>
                    </a>
               </li>
               <li>
                    <a href="/dashboard" class="active"><i class="uil uil-postcard"></i>
                         <h5 class="active">Manage Posts</h5>
                    </a>
               </li>
              
               <li>

                    <a href="/add-user"><i class="uil uil-user-plus"></i>
                         <h5>Add User</h5>
                    </a>

               </li>
               <li>
                    <a href="/manage-admin"><i class="uil uil-users-alt"></i>
                         <h5>Manage Users</h5>
                    </a>
               </li>
               <li>
                    <a href="/add-category"><i class="uil uil-edit"></i>
                         <h5>Add Category</h5>
                    </a>
               </li>
               <li>
                    <a href="/manage-category"><i class="uil uil-list-ul"></i>
                         <h5>Manage Categories</h5>
                    </a>
               </li>
           
          </ul>
     </aside>
     <main>
          <h2>Manage Posts</h2>

          @if(session('success'))
          <p style="margin-top: 5px; margin-bottom: 5px; color: green">{{ session('success') }}</p>
          @endif

          <table>
               <thead>
                    <tr>
                         <th>Title</th>
                         <th>Category </th>
                         <th>body</th>
                         <th>Edit</th>
                         <th>Delete</th>
                    </tr>
               <tbody>
               @foreach($posts as $post)
                    <tr>
                         <td>{{ $post->title }}</td>
                         <td>{{ $post->category->name }}</td>
                         <td>{{ $post->body }}</td>
                         <td><a href="{{ route('add-post.edit' , $post->id) }}" class="btn sm">Edit</a></td>
                         <td><a href="{{ route('add-post.destroy' , $post->id) }}" class="btn sm danger">Delete</a></td>
                    </tr>
               @endforeach
               </tbody>
               </thead>
          </table>

     </main>
</div>
@endsection