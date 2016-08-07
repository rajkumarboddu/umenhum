@extends('layouts.admin-layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>Dashboard</h2>
        </div>
        <div class="clearfix"></div>
        <div class="counter-container">
            <div class="counter-head">
                Total users
            </div>
            <div class="counter-circle counter">
                {{\App\Http\Controllers\TreePathController::getDescendantsCount(Auth::guard('admins')->user()->user_id)}}
            </div>
        </div>
        <div class="counter-container">
            <div class="counter-head">
                # Referred by me
            </div>
            <div class="counter-circle counter">
                {{\App\Http\Controllers\TreePathController::getChildCount(Auth::guard('admins')->user()->user_id)}}
            </div>
        </div>
    </div>
@endsection

@section('footer_links')
    <script src="{{url('js/base.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script>
        $(document).ready(function(){
            $('.counter').counterUp({
                delay: 5,
                time: 500
            });
        });
    </script>
@endsection