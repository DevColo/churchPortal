@extends('layouts.default')
@section('title')
Dashboard
@endsection('title')
@section('content')
<div class="row">
    <div class="col-xl-3">
        <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
            <div class="float-left" dir="ltr">
                <div style="display:inline;width:80px;height:80px;">
                    <p class="text-white mb-0 mt-2">Departments</p>
                </div>
            </div>
            <div class="widget-chart-one-content text-right">
                
                <h3 class="text-white">{{$dept}}</h3>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->

     <div class="col-xl-3">
        <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
            <div class="float-left" dir="ltr">
                <div style="display:inline;width:80px;height:80px;">
                    <p class="text-white mb-0 mt-2">Members</p>
                </div>
            </div>
            <div class="widget-chart-one-content text-right">
                
                <h3 class="text-white">{{$member}}</h3>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->

     <div class="col-xl-3">
        <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
            <div class="float-left" dir="ltr">
                <div style="display:inline;width:80px;height:80px;">
                    <p class="text-white mb-0 mt-2">Income</p>
                </div>
            </div>
            <div class="widget-chart-one-content text-right">
                
                <h3 class="text-white">${{$tithe}} LD</h3>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->

    <div class="col-xl-3">
        <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
            <div class="float-left" dir="ltr">
                <div style="display:inline;width:80px;height:80px;">
                    <p class="text-white mb-0 mt-2">Admin</p>
                </div>
            </div>
            <div class="widget-chart-one-content text-right">
                
            <h3 class="text-white">{{$admin}}</h3>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
<div class="row">
<div class="col-xl-12">
    <div class="card-box">
        <h4 class="header-title mb-3" align="center" style="margin-bottom: 11.5px!important;">Gender Statistics</h4>
       


        <div class="row text-center">
            <div class="col-md-3">
                <p style="line-height: 0.8 !important;">Male</p>
            </div>
            <div class="col-md-8"> 
               <div class="progress-w-percent" style="color:#01132f;">
                   <span class="progress-value">{{$male}}</span>
                   <div class="progress progress-sm">
                       <div class="progress-bar" role="progressbar" style="width: {{$malePer}}%;background:#827412;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-3">
                <p style="line-height: 0.8 !important;">Female</p>
            </div>
            <div class="col-md-8"> 
               <div class="progress-w-percent" style="color:#01132f;">
                   <span class="progress-value">{{$female}}</span>
                   <div class="progress progress-sm">
                       <div class="progress-bar" role="progressbar" style="width:{{$femalePer}}%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!-- end card-box-->
    </div>
@endsection('content')