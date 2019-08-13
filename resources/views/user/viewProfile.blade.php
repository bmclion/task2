@extends('layouts.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        User Profile
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                    <br/>
                    <div>
                        <p>


                            <label>ID :</label>
                            <span>{{ $profile->user_id }}</span><br/>

                            <label>Name :</label>
                            <span>{{ $profile->name }}</span><br/>

                            <label>Email :</label>
                            <span>{{ $profile->email }}</span><br/>

                            <label>Mobile Number :</label>
                            <span>{{ $profile->mobile_number }}</span><br/>

                            <label>Date of Birth :</label>
                            <span>{{ $profile->date_of_birth }}</span><br/>

                            <label>Department :</label>
                            <span>{{ $profile->department_name }}</span><br/>

                            <label>Designation :</label>
                            <span>{{ $profile->designation_name }}</span><br/><br/>
                            <a href="{{action('ProfileController@edit', $profile->id)}}">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
