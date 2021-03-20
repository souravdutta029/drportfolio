<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home_profile(Request $request)
    {
        $result['data'] = DB::table('profiles')->get();
        return view('admin.profile.home_profile', $result);
    }

    public function manage_home_profile(Request $request, $id='')
    {
        if($id > 0){
            $arr = Profile::where(['id' =>$id])->get();
            $result['know_image'] = $arr['0']->know_image;
            $result['know_me_title'] = $arr['0']->know_me_title;
            $result['know_me_description'] = $arr['0']->know_me_description;
            $result['home_about_title'] = $arr['0']->home_about_title;
            $result['about_image'] = $arr['0']->about_image;
            $result['home_about_description'] = $arr['0']->home_about_description;
            $result['id'] = $arr['0']->id;
        }else{
            $result['know_image'] = '';
            $result['know_me_title'] = '';
            $result['know_me_description'] = '';
            $result['home_about_title'] = '';
            $result['about_image'] = '';
            $result['home_about_description'] = '';
            $result['id'] = 0;
        }
        return view('admin.profile.manage_home_profile', $result);
    }

    public function manage_home_profile_process(Request $request)
    {
        $request ->validate([
            'know_image' => 'mimes:jpg,jpeg,png',
            'about_image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request ->post('id') > 0){
            $model = Profile::find($request ->post('id'));
            $msg = "Profile Updated";
        }else{
            $model = new Profile();
            $msg = "Profile Inserted";
        }

        if($request ->hasFile('know_image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('profiles')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/profile/'.$arrImage['0']->know_image)){
                    Storage::delete('/public/media/profile/'.$arrImage['0']->know_image);
                }
            }
            $image = $request ->file('know_image');
            $ext = $image ->extension();
            $rand = rand('111111111', '999999999');
            $image_name = $rand.'.'.$ext;
            $image ->storeAs('/public/media/profile', $image_name);
            $model ->know_image=$image_name;
        }

        if($request ->hasFile('about_image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('profiles')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/profile/'.$arrImage['0']->about_image)){
                    Storage::delete('/public/media/profile/'.$arrImage['0']->about_image);
                }
            }
            $image = $request ->file('about_image');
            $ext = $image ->extension();
            $rand = rand('111111111', '999999999');
            $image_name = $rand.'.'.$ext;
            $image ->storeAs('/public/media/profile', $image_name);
            $model ->about_image=$image_name;
        }

        $model ->know_me_title=$request ->post('know_me_title');
        $model ->know_me_description=$request ->post('know_me_description');
        $model ->home_about_title=$request ->post('home_about_title');
        $model ->home_about_description=$request ->post('home_about_description');
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/home_profile');
    }
}
