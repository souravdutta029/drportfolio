@extends('front/layout')
@section('page_title', 'Dr. Siladitya Ray | Contact');

@section('container')
    <div class="container mt-3">
        @if (session('message') != '')
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="font-size: 18px">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
    </div>
    <div class="about-ban">
      <img src="{{asset('front_assets/images/img9.jpg')}}">
    </div>
    <div class="contact-cont">
      <h2>Contact Us</h2>
      <form action="{{route('contact_save')}}" method="post">
        @csrf
          <div class="contact-wrap">
          <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                        @error('name')
                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <input type="text" class="form-control" placeholder="Phone Number" name="number">
                        @error('number')
                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <input type="email" class="form-control" placeholder="Email ID" name="email">
                        @error('email')
                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <select name="enquiry_for" id="" class="form-control">
                            <option disabled>Enquiry For</option>
                            <option value="General Enquiry">General Enquiry</option>
                            <option value="Consulting Appointment">Consulting Appointment</option>
                            <option value="Travel Film Making Request">Travel Film Making Request</option>
                            <option value="Travel Ogue Request">Travel Ogue Request</option>
                            <option value="Residential Program Request">Residential Program Request</option>
                            <option value="Corporate Workshop Request">Corporate Workshop Request</option>
                            <option value="Email Consulting">Email Consulting</option>
                        </select>

                        @error('enquiry_for')
                            <span class="text-danger" style="font-size: 16px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <textarea name="message" rows="5" class="form-control" placeholder="Your Message"></textarea>
                    </div>
                </div>
            </div>
         </div>
        <div class="contact-linethree">
          <input type="submit" placeholder="Submit">
        </div>
      </div>
      </form>
      <div class="contact-footer">
        <div class="row">
          <div class="col-sm-6">
            <div class="contact-address">
              <h5>CallO On:</h5>
              <h3> 9830070045<span>(for appointment & online services)</span></h3>
              <h3> 9007687905 <span>(for appointment)</span></h3>
              <h3> 9836771500<span>(for appointment)</span></h3>
              <br>
              <h5>Email At:</h5>
              <h3>ray.siladitya@gmail.com</h3>
            </div>
          </div>
          <div class="col-sm-6">
             <div class="paymentdetails">
              <h4>For Offline Payments:  </h4>
        <h5>Bank Name </h5>
        <h3>State Bank of India</h3>
         <h5>A/C No.</h5>
        <h3>10521752488</h3>
         <h5>Branch</h5>
        <h3>Ballygunge Railway Station</h3>
        <h5>IFSC Code</h5>
        <h3>SBIN0003951</h3>
      </div>
          </div>
        </div>
      </div>
    </div>
@endsection
