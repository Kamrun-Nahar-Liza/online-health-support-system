<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Profile;
use App\User;
use DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data=[];
         //here category in with is relation name .its eager loading from less query
        $data['profiles'] = Profile::select('id','profile_pic', 'first_name', 'last_name','department','designation','phone')->get();
        return view('profile.doctorlist',$data);
    }

    
    public function create()
    {
        $data=[];

        return view('profile.createprofile', $data);
    }

    
    public function store(Request $request)
    {
        //validation

        $rules= [
            'profile_pic' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'phone' => 'required'
   
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //database insert

          $profile = new Profile;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->department = $request->input('department');
        $profile->phone = $request->input('phone');
        $profile->designation = $request->input('designation');  
           $profile->user_id = auth()->user()->id; 
              
         if($request->hasfile('profile_pic')) {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalName(); //getting image extension
            $filename =$extension;
            $file->move('uploads/doctor/', $filename);
            $profile->profile_pic = $filename;

        }      
        $profile->save();

        return redirect('/profile');

        //redirect

        // session()->flash('message','Profile Information Added Successfully');
        // session()->flash('type','success');
        // return redirect()->route('profile.create');
       
    }

   
    public function show($id)
    {
        $data=[];
         //here category in with is relation name .its eager loading from less query
        // $data['profile'] = Profile::select('id','profile_pic', 'first_name', 'last_name','department','designation','phone')->get($id);
        // return view('profile.profile', ['data' => $data] );

        // $data = DB::select('select * from profiles where id = 1');
        //  return view('profile.profile',['data'=>$data]);
        $data = Profile::find($id);
         return view('profile.profile', compact('data'));
    }

    
    public function edit($id)
    {
        // $data=[];
        //  //here category in with is relation name .its eager loading from less query
        // $data['profile'] = Profile::with('user')->select('id','profile_pic', 'first_name', 'last_name','department','designation','phone')->get($id);
        // return view('profile.editprofile',$data);
      //
        $profile = Profile::find($id);
        return view('profile.editprofile', compact('profile'));
    }

    
   public function update(Request $request, $id)
    {
        $this->validate($request, [
            
            'profile_pic' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'phone' => 'required'


        ]);

        $profile = Profile::find($id);
        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->department = $request->input('department');
        $profile->designation = $request->input('designation');
        $profile->phone = $request->input('phone');

        $profile->user_id = auth()->user()->id;
        if($request->hasfile('profile_pic')) {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalName(); //getting image extension
            $filename =$extension;
            $file->move('uploads/doctor/', $filename);
            $profile->profile_pic = $filename;

        }           
        $profile->save();

        return redirect('/profile');
    }

    
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        //redirect
        return redirect()->route('profile.index');
    }
}
