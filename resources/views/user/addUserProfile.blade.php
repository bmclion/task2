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
                    <h2>ADD Profile</h2>
                    <!--  $id we will get from userProfilecontroller edit method  -->
                    <!-- sending form data userProfilecontroller -->
                    <form method = "post" action="{{url('userProfile')}}" enctype="multipart/form-data">
                        {{csrf_field()}}



                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" name="user_id" value = "{{$user->id}}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value = "{{$user->email}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="mobile_number" value = ""/>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value = "" />
                        </div>
                        <div class="form-group">
                            <label>Select Department</label><br/>
                            <select class="form-control" name="user_department">
                                @foreach($list_department as $row)
                                    <option value="{{$row->id}}">{{$row->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Designation</label><br/>
                            <select class="form-control" name="user_designation">
                                @foreach($list_designation as $row)
                                    <option value="{{$row->id}}">{{$row->designation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Add Profile</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
@endsection
