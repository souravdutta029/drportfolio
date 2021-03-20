@extends('admin.layout.layout')
@section('page_title', 'Accordion Listing')
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
        <h3>Accordion Listing</h3>
        <button class="btn btn-primary"><a href="{{url('admin/accordion/manage_accordion')}}" style="color: white"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;CREATE ACCORDION FOR SUBPAGE</a></button>
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
                                        <th width="20%">Subpage Name</th>
                                        <th width="20%">Subpage Slug</th>
                                        <th width="15%">Heading</th>
                                        <th width="15%">Date</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$list ->subpage_name}}</td>
                                        <td>{{$list ->slug}}</td>
                                        <td>{{$list ->heading}}</td>
                                        <td>
                                            @php
                                                $datestr = strtotime($list ->created_at);
                                                echo date('d-m-Y', $datestr);
                                            @endphp
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info" href="{{url('admin/accordion/manage_accordion/'.$list ->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($list ->status == 1)
                                            <a href="{{url('admin/accordion/status/0')}}/{{$list ->id}}">
                                                <button class="btn btn-success" type="submit">
                                                    Active
                                                </button>
                                            </a>
                                            @elseif ($list ->status == 0)
                                            <a href="{{url('admin/accordion/status/1')}}/{{$list ->id}}">
                                                <button class="btn btn-warning" type="submit">
                                                    Deactivate
                                                </button>
                                            </a>
                                            @endif
                                            <a class="btn btn-outline-danger" href="{{url('admin/accordion/delete/')}}/{{$list ->id}}">
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
