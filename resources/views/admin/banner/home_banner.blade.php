@extends('admin.layout.layout')
@section('page_title', 'Banner Listing')
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
        <h3>Banner Listing</h3>
        <button class="btn btn-primary"><a href="{{url('admin/home_banner/manage_home_banner')}}" style="color: white"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;ADD BANNER / CLINICAL / SUCCESS / CLIENTS </a></button>
        <hr>
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
                                        <th width="12%">Image For</th>
                                        <th width="10%">Title</th>
                                        <th width="15">Content</th>
                                        <th width="13%">Image</th>
                                        <th width="10%">Date</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @php
                                                if($list ->image_for_id == 1){
                                                    echo "Banner";
                                                }elseif($list ->image_for_id == 2){
                                                    echo "Clinical";
                                                }elseif($list ->image_for_id == 3){
                                                    echo "Success";
                                                }
                                                elseif($list ->image_for_id == 4){
                                                    echo "Clients";
                                                }
                                            @endphp
                                        </td>
                                        <td>{{$list ->title}}</td>
                                        <td>{{$list ->content}}</td>
                                        <td>
                                            @if ($list ->image != '')
                                                <img width="100px" src="{{asset('storage/media/banner/'.$list ->image)}}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $datestr = strtotime($list ->created_at);
                                                echo date('d-m-Y', $datestr);
                                            @endphp
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info" href="{{url('admin/home_banner/manage_home_banner/'.$list ->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($list ->status == 1)
                                            <a href="{{url('admin/home_banner/status/0')}}/{{$list ->id}}">
                                                <button class="btn btn-success" type="submit">
                                                    Active
                                                </button>
                                            </a>
                                            @elseif ($list ->status == 0)
                                            <a href="{{url('admin/home_banner/status/1')}}/{{$list ->id}}">
                                                <button class="btn btn-warning" type="submit">
                                                    Deactivate
                                                </button>
                                            </a>
                                            @endif
                                            <a class="btn btn-outline-danger" href="{{url('admin/home_banner/delete/')}}/{{$list ->id}}">
                                                <i class="fas fa-trash-alt"></i>
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
