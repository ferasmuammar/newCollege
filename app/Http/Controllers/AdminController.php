<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\Usertow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('country')->with('usertow')->orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countreis = Country::all();
        $admins = Admin::all();
        return response()->view('cms.admin.create', compact('countreis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required|string|min:3|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'mobile' => 'required|string',
            'image' => 'image|mimes:jpg,png,gif,pdf',
        ]);
        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $image = $request->file('image');
            $imageName = time() . 'image' . $image->getClientOriginalExtension();
            $image->move('storage/images/admin', $imageName);
            $admins->image = $imageName;
            $isSaved = $admins->save();

            if ($isSaved) {
                $usertows = new Usertow();
                $usertows->first_name = $request->get('first_name');
                $usertows->last_name = $request->get('last_name');
                $usertows->mobile = $request->get('mobile');
                $usertows->dateOfBirth = $request->get('dateOfBirth');
                $usertows->gender = $request->get('gender');
                $usertows->status = $request->get('status');
                $usertows->country_id = $request->get('country_id');
                $usertows->actor()->associate($admins);
                $isSaved = $usertows->save();
                return response()->json(['icon' => 'success', 'title' => 'the store is success'], $isSaved ? 201 : 400);
            } else {
                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], $validator ? 201 : 400);
            }
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
        $admins = Admin::findOrFail($id);
        $countreis = Country::all();
        return response()->view('cms.admin.edit', compact('admins', 'countreis'));
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
        $validator = Validator($request->all(), [
            'first_name' => 'required|string|min:3|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'mobile' => 'required|string',
            'image' => 'image|mimes:jpg,png,gif,pdf',
        ]);
        if (!$validator->fails()) {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            if(request()->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . 'image' . $image->getClientOriginalExtension();
            $image->move('storage/images/admin', $imageName);
            $admins->image = $imageName;
           }
            $isSaved = $admins->save();


            if ($isSaved) {
                $usertows = $admins->usertow;
                $usertows->first_name = $request->get('first_name');
                $usertows->last_name = $request->get('last_name');
                $usertows->mobile = $request->get('mobile');
                $usertows->dateOfBirth = $request->get('dateOfBirth');
                $usertows->gender = $request->get('gender');
                $usertows->status = $request->get('status');
                $usertows->country_id = $request->get('country_id');
                $usertows->actor()->associate($admins);
                $isSaved = $usertows->save();
                if ($isSaved) {
                    return ['redirect' => route('admins.index')];
                    return response()->json(['icon' => 'success', 'title' => 'the update is success'], $isSaved ? 201 : 400);
                } else {
                    return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], $validator ? 201 : 400);
                }
            }
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
        $admins = Admin::destroy($id);
        return response()->json(['message' => $admins ? "the delte is sucsses" : "the delte is fail"], $admins ? 200 : 400);
    }
}
