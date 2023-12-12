@extends('admin.halaman-dashboard-admin')

@section('title' , 'Add Category')
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
                    <a href="/add-category" class="active"><i class="uil uil-edit"></i>
                         <h5 class="active">Add Category</h5>
                    </a>
               </li>
               <li>
                    <a href="/manage-category"><i class="uil uil-list-ul"></i>
                         <h5>Manage Categories</h5>
                    </a>
               </li>
              
          </ul>
     </aside>

     <section style="margin-left: 100px; margin-top: -10px; width:600px;">>
      <div >
        <h2>Add Category</h2>
        <!-- <div class="alert__message error">
        </div> -->
        <form action="{{ route('addCategory.action') }}" method="POST">
          @csrf
          <input type="text" name="name" placeholder="name" />
          <textarea rows="4"   name="description" placeholder="Description"></textarea>
          <button type="submit" class="btn">Add Category</button>
        </form>
      </div>
    </section>
</div>

<script src="/assets/js/main.js"></script>
@endsection