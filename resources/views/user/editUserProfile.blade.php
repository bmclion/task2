@extends('layouts.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update User Profile
                    </h1>
                </div>
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <!--  $id we will get from userprofilecontroller edit method  -->
                    <!-- sending form data userProfilecontroller  -->

                    <form method="post" action="{{action('ProfileController@update', $user_profile->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />

                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="user_id" value="{{$user_profile->id}}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user_profile->email}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="mobile_number" value="{{$user_profile->mobile_number}}"/>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{$user_profile->date_of_birth}}" />
                        </div>
                        <div class="form-group">
                            <label>Select Department</label><br/>
                            <select class="form-control" name="user_department">
                                @foreach($userDepartment as $row)
                                    <option value="{{$row->id}}">{{$row->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Designation</label><br/>
                            <select class="form-control" name="user_designation">
                                @foreach($userDesignation as $row)
                                    <option value="{{$row->id}}">{{$row->designation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->

@endsection
