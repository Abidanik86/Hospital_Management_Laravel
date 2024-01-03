
<!DOCTYPE html>
<html lang="en">
<head>
  @if(session('Make_Appointment'))
  <div id="appointmentAlert" class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('Make_Appointment') }}
      <button type="button" class="btn-btn-danger" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <script>
      // Bootstrap alert dismissal via JavaScript
      document.addEventListener('DOMContentLoaded', function () {
          var alert = document.getElementById('appointmentAlert');
          var bootstrapAlert = new bootstrap.Alert(alert);
          setTimeout(function () {
              bootstrapAlert.close();
          }, 5000); // Auto-dismiss after 5 seconds, adjust as needed
      });
  </script>
  @endif
  @if(session('noappointment'))
  <script>
      alert('{{ session('noappointment') }}');
  </script>
@endif
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  @isset($header)
  <title>{{ $header->first()->web_title }} : Medical Website</title>
  @else
   Medical Website
  @endisset
  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
  <link rel="icon" type="image/x-icon" href="/headerimage/logo.PNG">
</head>
<body>
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
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>      
            <li class="nav-item">
              <a class="nav-link" href="{{route('all.doctor')}}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('blog.news')}}">News</a>
            </li>
          
            @if (Route::has('login'))
            @auth  
            <li class="nav-item">
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
@foreach ($fonter as  $fonter)
  <div class="page-hero bg-image overlay-dark" style="background-image: url(../fonterimage/{{$fonter->image}});">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">{{$fonter->sub_head}}</span>
        <h1 class="display-4">{{$fonter->down_head}}</h1>
        <a  href="#appointment-section" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>
@endforeach
  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Chat</span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span>Bee</span>-Health Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span>Bee</span>-Health Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->
    {{-- About Section Starts --}}
    <div class="page-section pb-0">
      <div class="container">
        @foreach ($about as $about )
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
             @if (Route::has('login'))
            <h1 class="text-center mb-5 wow fadeInUp" style="font-size: 35px;">{{$about->title}}</h1>
            @else
             <h1>Welcome to Your Health <br> Center</h1>
            @endif
            <p class="text-grey mb-4">{{$about->para}}</p>     
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="/aboutimage/{{$about->image}}" alt="">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div> <!-- .bg-light -->
       {{-- About Section Ends --}}
  </div> <!-- .bg-light -->
     {{-- Doctor Section Starts --}}
  <div class="page-section">
    <div class="container">
      @if (Route::has('login'))
      <h1 class="text-center mb-5 wow fadeInUp" style="font-size: 35px;">Our Doctors</h1>
      @else
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
      @endif
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach ($doctor as $doctor )
        <div class="item">  
          <div class="card-doctor">     
            <div class="header">          
              <img src="/doctorimage/{{$doctor->image}}" alt="">
              <div class="meta">
                <a href="javascript:void(0);" onclick="showPhoneNumber('{{$doctor->phone}}')">
                  <span class="mai-call"></span>
              </a>
              <script>
                function showPhoneNumber(phoneNumber) {
                    alert('Phone Number: ' + phoneNumber);
                }
            </script>
                <a href="https://wa.me/{{$doctor->whatsapp}}"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr.{{$doctor->name}}</p>
              <span class="text-sm text-grey">{{$doctor->type}}</span>
            </div>       
          </div>     
        </div> 
        @endforeach
      </div>  
    </div>
  </div>
      {{-- Doctor Section Ends--}}
  <div class="page-section bg-light">
    <div class="container">
      @if (Route::has('login'))
      <h1 class="text-center mb-5 wow fadeInUp" style="font-size: 35px;">Latest News</h1>
      @else
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      @endif
      <div class="row">
        @foreach ($news as $item)
          <div class="col-lg-4 col-md-6 py-3">
            <div class="card-blog">       
              <div class="header">
                <div class="post-category">
                  <a href="{{route('blog.details' , $item->id)}}">{{$item->category}}</a>
                </div>
                <a href="{{route('blog.details' , $item->id)}}" class="post-thumb">
                  <img src="/newsimage/{{$item->image}}" alt="">
                </a>
              </div>
              <div class="body">
                <h5 class="post-title"><a href="{{route('blog.details' , $item->id)}}">{{ Str::words( $item->news_title , 6)}}</a></h5>
                <div class="site-info">
                  <div class="avatar mr-2">           
                    <span>{{$item->user_id}}</span>
                  </div>
                  <span class="mai-time"></span> {{$item->date}}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    
      <div class="col-12 text-center mt-4 wow zoomIn">
        <a href="{{route('blog.news')}}" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div> <!-- .page-section -->
  <div id="appointment-section" class="page-section">
    <div class="container">
      @if (Route::has('login'))
      <h1 class="text-center wow fadeInUp" style="font-size: 35px;">Make an Appointment</h1>
      @else
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      @endif
      <form class="main-form" action="{{route('make.appointment')}}" method="post">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select">
              <option>--Select Doctor--</option>
              @foreach ($doctors as $doctors )
              <option value="{{$doctors->type}}">Dr. {{$doctors->name}} -- {{$doctors->type}} Specialist</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="messege"  id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
     <!-- Check if there is content inside the button --> 
     @if (Route::has('login'))
         @auth  
        <div  class="btn btn-primary mt-3 wow zoomIn">
      <button type="submit">Submit Request</button>
     </div>
         @else  
     <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
       @endauth
       @endif
      </form>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      @foreach ($baner as $baner )
        
      
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="/banerimage/{{$baner->fimage}}" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">{{$baner->title}}</h1>
          <a href="{{$baner->playstore}}"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="{{$baner->appstore}}" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
      @endforeach
    </div>
  </div> <!-- .banner-home -->

@include('user.footer')

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
</body>
</html>