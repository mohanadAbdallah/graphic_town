<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Adds;
use Illuminate\Http\Request;
use Validator;

class AddsController extends Controller
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

    public function index()
    {
        $adds=Adds::all();
        return view('admin.Adds.index',compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Adds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,Adds $advertisement )
    {
        $validator = Validator::make($request->all(),[
            'title_ar'=>'required',
            'title_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'image'=>'required',
        ]);
        if(!$validator->passes()){

            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);

        }else{
            $advertisement=new Adds();
            $advertisement->user_id=auth()->user()->id;
            $advertisement->title_ar=$request->title_ar;
            $advertisement->title_en=$request->title_en;
            $advertisement->description_ar=$request->description_ar;
            $advertisement->description_en=$request->description_en;

            if($request->has('image') and $request->image != null){
                $imageName = $request->image->store('public/advertisement');
                $advertisement->image = $imageName;
            }
            $advertisement->save();

            return response()->json([
                'status'=>200,
                'advertisement'=> $advertisement,

            ]);
        }


    }
    public function fetchAdds()
    {
        if(auth()->user()->hasRole('admin')){
            $advertisement=Adds::all();
        }else
        {
            $advertisement=Adds::where('user_id',auth()->user()->id)->get();
        }
        $AddsComp=view('components.Adds',compact('advertisement'))->render();

        return response()->json([
            'AddsComp'=>$AddsComp,
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function show(Adds $adds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adds=Adds::findOrFail($id);
        return view('admin.adds.edit',compact('adds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adds $adds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adds  $adds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adds = Adds::findOrFail($id);
        $adds->delete();
        return redirect()->route('adds.index');
    }
}
