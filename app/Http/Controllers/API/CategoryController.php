<?php

namespace App\Http\Controllers\API;
use App\Models\category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function get_category(){
       $categories=category::all();

       return response()->json([
          'status'=>200,
          'categories'=>$categories,
       ]);
   }
   public function get_sub_category(){
       $subcategories=Subcategory::all();
       return response()->json([
          'status'=>200,
          'subcatgeories'=>$subcategories,
       ]);
   }
   public function upload_image(Request $request){
       if($request->has('image') and $request->image != null){
           $imageName = $request->image->store('public/category');
       }
       return response()->json([
          'image'=> $imageName,
           'status'=>200
       ]);
   }

}
