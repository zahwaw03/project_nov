@extends('admin.halaman-dashboard-admin')

@section('title' , 'Add Post')
@section('content')
<div class="container dashboard__container">
     <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right"></i></button>
     <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left"></i></button>
     <aside>
          <ul>
               <li>
                    <a href="/add-post" class="active"><i class="uil uil-pen"></i>
                         <h5 class="active">Add Post</h5>
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
                    <a href="/add-category" ><i class="uil uil-edit"></i>
                         <h5 >Add Category</h5>
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
        <h2>Add Post</h2>
        
        <form action="{{ route('addPost.action') }}" enctype="multipart/form-data" method="POST">
          @csrf
          <input type="text" name="title"  placeholder="Title" />

          <select name="category_id">
               @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
          </select>
          <textarea rows="10" name="body" placeholder="Body"></textarea>

          <input type="" name="author_id"  value="{{ $users->id }}" hidden />

          <div class="form__control">
            <label for="thumbnail">Add Thumbnail</label>
            <input type="file" name="image" id="thumbnail" />
          </div>
          <button type="submit" class="btn">Post</button>
        </form>
      </div>
    </section>
</div>

<script src="/assets/js/main.js"></script>
@endsection