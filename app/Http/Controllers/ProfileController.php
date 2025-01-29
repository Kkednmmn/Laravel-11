<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\RredirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\view\view;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate(5);

        return view('profiles.index' ,compact ('profiles'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'image'=> 'required|image|mimes:png,jpeg,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). "." .$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image']= "$profileImage";
            {
            profile::create($input);
            return redirect()->route('profiles.index')->with('success','Profile created successfully.');
            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
            $input = $request->all();
            if($image = $request->file('image')){
                $destinationPath = 'images/';
                $profileImage = date('YmdHis')."." .$image->getCliteOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $input['Image'] = "$profileImage";
            }else{
                unset($input['image']);
            }
                $profile->update($input);
                return redirect()->route('profiles.index')->with('success','Profile updated successfuiiy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')
            ->with('success','Profile deleted successfully');
    }
}
