<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*using models*/
use DB;
use App\User;
use App\Profile;
use App\Department;
use App\Designation;

use App\Http\Requests;

class ProfileController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/userProfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_profile = new Profile([
            'user_id'           =>  $request->get('user_id'),
            'email'             =>  $request->get('email'),
            'mobile_number'     =>  $request->get('mobile_number'),
            'date_of_birth'     =>  $request->get('date_of_birth'),
            'user_department'   =>  $request->get('user_department'),
            'user_designation'  =>  $request->get('user_designation')
        ]);

        $user_profile->save();
        return redirect('user/viewUser')->with('success','Profile Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* storing user and user profile into a single variable $data
        *  this way you can get multiple values from table into a single variable
        */
        $data['user'] = User::find($id);

        $data['profile'] = DB::table('profile')
            ->join('users', 'profile.user_id', '=', 'users.id')
            ->leftjoin('department', 'profile.user_department', '=', 'department.id')
            ->leftjoin('designation', 'profile.user_designation', '=', 'designation.id')
            ->select(
                'profile.id'
                , 'profile.user_id'
                , 'users.name'
                , 'profile.profile_pic'
                , 'profile.email'
                , 'profile.mobile_number'
                , 'profile.date_of_birth'
                , 'department.department_name'
                , 'designation.designation_name'
            )
            ->where('users.id', '=', $id)
            ->first();

        return view('user/viewProfile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user']               = User::find($id);
        $data['userDepartment']    = Department::all();
        $data['userDesignation']   = Designation::all();
        $data['user_profile']       = Profile::find($id);
        return view('user/editUserProfile', $data);
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
        $user_profile = Profile::where('id', '=', $id)->first();

        if($request->hasFile('profile_pic'))
        {
            $file = request()->profile_pic;

            $name = $file->getClientOriginalName();
//            $extension = $file->getClientOriginalExtension();
            request()->profile_pic->storeAs('upload/profile',$name);
            $destination = 'images/upload/profile/' ;

            $file->move($destination, $name);

            $user_profile->profile_pic = $destination . $name;
            $user_profile->save();

            /*validation on profile_pic value*/
      /*      $this->validate($request, [
                'profile_pic'  => 'image|mimes:jpeg,png,gif|max:2048'
            ]);*/


/*
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $destination = 'images/upload/profile/' . $user_profile->id . "/";

            $file->move($destination, $name);

            $user_profile->profile_pic = $destination . $name;*/

            /*storing image name using user profile id, _avatar name, time along with its extension */
        /*  /*  $imageName = $user_profile->id.'_avatar'.time().'.'.request()->profile_pic->getClientOriginalExtension();*/
            /*defining file path, its stored in storage-app-public-upload-profiles*/
          /*  $request->profile_pic->storeAs('upload/profile',$imageName);*/
           /* $user_profile->profile_pic = '../images/upload/profile/'.$imageName;*/

            /*validation on profile_pic value*/




        }


        $user_profile->mobile_number = $request->get('mobile_number');
        $user_profile->date_of_birth = $request->get('date_of_birth');
        $user_profile->user_designation = $request->get('user_designation');
        $user_profile->user_department = $request->get('user_department');
        $user_profile->save();
        return redirect('user/viewUser')->with('success','Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
