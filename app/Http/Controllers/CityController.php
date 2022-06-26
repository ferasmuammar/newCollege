<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cities=City::with('country')->orderBy('id','desc')->simplePaginate(5);
       return response()->view('cms.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countreis=Country::all();
        return response()->view('cms.city.create',compact('countreis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string',

        ]);
        if(!$validator->fails()){
            $cities=new City();
            $cities->name = $request->get('name');
            $cities->country_id=$request->get('country_id');
            $isSave=$cities->save();
            return response()->json(['icon'=>'success', 'title'=>'the store is success'],$isSave? 201 :400);

        //     return response()->json(['message'=>$isSave?"the store is success" :"the stor is faile"]);
        // }else{
        //     return response()->json(['message'=>$validator->getMessageBag()->first()]);
        } else{
            return response()->json(['icon'=>'error', 'title'=> $validator->getMessageBag()->first()],$validator? 201 :400);
        }
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
        $cities=City::findOrfail($id);
        $countries=Country::all();
        return response()->view('cms.city.edit',compact('cities','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string',

        ]);
        if(!$validator->fails()){
            $cities=City::findOrfail($id);
            $cities->name = $request->get('name');
            $cities->country_id=$request->get('country_id');
            $isSave=$cities->save();
            if($isSave){
                return['redirect'=>route('cities.index')];
                return response()->json(['icon'=>'success', 'title'=>'the update is success'],$isSave? 201 :400);
            }else{
                return response()->json(['icon'=>'error', 'title'=> $validator->getMessageBag()->first()],$validator? 201 :400);

            }

        //     return response()->json(['message'=>$isSave?"the upted is success" :"the update is faile"]);
        // }else{
        //     return response()->json(['message'=>$validator->getMessageBag()->first()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities=City::destroy($id);
        return response()->json(['message'=>$cities?"the delete is succses" :"the delete is faile"]);

    }
}
