@extends('admin.layout.layout')
@section('page_title', 'Manage Banner')
@section('container')
<div class="page-title">
    <div class="title_left">
        <h3>Manage Banner</h3>
        <a href="{{url('admin/home_banner')}}"><button class="btn btn-primary btn-sm"><i class="fas fa-backward"></i>&nbsp;&nbsp;BACK</button></a>
        <hr>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 ">
        <form class="form-horizontal form-label-left" method="post" action="{{route('home_banner.manage_home_banner_process')}}" enctype="multipart/form-data">
        @csrf
        <div id="more_image_box">
            <div class="x_panel" id="more_image_1">
                <div class="x_content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="image_for_id" id="image_for_id" class="form-control">
                                            <option value="#">Select Section</option>
                                            @foreach ($sectionimages as $item)
                                                @if ($image_for_id == $item ->id)
                                                    <option value="{{$item ->id}}" selected>{{$item ->name}}</option>
                                                @else
                                                    <option value="{{$item ->id}}">{{$item ->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$title}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Content" name="content" value="{{$content}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 col-sm-12">
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
                                        @if ($image != '')
                                            <img width="100px" class="mt-3" src="{{asset('storage/media/banner/'.$image)}}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
                <input type="hidden" name="id" value="{{$id}}">
            </div>
            <div class="col-md-3 col-sm-3"></div>
        </div>
    </form>
    </div>
</div>
@endsection
