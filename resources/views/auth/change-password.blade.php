<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Change Password</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
     <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
     <section class="form__section">
          <div class="container form__section-container">
               <h2>Change Password</h2>

              

               @if(session('success'))
               <p style="margin-top: 5px; margin-bottom: 5px; color: green">{{ session('success') }}</p>
               @endif

               <form action="{{ route('password.action') }}" method="POST">
                    @csrf
                    <input type="password" name="old_password" placeholder="Old Password" />
                    @error('old_password')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    <input type="password" name="new_password" placeholder="Password" />
                    @if ($errors->has('new_password'))
                    <div class="alert alert-danger">
                    <small style="color: red;">{{ $errors->first('new_password') }}</small>
                    </div>
                    @endif
                    <button type="submit" class="btn">Change Passowrd</button>
               </form>
          </div>
     </section>
</body>

</html>