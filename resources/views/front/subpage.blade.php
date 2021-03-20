@extends('front/layout')
@php
    $title = $data[0]->title;
@endphp
@section('page_title', $title)

@section('container')
   <div class="about-ban">
      <img src="{{asset('storage/media/subpage/'.$data[0] ->og_image)}}">
    </div>

    <div class="about-cont">
      <div class="text-cont">
          {!!$data[0] ->body!!}
      </div>
    </div>
    <div class="comonaccordian">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist" aria-multiselectable="true">
                    @foreach ($accordions as $list)
                        @if ($list ->slug != '')
                            @if ($loop->iteration == 1)
                                @php
                                    $show = 'show';
                                @endphp
                            @else
                                @php
                                    $show = '';
                                @endphp
                            @endif
                            <div class="card">
                                <div class="card-header rgba-stylish-strong z-depth-1 mb-1 tab-color" role="tab" id="heading{{$list ->id}}">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse{{$list ->id}}" aria-expanded="true" aria-controls="collapse{{$list ->id}}">
                                    <h5 class="mb-0 white-text text-uppercase font-thin">
                                        {{$list ->heading}} <i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                    </a>
                                </div>
                                <div id="collapse{{$list ->id}}" class="collapse {{$show}}" role="tabpanel" aria-labelledby="heading{{$list ->id}}" data-parent="#accordionEx7">
                                    <div class="card-body mb-1 rgba-grey-light white-text tab-inset">
                                        <p>{!!$list ->acc_content!!}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
