<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('page_title')</title>

	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="{{asset('admin_asset/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/518d92386b.js" crossorigin="anonymous"></script>
	<link href="{{asset('admin_asset/css/green.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/custom.min.css')}}" rel="stylesheet">
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{url('admin/dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{config('constants.SITE_NAME')}}</span></a>
					</div>

					<div class="clearfix"></div>

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
								<li>
									<a href="javascript:void(0)">
                                        <i class="fa fa-home"></i> Homepage
										<span class="fa fa-chevron-down"></span>
									</a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('admin/home_banner')}}">Home Images</a></li>
                                        <li><a href="{{url('admin/home_profile')}}">Home Profile</a></li>
                                    </ul>
								</li>
                                <li>
									<a href="javascript:void(0)">
                                        <i class="fas fa-file-alt"></i> Pages
										<span class="fa fa-chevron-down"></span>
									</a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('admin/page')}}">Create Pages</a></li>
                                        <li><a href="{{url('admin/sub_page')}}">Create Subpages</a></li>
                                        <li><a href="{{url('admin/accordion')}}">Create Accordion For Subpages</a></li>
                                    </ul>
								</li>
								{{-- <li>
									<a href="{{url('admin/page')}}"><i class="fa fa-home"></i> Pages
										<span class="fa fa-chevron-down"></span>
									</a>
								</li> --}}
								<li>
									<a href="{{url('admin/contact')}}"><i class="fas fa-id-card-alt"></i> Contact Us
										<span class="fa fa-chevron-down"></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									Welcome,&nbsp; {{session('ADMIN_NAME')}}
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{url('admin/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					@section('container')

                    @show
				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					Designed & Developed By <a href="javascript:void(0)">Sourav Dutta </a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>


    <script src="{{asset('admin_asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/icheck.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/buttons.bootstrap.min.js')}}"></script>
    {{-- <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> --}}
    <script src="{{asset('admin_asset/js/responsive.bootstrap.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin_asset/js/custom.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/ckeditor.js')}}"></script>

</body>
</html>
