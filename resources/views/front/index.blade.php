@extends('front/layout')
@section('page_title', 'Dr. Siladitya Ray')

@section('container')
<div class="home-ban">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        {{-- <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol> --}}
        <div class="carousel-inner">
        @php
            $loop_count = 1;
        @endphp
        @foreach ($data as $list)
        @php
            $active = "";
            if($loop_count == 1){
                $active = "active";
                $loop_count++;
            }
        @endphp
        <div class="carousel-item {{$active}}">
            <img src="{{asset('storage/media/banner/'.$list ->image)}}" />
            <div class="carousel-caption d-md-block">
              <h5>{{$list ->title}}</h5>
              <p>
                {{strtoupper($list ->content)}}
              </p>
            </div>
          </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="homethird">
      <div class="row">
        <div class="col-sm-4 order-sm-8">
          <div class="home-thirdimg">
            <img src="{{asset('storage/media/profile/'.$profile[0] ->know_image)}}" />
          </div>
        </div>
        <div class="col-sm-8 order-sm-1">
          <div class="home-thirdcont">
            <h5>Know Me</h5>
            <h2>{{strtoupper($profile[0] ->know_me_title)}}</h2>
            <p>
              {!!$profile[0] ->know_me_description!!}
            </p>
            <div class="hoem-thirdbtn">
              <a href="javascript:;">Know more about us</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="homefour">
      <div class="row">
        <div class="col-sm-5">
          <div class="homefour-img">
            <img src="{{asset('storage/media/profile/'.$profile[0] ->about_image)}}" />
          </div>
        </div>
        <div class="col-sm-7">
          <div class="homefour-text">
            <h2>{{$profile[0] ->home_about_title}}</h2>
            <p>
              {!!$profile[0] ->home_about_description!!}
            </p>
            <img src="{{asset('front_assets/images/logo_new.png')}}" />
          </div>
        </div>
      </div>
    </div>

    <div class="homefifth">
      <h2>Clinical Services</h2>
      <p>
        My functional expertise ranges from core clinical orientation to psychological interventions.
      </p>
      <div class="homefifth-slide">
        <div class="owl-carousel">
          @foreach ($clinical as $list)
              <div class="homefifth-slide-box">
                <div class="homefifth-slide-box">
                <img src="{{asset('storage/media/banner/'.$list ->image)}}" />
                </div>
                <div class="homefifth-slide-box-bottom">
                <h2>{{$list ->title}}</h2>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="homesix">
      <div class="homesix-hold">
        <h2>Success Stories</h2>
        <p>As a Motivational Expert, Holistic Psychiatrist and a Travel Writer, I have been able to influence people’s life, attitude and travel experiences, which I am showcasing here.</p>
        <div class="yborder"></div>
        {{-- <div class="homesix-slide">
          <div class="owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer" style="transform: translate3d(-23404px, 0px, 0px); transition: all 0.25s ease 0s; width: 47542px;">
                @foreach ($success as $list)
                    <div class="owl-item cloned" style="width: 233.8px; margin-right: 10px;">
                        <div class="homesix-slide-box">
                            <div class="homesix-slide-box-img">
                                <a data-fancybox="gallery" href="{{asset('storage/media/banner/'.$list ->image)}}"> <img src="{{asset('storage/media/banner/'.$list ->image)}}"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div> --}}
      </div>
    </div>

    <div class="homeseven">
      <div class="row">
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="29822">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Happy Patients</span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="1">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Branches in City</span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="87">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Vlogs</span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="118">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Travelogues</span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="48">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Motivational Workshops</span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="homeseven-box">
            <div class="homeseven-box-top">
              <span class="number count" data-value="447">0</span>
            </div>
            <div class="homeseven-box-btm">
              <span>Covid Treated</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="homeeight">
    <div class="container">
        <div class="homeeight-cont">
            <div class="row">
                <div class="col-sm-5">
                    <div class="homeeight-cont-img">
                        <img src="{{asset('front_assets/images/img6.jpg')}}" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="homeeight-cont-text">
                        <div class="clients-wrap">
                            <div class="clients-box">
                                <div class="clients-box-top">
                                    <h4>PERSONAL CLINIC (KOLKATA)</h4>
                                </div>
                                <div class="clients-box-bottom">
                                    <h3>Medinova Diagnostics</h3>
                                    <h4>1 Sarat Chatterjee Avenue Kolkata 29 <br> Near Menoka Cinema Hall</h4>
                                    <h5>CLINIC TIMINGS :</h5>
                                    <h4>MONDAY - SATURDAY : 8 AM - 8PM</h4>
                                    <h5>Contact no :</h5>
                                    <h4>9830926462 <br> 8444000500 (Watsapp + Calls)</h4>
                                    <h4>medinova.kol@medinovaindia.com</h4>
                                    <h4>For appointment, call Mr. Gourav Das (70036 91247)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="homenine">
      <div class="row">
        <div class="col-sm-4">
          <div class="homenine-blog">
            <div class="homenine-blog-cont">
              <a href="javascript:;">
                <p>Feb20, 2019</p>
                <h3>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.Lorem Ipsum is simply dummy text of the
                  printing and typesetting industry.
                </h3>
              </a>
            </div>
            <div class="border-two"></div>
            <div class="homenine-blog-cont">
              <a href="javascript:;">
                <p>Feb20, 2019</p>
                <h3>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.Lorem Ipsum is simply dummy text of the
                  printing and typesetting industry.
                </h3>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="homenine-video">
            <div class="row">
              <div class="col-sm-6">
                <div class="homenine-video-box">
                  <div class="homenine-video-box-top">
                    <iframe
                      width="100%"
                      height="100%"
                      src="https://www.youtube.com/embed/dXGzCDX1sNA"
                      frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe>
                  </div>
                  <div class="homenine-video-box-bottom">
                    <span
                      >Lorem Ipsum is simply dummy text of the printing</span
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="homenine-video-box">
                  <div class="homenine-video-box-top">
                    <iframe
                      width="100%"
                      height="100%"
                      src="https://www.youtube.com/embed/7hRBb8nEbZk"
                      frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe>
                  </div>
                  <div class="homenine-video-box-bottom">
                    <span
                      >Lorem Ipsum is simply dummy text of the printing</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="homefifth">
      <h2>Clients</h2>
      <div class="yborder"></div>
      <p>

      </p>
      <div class="homefifth-slide">
        <div class="owl-carousel">
          @foreach ($clients as $list)
              <div class="homefifth-slide-box">
                <div class="homefifth-slide-box">
                    <img src="{{asset('storage/media/banner/'.$list ->image)}}" class="rounded"/>
                </div>
                <div class="homefifth-slide-box-bottom p-1 rounded" style="background-color: #F8A422">
                <h2 style="color: #ffffff; font-size:16px">{{$list ->title}}</h2>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div> --}}
@endsection
