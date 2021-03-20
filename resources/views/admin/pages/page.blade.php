@extends('admin.layout.layout')
@section('page_title', 'Page Listing')
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
        <h3>Page Listing</h3>
        <button class="btn btn-primary"><a href="{{url('admin/page/manage_page')}}" style="color: white"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;CREATE PAGE</a></button>
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
                                        <th width="20%">Title</th>
                                        <th width="15%">Slug</th>
                                        <th width="20">Og_Image</th>
                                        <th width="15%">Date</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$list ->title}}</td>
                                        <td>{{$list ->slug}}</td>
                                        <td>
                                            @if ($list ->og_image != '')
                                                <img width="100px" src="{{asset('storage/media/page/'.$list ->og_image)}}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $datestr = strtotime($list ->created_at);
                                                echo date('d-m-Y', $datestr);
                                            @endphp
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info" href="{{url('admin/page/manage_page/'.$list ->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($list ->status == 1)
                                            <a href="{{url('admin/page/status/0')}}/{{$list ->id}}">
                                                <button class="btn btn-success" type="submit">
                                                    Active
                                                </button>
                                            </a>
                                            @elseif ($list ->status == 0)
                                            <a href="{{url('admin/page/status/1')}}/{{$list ->id}}">
                                                <button class="btn btn-warning" type="submit">
                                                    Deactivate
                                                </button>
                                            </a>
                                            @endif
                                            <a class="btn btn-outline-danger" href="{{url('admin/page/delete/')}}/{{$list ->id}}">
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
