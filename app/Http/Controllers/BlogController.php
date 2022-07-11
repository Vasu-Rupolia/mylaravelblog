<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use Redirect;
use Session;
use Auth;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = DB::select("SELECT * FROM blog ORDER BY id desc");
        //return view('site_header').view('show_posts', array('my' => $arr));
        return view('site_header').view('show_posts', array('my' => $arr));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_header').view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'blogimage' =>'required|mimes:jpg,png,jpeg|max:5048']
        );

        $newImageName = time() . "-" . $request->post_title . "." . $request->blogimage->extension();
        $request->blogimage->move(public_path('blogimages'), $newImageName);

        $post = new Blog;
        $post->blogtitle = $request->post_title;
        $post->blogcontent = $request->post_content;
        $post->blogimage = $newImageName;

        $post->save();
        return redirect('/show_posts');
        //return view('create_post', array('data' => $request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr = DB::select("SELECT * FROM blog WHERE id = $id");
        return view('site_header').view('/edit_post', array('data_to_edit' => $arr));
        //passDataToFunc($arr);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = new Blog;
        $id = $request->post_id_hidden;
        $blogtitle = $request->post_title;
        $blogcontent = $request->post_content;

        DB::update("UPDATE blog SET blogtitle = '$blogtitle', blogcontent = '$blogcontent' WHERE id = $id");
        return redirect('/show_posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM blog WHERE id = $id");
        return redirect('/show_posts');
    }

    public function post($id){
        $arr = DB::select("SELECT * FROM blog WHERE id = $id");
        return view('site_header').view('post', array('post' => $arr));
    }

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
}
