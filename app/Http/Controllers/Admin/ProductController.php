<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')){
            $products=Product::all();
            $category=category::all();

        }
        else{
            $products=Product::where('user_id',auth()->user()->id)->get();
            $category=Category::where('user_id',auth()->user()->id)->get();
        }


        return view('admin.products.index',compact('products','category'));
    }
    public function fetchProduct()
    {
        if (auth()->user()->hasRole('admin')){
            $products=Product::all();

        }else{
            $products=Product::where('user_id',auth()->user()->id)->get();
        }
        $productComp=view('components.productComp',compact('products'))->render();

        return response()->json([
            'productComp'=>$productComp,
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('admin')){
            $category=category::all();

        }else{
            $category=Category::where('user_id',auth()->user()->id)->get();

        }
        return view('admin.products.create',compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Product $product)
    {
        $validated = $request->validate([
            'product_ar_name'=>'required',
            'product_en_name'=>'required',
            'product_ar_description'=>'required',
            'product_en_description'=>'required',
            'size'=>'required',
            'price'=>'required',

        ]);



        $product->user_id = auth()->user()->id;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_ar_name=$request->product_ar_name;
        $product->product_en_name=$request->product_en_name;
        $product->product_ar_description=$request->product_ar_description;
        $product->product_en_description=$request->product_en_description;
        $product->subcategory_id=$request->subcategory;
        $product->size=$request->size;
        $product->price=$request->price;


        if($request->has('image') and $request->image != null){
            $imageName = $request->image->store('public/images');
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('products.index')->with('success', 'success')->with('id', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Product::find($id);

        if($products){
            return response()->json([
                'status'=>200,
                'products'=>$products,
            ]);

        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'products not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

            $product=Product::findOrFail($id);

            if ($product){

                $product->category_id = $request->category;
                $product->subcategory_id = $request->subcategory_id;
                $product->product_ar_name=$request->product_ar_name;
                $product->product_en_name=$request->product_en_name;
                $product->product_ar_description=$request->product_ar_description;
                $product->product_en_description=$request->product_en_description;
                $product->subcategory_id=$request->subcategory;
                $product->size=$request->size;
                $product->price=$request->price;

                if($request->has('image') and $request->image != null){
                    $imageName = $request->image->store('public/category');
                    $product->image=$imageName;
                }
                $product->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'product updated successfully'
                ]);

            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'product Not Found'
                ]);
            }
        $query=DB::table('products')->where('id',$request->id)->update($values);
        if ($query){
            return response()->json(['status'=>1,'msg'=>'new product has been successfully added']);

        }

        }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function loadsubcategories($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();
        $subcategory_id = request('subcategory_id') ?? '';
        $generatedOptions = '';
        foreach ($subcategories as $subcategory) {
            if ($subcategory_id and $subcategory_id == $subcategory->id)
                $generatedOptions .= '<option value="' . $subcategory->id . '" selected>' . $subcategory->subcategoryname_ar . '</option>';
            else
                $generatedOptions .= '<option value="' . $subcategory->id . '">' . $subcategory->subcategoryname_ar . '</option>';
        }
        return response()->json(['options' => $generatedOptions]);
    }
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return response()->json(['success' => true]);
    }

}
