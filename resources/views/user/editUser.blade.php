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
                    <form method="post" action="{{action('UserController@update', $id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />

                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" name="user_id" value="{{$user->id}}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" value = "{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly/>
                        </div>


                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->

@endsection
