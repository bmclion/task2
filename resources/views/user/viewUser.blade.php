@extends('layouts.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <h2>User Info</h2>
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @elseif($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit User</th>
                                <th>Profile</th>
                                <th>Delete User</th>
                            </tr>
                            </thead>
                            @foreach($users as $row)
                                <tbody>
                                <tr>
                                    <td>{{ $row['id'] }}</td>
                                    <td>{{ $row['name'] }}</td>
                                    <td>{{ $row['email'] }}</td>
                                    <td>
                                        <a href="{{action('UserController@edit', $row['id'])}}">
                                            <button type="submit" class="btn btn-primary">Edit</button></a>
                                    </td>
                                    <td>
                                        <a href="{{action('ProfileController@show', $row['id'])}}">
                                            <button type="submit" class="btn btn-info">View</button></a>
                                    </td>
                                    <td>
                                        <form action="{{action('UserController@destroy', $row['id'])}}" class="delete_form" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div><!--table-responsive-->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script>
        $(document).ready(function(){
            $('.delete_form').on('submit', function(){
                if(confirm("Are you sure you want to delete it?"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>
@endsection
