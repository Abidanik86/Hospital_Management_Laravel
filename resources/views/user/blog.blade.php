<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/x-icon" href="/headerimage/logo.PNG">
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
  <title>{{ $header->first()->web_title }} : News</title>
  @else
   Medical Website News
  @endisset
  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
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
            <li class="nav-item ">
              <a class="nav-link" href="/">Home</a>
            </li>     
            <li class="nav-item">
              <a class="nav-link" href="{{route('all.doctor')}}">Doctors</a>
            </li>
            <li class="nav-item active">
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
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../fonterimage/{{$fonter->image}});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal" style="font-size:100px;">News</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
@endforeach
<div class="page-section">
  <div class="container">
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
    </div> <!-- .row -->
    @if($news->hasPages())
      <div class="d-flex justify-content-center">
        {{ $news->links() }}
      </div>
    @endif
  </div> <!-- .container -->
</div>
<!-- .row -->
    <!-- .container -->
 <!-- .page-section -->

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
</div><!-- .banner-home -->

@include('user.footer') <!-- .page-footer -->

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>