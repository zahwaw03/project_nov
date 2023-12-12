<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Error 403</title>

     <style>
          body {
               background-color: #f8d7da;
          }
          .alert {
               padding: 20px;
               margin-bottom: 20px;
               border: 1px solid transparent;
               border-radius: 4px;
               justify-content: center;
               align-items: center;
               text-align: center;
               margin-top: 20%;
          }

          .alert-dangerr {
               font-size: 30px;
               color: #721c24;
               border-color: #f5c6cb;
               border-radius: 20px;
          }
     </style>

</head>

<body>

     @if(session('error'))
     <div class="alert alert-dangerr">
          {{ session('error') }}<br>
          403 Not.Found
     </div>
     @endif

</body>

</html>