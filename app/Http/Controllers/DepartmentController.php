<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
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
        $user_department = Department::all()->toArray();
        return view('user.viewDepartment', compact('user_department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/user/addDepartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Department::where('department_code', '=', $request->get('department_code'))->exists() || Department::where('department_name', '=', $request->get('department_name'))->exists())
        {
            return redirect('user_department')->with('danger','Department code or name already exists!');
        }
        else
        {
            $user_department = new Department([
                'department_code'           =>  $request->get('department_code'),
                'department_name'           =>  $request->get('department_name'),
                'department_description'    =>  $request->get('department_description')
            ]);
            $user_department->save();
            return redirect('user_department')->with('success','New Department Added');
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
        $user_department = Department::find($id);
        return view('user/editDepartment',compact('user_department','id'));
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
        $user_department = Department::find($id);
        //request only the fields that are to be edited/updated
        $user_department->department_name = $request->get('department_name');
        $user_department->department_description = $request->get('department_description');
        $user_department->save();
        return redirect('user_department')->with('success','Department Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_department = Department::find($id);
        $user_department->delete();
        return redirect('user_department')->with('success','Department Deleted');
    }
}
