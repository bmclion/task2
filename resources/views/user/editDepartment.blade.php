@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update Department
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
                    <!--  $id we will get from departmentcontroller edit method  -->
                    <!-- sending form data to update method of departmentcontroller  -->
                    <form method = "post" action="{{action('DepartmentController@update', $id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="{{$user_department->id}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" name="department_code" value="{{$user_department->department_code}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Name <font color="red">*</font></label>
                            <input type="text" class="form-control" name="department_name" value="{{$user_department->department_name}}" required />
                        </div>
                        <div class="form-group">
                            <label>Description <font color="red">*</font></label>
                            <textarea class="form-control" name="department_description" rows="3" required>{{$user_department->department_description}}</textarea>

                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
@endsection
