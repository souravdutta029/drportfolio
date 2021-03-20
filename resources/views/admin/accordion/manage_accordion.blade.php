@extends('admin.layout.layout')
@section('page_title', 'Manage Subpage Accordions')
@section('container')
<div class="page-title">
    <div class="title_left">
        <h3>Manage Subpage Accordions</h3>
        <a href="{{url('admin/accordion')}}"><button class="btn btn-primary btn-sm"><i class="fas fa-backward"></i>&nbsp;&nbsp;BACK</button></a>
        <hr>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 ">
        <form class="form-horizontal form-label-left" method="post" action="{{route('accordion.manage_accordion_process')}}" enctype="multipart/form-data">
        @csrf
        <div id="more_image_box">
            <div class="x_panel" id="more_image_1">
                <div class="x_content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="">Accordion Heading</label>
                                        <input type="text" class="form-control" placeholder="Heading" name="heading" value="{{$heading}}">
                                        @error('heading')
                                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="">Subpage Slug</label>
                                        <select name="slug" id="" class="form-control" required>
                                            <option value="">Select Subpage Slug</option>
                                            @foreach ($slugs as $list)
                                                @if ($subpage_id == $list ->id)
                                                    <option selected value="{{$list ->slug}}">{{$list ->slug}}</option>
                                                @else
                                                    <option value="{{$list ->slug}}">{{$list ->slug}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="">Subpage</label>
                                        <select name="subpage_id" id="" class="form-control" required>
                                            <option value="">Select Subpage</option>
                                            @foreach ($subpages as $list)
                                                @if ($subpage_id == $list ->id)
                                                    <option selected value="{{$list ->id}}">{{$list ->title}}</option>
                                                @else
                                                    <option value="{{$list ->id}}">{{$list ->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="ml-3 body-content">Accordion Content</label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <textarea name="acc_content" id="acc_content" class="form-control" rows="5">{{$acc_content}}</textarea>
                                        @error('acc_content')
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
