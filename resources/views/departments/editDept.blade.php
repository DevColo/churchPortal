@extends('layouts.default')
@section('title')
Edit Department
@endsection('title')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{$updateUrl}}" method="post">
                                            	{{csrf_field()}}
                                                @foreach($Data as $key => $Data)
                                                <div class="form-group">
                                                    <label>Department Name</label>
                                                    <input type="text" class="form-control" name="dept" value="{{$Data->dept}}">
                                                     @if ($errors->has('dept'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dept') }}</strong>
                                    </span>
                                @endif
                                                </div>
        
                                        </div> <!-- end col -->

                                        <div class="col-md-6 mt-4 mt-md-0">
                                               <div class="form-group">
                                                    <label>Department Code</label>
                                                    <input type="text" class="form-control" name="dept_code" placeholder="{{$Data->dept_code}}"  value="{{$Data->dept_code}}">
                                                </div>
        <button type="submit" class="btn  waves-effect waves-light width-md" style="background-color: #123806; border-color: #123806;">Save Change</button>
                                            </form>
                                            @endforeach
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>

@endsection('content')
