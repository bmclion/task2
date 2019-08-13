@extends('layouts.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Department
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
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
                    <a href="{{route('user_department.create')}}" class="btn btn-success">Add Department</a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            @foreach($user_department as $row)
                                <tbody>
                                <tr>
                                    <td>{{ $row['id']   }}</td>
                                    <td>{{ $row['department_code'] }}</td>
                                    <td>{{ $row['department_name'] }}</td>
                                    <td>{{ $row['department_description'] }}</td>
                                    <td>
                                        <a href="{{action('DepartmentController@edit', $row['id'])}}">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{action('DepartmentController@destroy', $row['id'])}}" class="delete_form" method="post">
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
