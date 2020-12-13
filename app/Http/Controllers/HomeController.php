<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function doctorindex()
    {
        return view('doctor');
    }

     public function patientindex()
    {
        return view('patient');
    }

    public function adminindex()
    {
        return view('admin');
    }

    public function dashboardindex()
    {
         $data=[];
         $data['cats'] = Category::select('name','id','created_at')->get();
         $data['recoverys'] = Post::select('title','content','created_at')->get();
         $data['posts'] = Post::with('category','user')->select('id','title','content','user_id','category_id','status','created_at')->get();
  
        return view('Dashboard.dashboard', $data);
    }

    public function dashboardactivities()
    {
         $data=[];
         $data['cats'] = Category::select('name','id','created_at')->get();
         $data['recoverys'] = Post::select('title','content','created_at')->get();
         $data['posts'] = Post::with('category','user')->select('id','title','content','user_id','category_id','status','created_at')->get();
  
        return view('Dashboard.activity', $data);
    }

    public function patientdetail()
    {
         $data=[];
         $data['cats'] = Category::select('name','id','created_at')->get();
         $data['recoverys'] = Post::select('title','content','created_at')->get();
         $data['posts'] = Post::with('category','user')->select('id','title','content','user_id','category_id','status','created_at')->get();
         $data['users'] = User::select('id','name', 'email', 'role')->get();
         $profile = User::all();
        
  
        return view('Dashboard.patientlist', $data,compact('user'));
    }



}
