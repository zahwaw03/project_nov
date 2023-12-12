@extends('admin.halaman-dashboard-admin')

@section('title' , 'Form Add User')
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
                    <a href="/add-user" class="active"><i class="uil uil-user-plus"></i>
                         <h5 class="active">Add User</h5>
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
     <section style="margin-left: 100px; margin-top: -10px; width:600px;">
          <div>
               <h2>@yield('title')</h2>

               <form action="{{ route('addUser.action') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" name="firstname" placeholder="First Name" />
                    <input type="text" name="lastname" placeholder="Last Name" />
                    <input type="text" name="username" placeholder="Username" />
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Create Password" />
                    <input type="password" name="confrim_password" placeholder="Confirm Password" />
                    <select name="role">
                         <option value="Author">Author</option>
                         <option value="Admin">Admin</option>
                    </select>
                    <div class="form__control">
                         <label for="avatar">User Avatar</label>
                         <input type="file" name="image" id="avatar" />
                    </div>
                    <button type="submit" class="btn">Add User</button>
               </form>
          </div>
     </section>
</div>

<script src="/assets/js/main.js"></script>
@endsection