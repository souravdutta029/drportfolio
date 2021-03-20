@extends('front/layout')
@section('page_title', 'Dr. Siladitya Ray | Clinics');

@section('container')
    <div class="about-ban">
      <img src="{{asset('front_assets/images/img10.jpg')}}">
    </div>

    <div class="clients-cont">
      <h1>Clinics</h1>
      <div class="clients-wrap">
        <div class="row">
          <div class="col-sm-4">
            <div class="clients-box">
              <div class="clients-box-top">
                <h4>PERSONAL CLINIC (KOLKATA)</h4>
              </div>
              <div class="clients-box-bottom">
                <h3>CONVENO DIAGNOSTICS</h3>
                <h4>49/2, PURNADAS ROAD, GOLPARK, NEAR GARIAHAT, Kolkata - 29</h4>
                <h5>CLINIC TIMINGS :</h5>
                <h4>MONDAY - SATURDAY : 8 AM - 8PM  </h4>
                <h5>Contact no :</h5>
                <h4>(033) 65001123</h4>
                <span>For appointment and inquiry, call : Mr.Gaurav Das (9051871767 / 7003691247)</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
