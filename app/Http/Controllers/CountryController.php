<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::withCount('cities')->orderBy('id','desc')->simplePaginate(5);
        return response()->view('cms.country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validator=Validator($request->all(),[
            'name' => 'required|min:3|string|max:20',
            'code' => 'required|string',
        ]);
        if(!$validator->fails()){
            $countries=new Country;
            $countries->name=$request->get('name');
            $countries->code=$request->get('code');
            $isSave=$countries->save();
            return response()->json(['message'=>$isSave ? "add is success" : "add is fail"]);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()]);
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
        $countries=Country::findOrfail($id);
        return response()->view('cms.country.edit', compact('countries'));
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
        $countries=Country::findOrfail($id);
        $countries->name=$request->get('name');
        $countries->code=$request->get('code');
        $isSaved=$countries->save();
        return response()->json(['message'=>$isSaved?"updete is success":"update is fail"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries=Country::destroy($id);
        return response()->json(['message'=> $countries ? "Deleted is successfully" : "Deleted is faile"]);
    }
}
