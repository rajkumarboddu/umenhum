@extends('layouts.admin-layout')

@section('title')
    Users
@endsection

@section('header_links')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>Users</h2>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <table id="users-table" class="table table-bordered table-condensed table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Referrer</th>
                        <th>Joined at</th>
                    </tr>
                </thead>
                <tbody>
                @foreach((new \App\Http\Controllers\UserController())->getUsers() as $user)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->referred_by}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer_links')
    <script src="{{url('js/base.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#users-table').DataTable({
                'order':[]
            });
        });
    </script>
@endsection