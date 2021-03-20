<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Accordion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AccordionController extends Controller
{
    public function accordion(Request $request)
    {
        $result['data'] = DB::table('accordions')
                            ->leftJoin('subpages','subpages.id','=','accordions.subpage_id')
                            ->select('accordions.*','subpages.title as subpage_name')
                            ->orderBy('accordions.id','desc')
                            ->get();
        return view('admin.accordion.accordion', $result);
    }


    public function manage_accordion(Request $request, $id='')
    {
        $result['subpages'] = DB::table('subpages')->where('status',1)
                           ->select('id','title')
                           ->get();
        $result['slugs'] = DB::table('subpages')->where('status',1)
                           ->select('id','slug')
                           ->get();
        if($id > 0){
            $arr = Accordion::where(['id' =>$id])->get();
            $result['subpage_id'] = $arr['0']->subpage_id;
            $result['slug'] = $arr['0']->slug;
            $result['heading'] = $arr['0']->heading;
            $result['acc_content'] = $arr['0']->acc_content;
            $result['id'] = $arr['0']->id;
        }else{
            $result['subpage_id'] = '';
            $result['heading'] = '';
            $result['acc_content'] = '';
            $result['slug'] = '';
            $result['id'] = 0;
        }
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('admin.accordion.manage_accordion', $result);
    }


    public function manage_accordion_process(Request $request)
    {
        // return $request ->post();
        // die();
        $request ->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

        if($request ->post('id') > 0){
            $model = Accordion::find($request ->post('id'));
            $msg = "Accordion Updated";
        }else{
            $model = new Accordion();
            $msg = "Accordion Created";
        }

        $model ->acc_content=$request ->post('acc_content');
        $model ->heading=$request ->post('heading');
        $model ->subpage_id=$request ->post('subpage_id');
        $model ->slug=$request ->post('slug');
        $model ->status=1;
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/accordion');
    }

    public function delete(Request $request, $id)
    {
        $model = Accordion::find($id);
        $model ->delete();
        $request ->session()->flash('message','Accordion Deleted');
        return redirect('admin/accordion');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Accordion::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Accordion status Updated');
        return redirect('admin/accordion');
    }
}
