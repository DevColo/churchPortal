@extends('layouts.default')
@section('title')
Edit Tithe
@endsection('title')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{$updateUrl}}" method="post">
                                            	{{csrf_field()}}
                                                @foreach($tithe as $tithe)
                                                <div class="form-group">
                                                    <label>Year of Payment</label>
                                                    <input type="text" class="form-control" name="year" value="{{$tithe->year}}">
                                                    @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Month of Payment</label>
                                        <select class="form-control" name="month">
                                            <option value="{{$tithe->month}}"">{{$tithe->month}}</option>
                                            <option value="Jan">January</option>
                                            <option value="Feb">February</option>
                                            <option value="Mar">March</option>
                                            <option value="Apr">April</option>
                                            <option value="May">May</option>
                                            <option value="Jun">June</option>
                                            <option value="Jul">July</option>
                                            <option value="Aug">August</option>
                                            <option value="Sept">September</option>
                                            <option value="Oct">October</option>
                                            <option value="Nov">November</option>
                                            <option value="Dec">December</option>
                                        </select>
                                         @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                                  </div>
                                        </div> <!-- end col -->

                                        <div class="col-md-6 mt-4 mt-md-0">
                                               <div class="form-group">
                                                    <label>Tithe Payer</label>
                                                    <select class="form-control" name="member_id">
                                                    @foreach($payer as $payer)
                                            <option value="{{$payer->id}}">{{$payer->member_id}} {{$payer->fname}} {{$payer->mname}} {{$payer->lname}}</option>
                                            @endforeach
                                            @foreach($member as $member)
                                            <option value="{{$member->id}}">{{$member->member_id}} {{$member->fname}} {{$member->mname}} {{$member->lname}}</option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('member_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_id') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control" name="amount" value="{{$tithe->amount}}">
                                                    @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
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
