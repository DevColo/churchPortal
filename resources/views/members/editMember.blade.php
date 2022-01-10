@extends('layouts.default')
@section('title')
Edit Member
@endsection('title')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{$updateUrl}}" method="post" enctype="multipart/form-data">
                                            	{{csrf_field()}}
                                                @foreach($Data as $Data)
                                                <div class="form-group">
                                                    <label>Fisrt Name</label>
                                                    <input type="text" class="form-control" name="fname" value="{{$Data->fname}}">
                                                     @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                               <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" name="mname" value="{{$Data->mname}}">
                                                </div>
                                               <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lname" value="{{$Data->lname}}">
                                                     @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                        <select class="form-control" name="sex">
                                            <option value="{{$Data->sex}}">{{$Data->sex}}</option>
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
                                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" data-provide="datepicker" name="DOB" value="{{$Data->DOB}}">
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
                                                <img src="{{asset('images')}}/{{$Data->image}}" width="144px">
                                                    <label>Change Member Photo</label>
                                                    <input type="file" class="form-control" name="image" value="{{$Data->image}}">
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
                                                    <input type="text" class="form-control" name="address" value="{{$Data->address}}">
                                                     @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Cell</label>
                                                    <input type="text" class="form-control" name="cell" value="{{$Data->cell}}">
                                                     @if ($errors->has('cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cell') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select class="form-control" name="dept_id">
                                                    <option value="{{$dept_id}}">{{$dept}}</option>
                                                    @foreach($depts as $depts)
                                                    <option value="{{$depts->id}}">{{$depts->dept}}</option>
                                                    @endforeach
                                                    </select>
                                                    @if ($errors->has('dept'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dept') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control" name="post" value="{{$Data->post}}">
                                                    @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{$Data->email}}">
                                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                               <div class="form-group">
                                                    <label>Member ID</label>
                                                    <input type="text" class="form-control" name="member_id" value="{{$Data->member_id}}">
                                                </div>
        <button type="submit" class="btn  waves-effect waves-light width-md" style="background-color: #123806; border-color: #123806;">Save Changes</button>
        @endforeach
                                            </form>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>

@endsection('content')
