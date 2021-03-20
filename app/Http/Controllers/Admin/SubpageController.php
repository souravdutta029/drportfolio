<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subpage;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SubpageController extends Controller
{
    public function sub_page(Request $request)
    {
        $result['data'] = DB::table('subpages')
                            ->leftJoin('pages','pages.id','=','subpages.page_id')
                            ->select('subpages.*','pages.title as parent_page_name')
                            ->orderBy('subpages.id','desc')
                            ->get();
        return view('admin.subpages.sub_page', $result);
    }


    public function manage_sub_page(Request $request, $id='')
    {
        $result['pages'] = DB::table('pages')->where('status',1)
                           ->select('id','title')
                           ->get();
        if($id > 0){
            $arr = Subpage::where(['id' =>$id])->get();
            $result['title'] = $arr['0']->title;
            $result['page_id'] = $arr['0']->page_id;
            $result['slug'] = $arr['0']->slug;
            $result['body'] = $arr['0']->body;
            $result['meta_keyword'] = $arr['0']->meta_keyword;
            $result['meta_tag'] = $arr['0']->meta_tag;
            $result['meta_description'] = $arr['0']->meta_description;
            $result['og_image'] = $arr['0']->og_image;
            $result['id'] = $arr['0']->id;
        }else{
            $result['title'] = '';
            $result['page_id'] = '';
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
        return view('admin.subpages.manage_sub_page', $result);
    }


    public function manage_sub_page_process(Request $request)
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
            $model = Subpage::find($request ->post('id'));
            $msg = "Subpage Updated";
        }else{
            $model = new Subpage();
            $msg = "Subpage Created";
        }

        if($request ->hasFile('og_image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('subpages')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/subpage/'.$arrImage['0']->og_image)){
                    Storage::delete('/public/media/subpage/'.$arrImage['0']->og_image);
                }
            }
            $image = $request ->file('og_image');
            $ext = $image ->extension();
            $rand = rand('111111111', '999999999');
            $image_name = $rand.'.'.$ext;
            $image ->storeAs('/public/media/subpage', $image_name);
            $model ->og_image=$image_name;
        }

        $model ->slug=$request ->post('slug');
        $model ->title=$request ->post('title');
        $model ->page_id=$request ->post('page_id');
        $model ->body=$request ->post('body');
        $model ->meta_keyword=$request ->post('meta_keyword');
        $model ->meta_tag=$request ->post('meta_tag');
        $model ->meta_description=$request ->post('meta_description');
        $model ->status=1;
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/sub_page');
    }

    public function delete(Request $request, $id)
    {
        $arrImage = DB::table('subpages')->where(['id' => $id])->get();
        if(Storage::exists('/public/media/subpage/'.$arrImage['0']->og_image)){
            Storage::delete('/public/media/subpage/'.$arrImage['0']->og_image);
        }

        $model = Subpage::find($id);
        $model ->delete();
        $request ->session()->flash('message','Subpage Deleted');
        return redirect('admin/sub_page');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Subpage::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Subpage status Updated');
        return redirect('admin/sub_page');
    }
}
