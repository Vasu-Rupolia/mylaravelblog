<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use Redirect;
use Session;
use Auth;

class AdminController extends Controller
{
    public function adminLoginPage(){
        return view('site_header').view('Admin/admin_login');        
    }

    public function adminLogin(Request $request){
        $adminusername = $request->adminusername;
        $adminpassword = base64_encode($request->adminpassword);

        $res = DB::select("SELECT * FROM admin WHERE username = '$adminusername' AND password = '$adminpassword'");
        if(count($res) > 0){
            session()->put('adminlogin', true);
            session()->put('admin_id', $res[0]->id);
            session()->put('admin_username', $res[0]->username);

            return redirect('/create_post');
        }else{
            Session::flash('login_failed', 'Incorrect login details given');
            return redirect('/adminlogin');
        } 
    }

    public function adminLogout(){
        Auth::logout();
        Session::forget('adminlogin');
        Session::forget('admin_id');
        Session::forget('admin_username');
        return redirect('/adminlogin');
    }

    public function updatePostPage(){
        $arr = DB::select("SELECT id, blogtitle FROM blog");
        return view('site_header').view('Admin/update_post', array('postdata' => $arr));
    }
}
