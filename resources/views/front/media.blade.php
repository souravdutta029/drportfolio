@extends('front/layout')
@section('page_title', 'Dr. Siladitya Ray | Media');

@section('container')
<div class="about-ban">
    <img src="{{asset('front_assets/images/img10.jpg')}}">
</div>

<div class="clients-cont">
    <h1>media</h1>
    <div class="meida-cont"></div>
    <div class="media-slide">
    <div class="owl-carousel">
        <div class="media-slide-box">
        {{-- <img src="#"> --}}
        </div>
    </div>
    </div>
</div>
@endsection
