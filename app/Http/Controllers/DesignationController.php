<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;


class DesignationController extends Controller
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
        $user_designation = Designation::all()->toArray();
        return view('user.viewDesignation', compact('user_designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/user/addDesignation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Designation::where('designation_code', '=', $request->get('designation_code'))->exists() || Designation::where('designation_name', '=', $request->get('designation_name'))->exists())
        {
            return redirect('user_designation')->with('danger','Designation code or name already exists!');
        }
        else
        {
            $user_designation = new Designation([
                'designation_code'           =>  $request->get('designation_code'),
                'designation_name'           =>  $request->get('designation_name'),
                'designation_description'    =>  $request->get('designation_description')
            ]);
            $user_designation->save();
            return redirect('user_designation')->with('success','New Designation Added');
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
        $user_designation = Designation::find($id);
        return view('user/editDesignation',compact('user_designation','id'));
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
        $user_designation = Designation::find($id);
        //request only the fields that are to be edited/updated
        $user_designation->designation_name = $request->get('designation_name');
        $user_designation->designation_description = $request->get('designation_description');
        $user_designation->save();
        return redirect('user_designation')->with('success','Designation Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_designation = Designation::find($id);
        $user_designation->delete();
        return redirect('user_designation')->with('success','Designation Deleted');
    }
}
