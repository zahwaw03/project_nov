<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
     <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
     <section class="form__section">
          <div class="container form__section-container">
               <h2>Sign In</h2>

               @if(session('success'))
               <p style="margin-top: 5px; margin-bottom: 5px; color: green">{{ session('success') }}</p>
               @endif

               @error('LoginError')
               <div style="margin-top: 5px; margin-bottom: 5px; color:red">
                    <strong>Error</strong>
                    <p >{{$message}}</p>
               </div>
               @enderror
               <form action="" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Username or Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <button type="submit" class="btn">Sign In</button>
               </form>
               <small>Don't have an account? <a href="{{ route('register')}}">Sign Up</a></small>
          </div>
     </section>
</body>

</html>