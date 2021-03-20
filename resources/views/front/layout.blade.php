<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link rel="stylesheet" href="{{asset('front_assets/plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front_assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}"
    />
    <link rel="stylesheet" href="{{asset('front_assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/mystyle.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/responsive.css')}}" />

    <title>@yield('page_title')</title>
  </head>
  <body>
    <div class="top-nav">
      <div class="top-nav-left">
        <a href="javascript:void(0)"
          ><i class="fa fa-phone-alt"></i> +91 9830070045 | 9836771500 |
          9007687905</a
        >
      </div>
      <div class="top-nav-right">
        <a href="mailto:ray.siladitya@gmail.com"
          ><i class="fa fa-envelope"></i> ray.siladitya@gmail.com</a
        >
      </div>
    </div>

    <div class="topmenu">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="{{url('/')}}"
          ><img src="{{asset('front_assets/images/logo_new.png')}}"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            {{-- @php
                use App\Http\Controllers\Front\FrontController;
                $result = FrontController::page_menu();
            @endphp --}}
            @foreach ($menus as $list)
            @if (count($list ->submenus) > 0)
                <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="{{url('/main/'.$list ->slug)}}"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{$list ->title}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($list ->submenus as $submenu)
                      <a class="dropdown-item" href="{{url('/submenu/'.$submenu ->slug)}}">{{$submenu ->title}}</a>
                  @endforeach
              </div>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/main/'.$list ->slug)}}">{{$list ->title}}</a>
                </li>
            @endif
            @endforeach
            <li class="nav-item">
              <a class="nav-link" href="{{url('/contact')}}">Contact Me</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    @section('container')

    @show

    <div class="home-footer">
      <div class="row">
        <div class="col-sm-3">
          <div class="home-footer-cont bootm-logod">
            <a href="{{url('/')}}"><img src="{{asset('front_assets/images/logo_new2.png')}}" /></a>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="home-footer-cont">
              <h2>Quick Links</h2>
              <a href="javascript:;">Home</a>
              <a href="javascript:;">Know Me</a>
              <a href="javascript:;">Client</a>
              <a href="javascript:;">Blogs</a>
              <a href="javascript:;">Contact Me</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="home-footer-cont">
              <h2>Our Services</h2>
              <a href="javascript:;">Clinical Service</a>
              <a href="javascript:;">Therapy Based Service</a>
              <a href="javascript:;">Corporate or Institutional Service</a>
              <a href="javascript:;">Online Service</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="home-footer-cont">
              <h2>Get In Touch</h2>
              <a href="javascript:;">+91 9830070045 / 9836771500 / 9007687905</a>
              <a href="mailto:ray.siladitya@gmail.com">ray.siladitya@gmail.com</a>
              <p></p>
            </div>
            <div class="bottom-social">
              <a href="javascript:;"><i class="fab fa-facebook-square"></i></a>
              <a href="javascript:;"><i class="fab fa-twitter-square"></i></a>
              <a href="javascript:;"><i class="fab fa-linkedin"></i></a>
              <a href="javascript:;"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
      </div>
    </div>

    <script src="{{asset('front_assets/js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('front_assets/plugins/bootstrap-4.0.0/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/plugins/rippler-master/dist/js/jquery.rippler.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front_assets/js/common.js')}}"></script>
  </body>
</html>
