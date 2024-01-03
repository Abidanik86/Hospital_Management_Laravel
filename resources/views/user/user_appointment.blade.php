<style>
    body {
        font-family: Arial, sans-serif;
            margin: 0;
            justify-content: center;
            align-items: center;
            height: 110v
    }

    .header {
    text-align: center;
    font-size: 40px;

    }

    .cart-container {
    margin: 20px auto;
    max-width: 100%;
    padding: 80px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    text-align: center;
    }

    table, th, td {
    border: 1px solid #ddd;
    }

    th, td {
    padding: 10px;
    text-align: center;
    }

    th {
    background-color: #ffffff;
    
    }

    .cart-summary {
    text-align: right;
    }

    .cart-summary p {
    font-weight: bold;
    }

    .cart-summary a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 10px;
    }

    .cart-container a:hover {
    background-color: #ff0505;
    }

    .cart-container tr:hover {
    background-color: #e2a6a6;
    }

    body 
    {
        font-family: Arial, sans-serif;
        margin: 0;
        justify-content: center;
        align-items: center;
        height: 110vh;
    }

    label
    {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    input 
    {
        width: 100%;
        padding: 8px;
        border: 1px solid #c20000;
        border-radius: 5px;
        color: rgb(0, 0, 0); 
    } 
    input[type="text"],input[type="email"],input[type="password"] 
    {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ffffff;
        border-radius: 4px;   
    }
   
    .form-group button:hover 
    { 
        background-color: rgb(228, 10, 10);
    }
    .form-container 
    {
        max-width: 400px;
        margin: 0 auto;
        background-color: rgb(68, 187, 167);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
   
   
    
</style>
@if(session('Delete_appointment'))
    <script>
        alert('{{ session('Delete_appointment') }}');
    </script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  @isset($header)
  <title>   {{ Auth::user()->name }} : Appointment's</title>
  @else
  <title> Appointment's</title>
  @endisset
  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
  <link rel="icon" type="image/x-icon" href="/headerimage/logo.PNG">
</head>
<body>
    @if(session('cancel_appointment'))
    <script>
        alert('{{ session('cancel_appointment') }}');
    </script>
@endif
<!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span>{{ $header->first()->phone }}</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span>{{ $header->first()->email}}</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="{{ $header->first()->facebook }}"><span class="mai-logo-facebook-f"></span></a>
              <a href="{{ $header->first()->twitter }}"><span class="mai-logo-twitter"></span></a>
              
              <a href="{{ $header->first()->instagram }}"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img style="width:100px; height: 80px;   " src="/headerimage/{{ $header->first()->image }}" alt="Image">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
           
            @if (Route::has('login'))
            @auth  
            <li class="nav-item active">
                <a class="nav-link" href="{{route('view.appointment' , Auth::id())}}">Appoinment's</a>
            </li>  
            <x-app-layout>
            </x-app-layout>
            @else  
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
              </li>
              @endauth
              @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
<!-- .bg-light -->
<div class="cart-container">
    <h1 class="header">Appointment's</h1>
    <br>
    <table>
        <thead>
            <tr>            
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Phone</th>
                <th>Messege</th>
                <th>Doctor</th>
                <th>Status</th>  
                <th>Action</th> 
            </tr>
        </thead>         
        <tbody  class="form-container" >
            @foreach ($data  as  $data)        
            <!-- Loop through your cart items here -->   
                <tr class="trs">                  
                    <td>  
                        {{$data->name}}
                    </td>                
                    <td>
                        {{$data->email}}
                    </td>
                    <td>
                        {{$data->date}}
                    </td> 
                    <td>
                        {{$data->phone}}
                    </td>
                    <td>
                        {{$data->messege}}
                    </td>
                    <td>
                        {{$data->doctor}}
                    </td>
                    <td>                 
                        {{$data->status}}
                    </td>
                 <td >
                    @if($data->status !== 'canceled')
                     <a type="button" href="{{route('cancel.appointment' , $data->id)}}" class="btn btn-danger" onclick="return confirm('Are you Sure You Want To Cancel Your Appointment?')" >Cancel</a>
                     @else
                     <a type="button" href="{{route('delete.appointment' , $data->id)}}" class="btn btn-danger" onclick="return confirm('Are you Sure You Want To Cancel Your Appointment?')" >Delete</a>
                     @endif
                    </td>                       
                </tr>          
                @endforeach                     
           </tbody>
    </table> 
</div>
<br>
@include('user.footer')
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
  <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
</body>
</html>