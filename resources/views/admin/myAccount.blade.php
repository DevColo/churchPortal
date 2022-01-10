@extends('layouts.default')
@section('title')
Add Member
@endsection('title')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{route('registerMember.store')}}" method="post" enctype="multipart/form-data">
                                            	{{csrf_field()}}
                                                <div class="form-group">
                                                    <label>Fisrt Name</label>
                                                    <input type="text" class="form-control" name="fname">
                                                     @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                               <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" name="mname" placeholder="optional">
                                                </div>
                                               <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lname">
                                                     @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                        <select class="form-control" name="sex">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                         @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                   <label>Date of Birth</label>
                                                    <div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" data-provide="datepicker" name="DOB">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                    @if ($errors->has('DOB'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Member Photo</label>
                                                    <input type="file" class="form-control" name="image">
                                                     @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                
        
                                        </div> <!-- end col -->

                                        <div class="col-md-6 mt-4 mt-md-0">
                                        	<div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="address">
                                                     @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Cell</label>
                                                    <input type="number" class="form-control" name="cell">
                                                     @if ($errors->has('cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cell') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select class="form-control" name="dept_id">
                                                    <option value="">Select Department</option>
                                                    @foreach($depts as $depts)
                                                    <option value="{{$depts->id}}">{{$depts->dept}}</option>
                                                    @endforeach
                                                    </select>
                                                    @if ($errors->has('dept_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dept_id') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control" name="post">
                                                    @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email">
                                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                               <div class="form-group">
                                                    <label>Member ID</label>
                                                    <input type="number" class="form-control" name="member_id" placeholder="optional">
                                                </div>
        <button type="submit" class="btn  waves-effect waves-light width-md" style="background-color: #123806; border-color: #123806;">Register</button>
                                            </form>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>

@endsection('content')
