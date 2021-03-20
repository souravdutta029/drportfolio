@extends('front/layout')
@php
    $title = $data[0]->title;
@endphp
@section('page_title', $title)

@section('container')
   <div class="about-ban">
      <img src="{{asset('storage/media/page/'.$data[0] ->og_image)}}">
    </div>

    <div class="about-cont">
      <div class="text-cont">
          {!!$data[0] ->body!!}
      </div>
    </div>
    @if ($data[0]->title == 'Client')
        <div class="clients-wrap">
            <div class="row">
                @foreach ($clients as $list)
                    <div class="col-sm-4">
                        <div class="clients-box2">
                            <div class="client-img">
                                <img src="{{asset('storage/media/banner/'.$list ->image)}}" width="400px"/>
                            </div>
                            <div class="clients-box-top2">
                                <h4>{{$list ->title}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
