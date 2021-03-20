<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index(Request $request){
        if($request ->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
    }

    function auth(Request $request){
        $username = $request ->post('username');
        $password = $request ->post('password');

        $result = Admin::where(['username' => $username])->first();

        if($result){
            if(Hash::check($password, $result ->password)){
                $request ->session()->put('ADMIN_LOGIN', true);
                $request ->session()->put('ADMIN_ID', $result ->id);
                $request ->session()->put('ADMIN_NAME', $result ->name);
                return redirect('admin/dashboard');
            }else{
                $request ->session()->flash('error','The password you entered is incorrect.');
                return redirect('admin/login');
            }
        }else{
            $request ->session()->flash('error','Please enter valid login details.');
            return redirect('admin/login');
        }
    }

    function dashboard(){
        return view('admin/dashboard');
    }
}
