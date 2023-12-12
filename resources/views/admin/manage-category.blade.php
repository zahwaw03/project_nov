@extends('admin.halaman-dashboard-admin')

@section('title' , 'Manage Categories')
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
                    <a href="/dashboard"><i class="uil uil-postcard"></i>
                         <h5>Manage Posts</h5>
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
                    <a href="/manage-category" class="active"><i class="uil uil-list-ul"></i>
                         <h5 class="active">Manage Categories</h5>
                    </a>
               </li>
             
          </ul>
     </aside>

     <main>
          <h2>@yield('title')</h2>

          @if(session('success'))
          <p style="margin-top: 5px; margin-bottom: 5px; color: green">{{ session('success') }}</p>
          @endif


          <!-- @php
          $i = 1
          @endphp -->

          <table>
               <thead>
                    <tr>
                         <th>Title</th>
                         <th>Description</th>
                         <th>Aksi</th>
                    </tr>
               <tbody>
                    @foreach($categories as $category)
                    <tr>
                         <td>{{ $category->name }}</td>
                         <td>{{ $category->description }} </td>
                         <td>
                              <form action="{{ route('manage-category.destroy1', $category->id) }}" method="POST">
                             <a href="{{ route('manage-category.edit1', $category->id) }}" class="btn sm">Edit</a>
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Hapus</button>
                             </form>
                         </td>
                    </tr>
                    @endforeach
               </tbody>
               </thead>
          </table>

     </main>
</div>

<script src="/assets/js/main.js"></script>
@endsection