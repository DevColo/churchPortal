@extends('layouts.default')
<style type="text/css">
    table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    line-height: 25px;
    background: #fff;
    text-align: center;
}
    th{
            border-bottom-width: 2px;
    border: 1px solid #dddddd;
    padding: 2px;
    line-height: 1.428571;
    text-align: center;
    font-size: 14px;
    font-family: system-ui;
    font-weight: 700;
    background: #123806;
    color: #fff;
    }
    td {
    border: 1px solid #dddddd;
    padding: 6px;
    line-height: 1.428571;
    text-align: center;
    font-family: sans-serif;
    color: #525252;
    font-size: 14px;
}
</style>
@section('content')
<div class="table-responsive">
    <a href="{{ route('deptPDF') }}" class="btn btn-primary" style="float:right;margin-bottom: 5px;">Print <i class="fa fa-print"></i></a>
	<table class="table table-bordered" id="users-table" width="100%">
       <thead>
            <tr>
        <th>ID</th>
        <th>Department</th>
        <th>Department Code</th>
      </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
            @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
          <td>{{$row->dept}}</td>
          <td>{{$row->dept_code}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('content')