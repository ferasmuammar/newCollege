<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\Usertow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $authors= Author::with('country')->with('usertow')->orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countreis=Country::all();
        return response()->view('cms.author.create',compact('countreis'));
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
            $authors = new Author();
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));

            $image = $request->file('image');
            $imageName = time() . 'image' . $image->getClientOriginalExtension();
            $image->move('storage/images/author', $imageName);
            $authors->image = $imageName;
            $isSaved = $authors->save();

            if ($isSaved) {
                $usertows = new Usertow();
                $usertows->first_name = $request->get('first_name');
                $usertows->last_name = $request->get('last_name');
                $usertows->mobile = $request->get('mobile');
                $usertows->dateOfBirth = $request->get('dateOfBirth');
                $usertows->gender = $request->get('gender');
                $usertows->status = $request->get('status');
                $usertows->country_id = $request->get('country_id');
                $usertows->actor()->associate($authors);
                $isSaved = $usertows->save();
                return response()->json(['message' => $isSaved ? "the store is sucsses" : "the store is fail"], $isSaved ? 200 : 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
        $authors=Author::findOrFail($id);
        $countreis = Country::all();
        return response()->view('cms.author.edit',compact('authors','countreis'));

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
            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));

            // $image = $request->file('image');
            // $imageName = time() . 'image' . $image->getClientOriginalExtension();
            // $image->move('storage/images/admin', $imageName);
            // $authors->image = $imageName;
            $isSaved = $authors->save();

            if ($isSaved) {
                $usertows =$authors->usertow;
                $usertows->first_name = $request->get('first_name');
                $usertows->last_name = $request->get('last_name');
                $usertows->mobile = $request->get('mobile');
                $usertows->dateOfBirth = $request->get('dateOfBirth');
                $usertows->gender = $request->get('gender');
                $usertows->status = $request->get('status');
                $usertows->country_id = $request->get('country_id');
                $usertows->actor()->associate($authors);
                $isSaved = $usertows->save();
                return response()->json(['message' => $isSaved ? "the update is sucsses" : "the update is fail"], $isSaved ? 200 : 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
        $authors=Author::findOrFail($id);
        return response()->json(['message' => $authors ? "the dostroy is sucsses" : "the dostroy is fail"], $authors? 200 : 400);

    }
}
