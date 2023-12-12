<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
     <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

     <nav>
          <div class="container nav__container">
               <a href="" class="nav__logo">Arvci</a>
               <ul class="nav__items">
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li class="nav__profile">
                         <div class="avatar">
                              @if(Auth::check() && Auth::user()->role === 'Author')
                              <img src="/assets/images/hanif.jpg" />
                              @endif
                              @if(Auth::check() && Auth::user()->role === 'Admin')
                              <img src="/assets/images/a.jpg" />
                              @endif
                         </div>
                         <ul>
                              <li><a href="/dashboard">Dashboard</a></li>
                              @if(Auth::check() && Auth::user()->role === 'Admin')
                              <li><a href="/change-password">Change Password</a></li>
                              @endif
                              @if(Auth::check() && Auth::user()->role === 'Author')
                              <li><a href="/change-password">Change Password</a></li>
                              @endif
                              <li><a href="{{ route('logout') }}">Logout</a></li>
                         </ul>
                    </li>

                    <li><a href="/">Sign In</a></li>

               </ul>
               <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
               <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
          </div>
     </nav>

     
     <section class="dashboard">
          @yield('content')
     </section>

     <footer>
          <div class="container footer__container">
               <article>
                    <h4>Categories</h4>
                    <ul>
                         <li><a href="">Anime</a></li>
                         <li><a href="">Travel</a></li>
                         <li><a href="">Art</a></li>
                         <li><a href="">Education</a></li>
                         <li><a href="">Food</a></li>
                         <li><a href="">Music</a></li>
                    </ul>
               </article>
               <article>
                    <h4>Blog</h4>
                    <ul>
                         <li><a href="">Safety</a></li>
                         <li><a href="">Repair</a></li>
                         <li><a href="">Recent</a></li>
                         <li><a href="">Popular</a></li>
                         <li><a href="">Categoried</a></li>
                    </ul>
               </article>
               <article>
                    <h4>Permalinks</h4>
                    <ul>
                         <li><a href="">Home</a></li>
                         <li><a href="">Blog</a></li>
                         <li><a href="">About</a></li>
                         <li><a href="">Services</a></li>
                         <li><a href="">Contacts</a></li>
                    </ul>
               </article>
          </div>
          <div class="footer__copyright">
               <small>Copyright &copy; RPOJECT RPL 3</small>
          </div>
     </footer>

     <script src="/assets/js/main.js"></script>
</body>

</html>