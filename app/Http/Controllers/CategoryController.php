<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Validator;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::latest();
        if(!empty($request->get('category_name'))){
            $categories = $categories->where('name','like','%'.$request->get('category_name').'%');
        }
        if(!empty($request->get('slug'))){
            $categories = $categories->where('slug','like','%'.$request->get('slug').'%');
        }

        if(!empty($request->get('status'))){
            $categories = $categories->where('status','like','%'.$request->get('status').'%');
        }

        // if(!empty($request->category_name && $request->slug && $request->status)) {
        //     $categories = $categories->where('name','like','%'.$request->get('category_name').'%')
        //                             ->where('slug','like','%'.$request->get('slug').'%')
        //                             ->where('status','like','%'.$request->get('status').'%')
        //                             ->get();
        // }

        $categories = $categories->paginate(10);
        // dd($categories);
        $data['categories'] = $categories;
        return view('list',$data);

    }

    public function create() {
        return view('create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);

        if($validator->passes()){

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();

            //save image here
           

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'

            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()

            ]);
        }
    }
}
