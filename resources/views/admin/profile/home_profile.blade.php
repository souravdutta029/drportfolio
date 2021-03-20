@extends('admin.layout.layout')
@section('page_title', 'Homepage Know Me & About Listing')
@section('container')
<div class="page-title">
    <div class="title_left">
        @if (session('message') != '')
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="font-size: 18px">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <h3>Know Me & About Listing</h3>
        <hr>
        {{-- <button class="btn btn-primary"><a href="{{url('admin/home_profile/manage_home_profile')}}" style="color: white">ADD MORE</a></button> --}}
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-sm-12 flash_message">{{session('msg')}}</div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5%">S.No</th>
                                        <th width="25%">Know Image</th>
                                        <th width="15%">Know Title</th>
                                        <th width="15%">About Title</th>
                                        <th width="25%">About Image</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($list ->know_image != '')
                                                <img width="100px" src="{{asset('storage/media/profile/'.$list ->know_image)}}" alt="">
                                            @endif
                                        </td>
                                        <td>{{$list ->know_me_title}}</td>
                                        <td>{{$list ->home_about_title}}</td>
                                        <td>
                                            @if ($list ->about_image != '')
                                                <img width="100px" src="{{asset('storage/media/profile/'.$list ->about_image)}}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info" href="{{url('admin/home_profile/manage_home_profile/'.$list ->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
