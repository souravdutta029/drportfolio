<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactlist(Request $request)
    {
        $result['data'] = DB::table('contacts')->orderBy('id','desc')->get();
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('admin.contact.contact', $result);
    }

    public function delete(Request $request, $id)
    {
        $model = Contact::find($id);
        $model ->delete();
        $request ->session()->flash('message','Contact Deleted');
        return redirect('admin/contact');
    }
}
