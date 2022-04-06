<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $categories=category::orderBy('id','DESC')->paginate(5);
        return view('admin.categories.index',compact('categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function fetchCategory(Request $request)
    {
        if (auth()->user()->hasRole('admin')){
            $categories=Category::orderBy('id','DESC')->paginate(5);

        }else{
            $categories=Category::where('user_id',auth()->user()->id)->orderBy('id','DESC')->paginate(5);
        }
        $categoryComp=view('components.categoriesComp',compact('categories'))->with('i', ($request->input('page', 1) - 1) * 5)->render();

        return response()->json([
            'categoryComp'=>$categoryComp,
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image') and $request->image != null){
                $imageName = $request->image->store('public/category');
            }
        $validator = Validator::make($request->all(),[
            'title_ar'=>'required',
            'title_en'=>'required',
            'image'=>'required',

        ]);
        if(!$validator->passes()){

         return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);

        }
        else{

            $values=[
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'image'=>$imageName,
                'user_id'=>auth()->user()->id,
            ];
        }
        $query=DB::table('categories')->insert($values);
        if ($query){

            return response()->json(['status'=>1,'msg'=>'new category has been successfully added']);

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=category::find($id);

        if($categories){
            return response()->json([
               'status'=>200,
                'categories'=>$categories,
            ]);

        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'categories not found',
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $validator = Validator::make($request->all(),[
            'title_ar'=>'required',
            'title_en'=>'required',

        ]);
        if($validator->fails()){

            return response()->json([
                'status'=>0,
                'error'=>$validator->messages()
            ]);

        }
        else{
            $category=Category::findOrFail($id);

            if ($category){

                $category->title_ar=$request->title_ar;
                $category->title_en=$request->title_en;

                if($request->has('image') and $request->image != null){
                    $imageName = $request->image->store('public/category');
                    $category->image=$imageName;
                }
                $category->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Category updated successfully'
                ]);

            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Category Not Found'
                ]);
            }

        }

        $query=DB::table('categories')->where('id',$request->id)->update($values);
        if ($query){
            return response()->json(['status'=>1,'msg'=>'new category has been successfully added']);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categories = category::findOrFail($id);
        $categories->delete();

        return response()->json(['success' => true]);

    }

}
