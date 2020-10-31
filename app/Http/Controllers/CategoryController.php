<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Validator;

class CategoryController extends Controller
{
    public function index(){

    	 $data=[];
		 $data['categories'] = Category::select('id','name','slug','status')->get();

    	return view('category.index', $data);
    }

    public function create(){

    	 $data=[];
		 return view('category.create', $data);
    }

    public function store(Request $request){
		//validation

      	$rules= [
            'name' => 'required|unique:categories,name',
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //database insert

        Category::create([

        	'name' => trim($request->input('name')),
        	'slug' => str_slug(trim($request->input('name'))),
        	'status' => $request->input('status')
        ]);

        //redirect

        session()->flash('message','Disease Name Added Successfully');
        session()->flash('type','success');
        return redirect()->route('categories.create');

    }

    public function show($id){

    	 $data=[];
 		 $data['category'] = Category::select('id','name','slug','status','created_at')->find($id);
    	return view('category.show', $data);
    }

    public function edit($id){

    	 $data=[];
         $data['site_title']='Testblog';
         $data['current_time']= date('Y m d, H:i:s');

         $data['links']=[
        'Facebook'=> 'https://www.facebook.com/',
        'Google'=> 'https://www.google.com/',
        'Youtube'=> 'https://www.youtube.com/',
        'Twitter'=> 'https://www.twitter.com/',
        'LinkedIn'=> 'https://www.linkedin.com/'
    ];

    	$data['category'] = Category::select('id','name','slug','status','created_at')->find($id);
    	return view('category.edit', $data);
    }

    public function update($id, Request $request){

    	//validation

      	$rules= [
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required'
           
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //database update

        $category = Category::find($id);

        $category->update([

        	'name' => trim($request->input('name')),
        	'slug' => str_slug(trim($request->input('name'))),
        	'status' => $request->input('status')
        ]);

        //redirect

        session()->flash('message','Disease Name has been updated');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function delete($id){

    	$category = Category::find($id);
    	$category->delete();

    	//redirect

        session()->flash('message','Disease name deleted');
        session()->flash('type','danger');
        return redirect()->route('categories.index');

    }

}
