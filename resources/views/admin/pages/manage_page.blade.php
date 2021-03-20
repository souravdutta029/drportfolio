@extends('admin.layout.layout')
@section('page_title', 'Manage Page')
@section('container')
<div class="page-title">
    <div class="title_left">
        <h3>Manage Page</h3>
        <a href="{{url('admin/page')}}"><button class="btn btn-primary btn-sm"><i class="fas fa-backward"></i>&nbsp;&nbsp;BACK</button></a>
        <hr>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 ">
        <form class="form-horizontal form-label-left" method="post" action="{{route('page.manage_page_process')}}" enctype="multipart/form-data">
        @csrf
        <div id="more_image_box">
            <div class="x_panel" id="more_image_1">
                <div class="x_content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$title}}">
                                        @error('title')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$slug}}">
                                        @error('slug')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 col-sm-12">
                                        <input type="file" name="og_image" class="form-control">
                                        @error('og_image')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
                                        @if ($og_image != '')
                                            <img width="100px" class="mt-3" src="{{asset('storage/media/page/'.$og_image)}}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Meta Keywords" name="meta_keyword" value="{{$meta_keyword}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Meta Tags" name="meta_tag" value="{{$meta_tag}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" class="form-control" placeholder="Meta Description" name="meta_description" value="{{$meta_description}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="ml-3 body-content">Body Content</label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <textarea name="body" id="body" class="form-control" >{{$body}}</textarea>
                                        @error('body')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
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
