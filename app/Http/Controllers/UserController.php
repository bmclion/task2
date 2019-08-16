<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        return view('user.viewUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*checking users email in user table*/
        if(User::where('email', '=', $request->get('email'))->exists())
        {
            return redirect('user/viewUser')->with('danger','Record Exists!');
        }
        else
        {
            $user = User::create([
                'name' => $request->get('name')
                , 'email' => $request->get('email')
                , 'password' => $request->get('password')
                ,

            ]);

            /* getting values of user ID and email when a new user is created*/
            $user_profile = new Profile([
                'email' => $request->get('email'),


            ]);

            /* relationship : user hasOne profile
            *  data will be stored in userProfile table as well as User table
            */
            $user->profile()->save($user_profile);

            return redirect('user/viewUser')->with('success','Record Added');
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
        $user = User::find($id);
        return view('user/editUser',compact('user','id'));
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
        //request only the fields that are to be edited/updated
        $user       = User::find($id);
        $user->name = $request->get('name');
        $user->save();
        return redirect('user/viewUser')->with('success','Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user_profile = Profile::find($id);

        if ($user_profile)
        {
            $user_profile->delete();
        }
        if ($user)
        {
            $user->delete();
        }
        return redirect('user/viewUser')->with('success','Record Deleted');
    }
}
