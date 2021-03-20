<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function home_banner(Request $request)
    {
        $result['data'] = DB::table('banners')->orderBy('id','desc')->get();
        return view('admin.banner.home_banner', $result);
    }

    public function manage_home_banner(Request $request, $id='')
    {
        if($id > 0){
            $arr = Banner::where(['id' =>$id])->get();
            $result['image'] = $arr['0']->image;
            $result['image_for_id'] = $arr['0']->image_for_id;
            $result['title'] = $arr['0']->title;
            $result['content'] = $arr['0']->content;
            $result['id'] = $arr['0']->id;
        }else{
            $result['image'] = '';
            $result['image_for_id'] = '';
            $result['title'] = '';
            $result['content'] = '';
            $result['id'] = 0;
        }
        $result['sectionimages'] = DB::table('image_for')->get();
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('admin.banner.manage_home_banner', $result);
    }

    public function manage_home_banner_process(Request $request)
    {
        // return $request ->post();
        // die();
        $request ->validate([
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request ->post('id') > 0){
            $model = Banner::find($request ->post('id'));
            $msg = "Image Updated";
        }else{
            $model = new Banner();
            $msg = "Image Inserted";
        }

        if($request ->hasFile('image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('banners')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/banner/'.$arrImage['0']->image)){
                    Storage::delete('/public/media/banner/'.$arrImage['0']->image);
                }
            }
            $image = $request ->file('image');
            $ext = $image ->extension();
            $rand = rand('111111111', '999999999');
            $image_name = $rand.'.'.$ext;
            $image ->storeAs('/public/media/banner', $image_name);
            $model ->image=$image_name;
        }

        $model ->image_for_id=$request ->post('image_for_id');
        $model ->title=$request ->post('title');
        $model ->content=$request ->post('content');
        $model ->status=1;
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/home_banner');
    }

    public function delete(Request $request, $id)
    {
        $arrImage = DB::table('banners')->where(['id' => $id])->get();
        if(Storage::exists('/public/media/banner/'.$arrImage['0']->image)){
            Storage::delete('/public/media/banner/'.$arrImage['0']->image);
        }

        $model = Banner::find($id);
        $model ->delete();
        $request ->session()->flash('message','Banner Deleted');
        return redirect('admin/home_banner');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Banner::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Banner status Updated');
        return redirect('admin/home_banner');
    }
}
