<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request)
    {
        $result['data'] = DB::table('pages')->orderBy('id','desc')->get();
        return view('admin.pages.page', $result);
    }

    public function manage_page(Request $request, $id='')
    {
        if($id > 0){
            $arr = Page::where(['id' =>$id])->get();
            $result['title'] = $arr['0']->title;
            $result['slug'] = $arr['0']->slug;
            $result['body'] = $arr['0']->body;
            $result['meta_keyword'] = $arr['0']->meta_keyword;
            $result['meta_tag'] = $arr['0']->meta_tag;
            $result['meta_description'] = $arr['0']->meta_description;
            $result['og_image'] = $arr['0']->og_image;
            $result['id'] = $arr['0']->id;
        }else{
            $result['title'] = '';
            $result['slug'] = '';
            $result['body'] = '';
            $result['meta_keyword'] = '';
            $result['meta_tag'] = '';
            $result['meta_description'] = '';
            $result['og_image'] = '';
            $result['id'] = 0;
        }
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('admin.pages.manage_page', $result);
    }

    public function manage_page_process(Request $request)
    {
        // return $request ->post();
        // die();
        $request ->validate([
            'og_image' => 'mimes:jpg,jpeg,png',
            'title' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);

        if($request ->post('id') > 0){
            $model = Page::find($request ->post('id'));
            $msg = "Page Updated";
        }else{
            $model = new Page();
            $msg = "Page Created";
        }

        if($request ->hasFile('og_image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('pages')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/page/'.$arrImage['0']->og_image)){
                    Storage::delete('/public/media/page/'.$arrImage['0']->og_image);
                }
            }
            $image = $request ->file('og_image');
            $ext = $image ->extension();
            $rand = rand('111111111', '999999999');
            $image_name = $rand.'.'.$ext;
            $image ->storeAs('/public/media/page', $image_name);
            $model ->og_image=$image_name;
        }

        $model ->slug=$request ->post('slug');
        $model ->title=$request ->post('title');
        $model ->body=$request ->post('body');
        $model ->meta_keyword=$request ->post('meta_keyword');
        $model ->meta_tag=$request ->post('meta_tag');
        $model ->meta_description=$request ->post('meta_description');
        $model ->status=1;
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/page');
    }

    public function delete(Request $request, $id)
    {
        $arrImage = DB::table('pages')->where(['id' => $id])->get();
        if(Storage::exists('/public/media/page/'.$arrImage['0']->og_image)){
            Storage::delete('/public/media/page/'.$arrImage['0']->og_image);
        }

        $model = Page::find($id);
        $model ->delete();
        $request ->session()->flash('message','Page Deleted');
        return redirect('admin/page');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Page::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Page status Updated');
        return redirect('admin/page');
    }
}
