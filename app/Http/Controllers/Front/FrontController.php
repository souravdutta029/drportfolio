<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['data'] = DB::table('banners')
                        ->where('status','1')
                        ->where('image_for_id','1')
                        ->get();
        $result['clinical'] = DB::table('banners')
                        ->where('status','1')
                        ->where('image_for_id','2')
                        ->get();
        $result['success'] = DB::table('banners')
                        ->where('status','1')
                        ->where('image_for_id','3')
                        ->get();
        $result['clients'] = DB::table('banners')
                        ->where('status','1')
                        ->where('image_for_id','4')
                        ->get();
        $result['profile'] = DB::table('profiles')->get();
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('front.index', $result);
    }

    public function about(Request $request)
    {
        return view('front.about');
    }

    public function clinics(Request $request)
    {
        return view('front.clinics');
    }

    public function contact(Request $request)
    {
        return view('front.contact');
    }

    public function faq(Request $request)
    {
        return view('front.faq');
    }

    public function media(Request $request)
    {
        return view('front.media');
    }

    public function services(Request $request)
    {
        return view('front.services');
    }

    // public static function page_menu(){
    //     $result = DB::table('pages')->where('status', '1')->get();
    //     return $result;
    // } subpage

    public function page($slug)
    {
        $result['data'] = DB::table('pages')->where('slug', $slug)->get();
        $result['clients'] = DB::table('banners')
                        ->where('status','1')
                        ->where('image_for_id','4')
                        ->get();
        return view('front.page', $result);
    }

    public function subpage($slug)
    {
        $result['data'] = DB::table('subpages')
                          ->where('slug', $slug)
                          ->get();

        $result['accordions'] = DB::table('accordions')
                                ->where('slug', $slug)
                                ->where('status', '1')
                                ->get();
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('front.subpage', $result);
    }

    public function contact_save(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'enquiry_for' => 'required',
        ]);

        $model = new Contact();
        $msg = "Thank you for your message. It has been sent.";

        $model ->name=$request ->post('name');
        $model ->number=$request ->post('number');
        $model ->email=$request ->post('email');
        $model ->enquiry_for=$request ->post('enquiry_for');
        $model ->message=$request ->post('message');
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('/contact');
    }
}
