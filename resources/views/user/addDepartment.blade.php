@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" >
                        Department
                    </h1>
                </div>
            </div>
            <!--displaying errors-->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!--displaying success message-->
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
        @endif

        <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <h2 style="font-size: 20px;" class="mt-2">Add Department</h2> <br/>
                    <!-- sending form request to DepartmentController -->
                    <form method = "post" action="{{url('user_department')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Code <font color="red">*</font></label>
                            <input type="text" class="form-control" name="department_code" placeholder="eg.: DEP01" required />
                        </div>
                        <div class="form-group">
                            <label>Name <font color="red">*</font></label>
                            <input type="text" class="form-control" name="department_name" required/>
                        </div>


                        <div class="form-group">
                            <label>Description <font color="red">*</font></label>
                            <textarea rows="3" class="form-control" name="department_description" required> </textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add Department</button>
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
@endsection
