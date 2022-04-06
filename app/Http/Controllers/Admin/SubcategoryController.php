<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Subcategory;
use function back;
use function view;

class SubcategoryController extends Controller
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

    public function index($id)
    {
        $categories=category::findOrFail($id);
        return view('admin.Subcategories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category=category::findOrFail($id);
        return view('admin.Subcategories.create',compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subcategory=new Subcategory();
        $subcategory->category_id=$request['category_id'];
        $subcategory->subcategoryname_ar=$request['subcategorytitle_ar'];
        $subcategory->subcategoryname_en=$request['subcategorytitle_en'];

        if($request->has('image') and $request->image != null){
            $imageName = $request->image->store('public/sub_category');
            $subcategory->image = $imageName;
        }
        $subcategory->save();

        return redirect()->route('categories.index')->with('success', 'success')->with('id', $subcategory->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $id)
    {
        $category = Subcategory::find($id);
       // return view('admin.categories.subCategories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory=Subcategory::findOrFail($id);
        return view('admin.subcategories.edit',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcategoryRequest  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'subcategorytitle_ar'=>'required',
            'subcategorytitle_en'=>'required',

        ]);

        $subcategory =Subcategory::findOrFail($id);
        $subcategory->subcategoryname_ar=$request->subcategorytitle_ar;
        $subcategory->subcategoryname_en=$request->subcategorytitle_en;
        $subcategory->save();
        return redirect()->route('categories.index')->with('success', 'success')->with('id', $subcategory->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::destroy($id);
        return redirect()->route('categories.index');

    }
}
