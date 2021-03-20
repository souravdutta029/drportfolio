@extends('admin.layout.layout')
@section('page_title', 'Manage Know Me & About Listing')
@section('container')
<div class="page-title">
    <div class="title_left">
        <h3>Manage Know Me & About Listing</h3>
        <a href="{{url('admin/home_profile')}}"><button class="btn btn-primary btn-sm"><i class="fas fa-backward"></i>&nbsp;&nbsp;BACK</button></a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="{{route('home_profile.manage_home_profile_process')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">KNOW ME IMAGE </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" name="know_image" class="form-control">
                            @error('know_image')
                                <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                            @enderror
                            @if ($know_image != '')
                                <img width="100px" class="mt-3" src="{{asset('storage/media/profile/'.$know_image)}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">KNOW ME TITLE </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Know Me Title" name="know_me_title" value="{{$know_me_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">KNOW ME DESCRIPTION </label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea name="know_me_description" class="form-control">
                                {{$know_me_description}}
                            </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">HOME ABOUT TITLE </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Home About Title" name="home_about_title" value="{{$home_about_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">ABOUT IMAGE </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" name="about_image" class="form-control">
                            @error('about_image')
                                <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                            @enderror
                            @if ($about_image != '')
                                <img width="100px" class="mt-3" src="{{asset('storage/media/profile/'.$about_image)}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">HOME ABOUT DESCRIPTION </label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea name="home_about_description" class="form-control">
                                {{$home_about_description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <input type="hidden" name="id" value="{{$id}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
