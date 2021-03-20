@extends('admin.layout.layout')
@section('page_title', 'Contact Page Listing')
@section('container')
<div class="page-title">
    <div class="title_left">
        <div class="container">
            @if (session('message') != '')
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="font-size: 18px">
                    {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>
        <h3>Contact Page Listing</h3>
        <hr>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
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
                                        <th width="15">Name</th>
                                        <th width="10">Number</th>
                                        <th width="15">Email</th>
                                        <th width="15">Enquiry For</th>
                                        <th width="15">Message</th>
                                        <th width="15">Date</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$list ->name}}</td>
                                        <td>{{$list ->number}}</td>
                                        <td>{{$list ->email}}</td>
                                        <td>{{$list ->enquiry_for}}</td>
                                        <td>{{$list ->message}}</td>
                                        <td>
                                            @php
                                                $datestr = strtotime($list ->created_at);
                                                echo date('d-m-Y', $datestr);
                                            @endphp
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger" href="{{url('admin/contact/delete/')}}/{{$list ->id}}">
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
