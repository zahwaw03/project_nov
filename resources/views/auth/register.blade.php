<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Register</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
     <link rel="stylesheet" href="/assets/css/style.css" />
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body>

     <section class="form__section">
          <div class="container form__section-container">
               <h2>Register</h2>

               <form action="{{ route('register.action') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" name="firstname" placeholder="First Name" required />
                    <input type="text" name="lastname" placeholder="Last Name" required/>
                    <input type="text" name="username" placeholder="Username" required/>
                    <input type="email" name="email" placeholder="Email" required/>
                    <input type="password" name="password" placeholder="Create Password" required/>
                    <input type="password" name="confrim_password" placeholder="Confirm Password" required/>
                    <select name="role">
                         <option value="Author">Author</option>
                    </select>
                    <div class="form__control">
                         <label for="avatar">User Avatar</label>
                         <input type="file" name="image" id="avatar" required/>
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                    <small>Already have an account? <a href="/">Sign In</a></small>
               </form>
          </div>
     </section>

</body>

</html>