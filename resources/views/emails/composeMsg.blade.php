@extends('layouts.default')
@section('title')
Compose Mail
@endsection('title')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card-box">
                                    <!-- Left sidebar -->
       <div class="inbox-leftbar"> 
       <a href="email-inbox.html" class="btn btn-danger btn-block waves-effect waves-light">Inbox</a>

                                        <div class="mail-list mt-4">
                                            <a href="#" class="list-group-item border-0 text-danger font-weight-bold"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i>Inbox<span class="badge badge-danger float-right ml-2 mt-1">8</span></a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft<span class="badge badge-info float-right ml-2 mt-1">32</span></a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->

                                    <div class="inbox-rightbar">
                                        <div class="mt-1">
                                            <form method="get" action="{{URL::to('mail')}}">
                                                <div class="form-group">
                                                    <select class="form-control" name="to">
                                                      <option value="">Select Receiver</option>
                                                      <option value="all">All Members</option>
                                                      @foreach($depts as $depts)
                                                      <option value="{{$depts->id}}">{{$depts->dept}}</option>
                                                      @endforeach
                                                    </select>
                                @if ($errors->has('to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                                                </div>
        
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" placeholder="Compose message" name="message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div class="text-right">
                                                        <!-- <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-content-save-outline"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-delete"></i></button> -->
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="mdi mdi-send ml-2"></i> </button>
                                                    </div>
                                                </div>
        
                                            </form>
                                        </div> <!-- end card-->
            
                                    </div> 
                                    <!-- end inbox-rightbar-->

                                    <div class="clearfix"></div>
                                </div>

                            </div> <!-- end Col -->

                        </div>
@endsection('content')
