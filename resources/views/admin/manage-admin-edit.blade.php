@extends('admin.halaman-dashboard-admin')

@section('title' , 'Manage Admin Edit')
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
                    <a href="/manage-admin" class="active"><i class="uil uil-users-alt"></i>
                         <h5 class="active">Manage Users</h5>
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

     <section style="margin-left: 100px; margin-top: -10px; width:600px;" >
          <div >
               <h2>Edit Admin</h2>
               <form action="{{ route('manage-admin.update', $users->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="text" name="firstname" placeholder="First Name" value="{{ $users->firstname }}"/>
                    <input type="text" name="lastname" placeholder="Last Name" value="{{ $users->lastname }}"/>
                    <select name="role">
                         <option value="Author">Author</option>
                         <option value="Admin">Admin</option>
                    </select>
                    <button type="submit"  class="btn">Update Admin</button>
               </form>
          </div>
     </section>
</div>

<script src="/assets/js/main.js"></script>
@endsection