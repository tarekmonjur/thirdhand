@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add your device</div>

                <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{ url('device-store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('device_number') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Device Number <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="device_number" type="text" class="form-control" name="device_number" value="{{ old('device_number') }}" required>

                                @if ($errors->has('device_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('device_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no_1') ? ' has-error' : '' }}">
                            <label for="mobile_no_1" class="col-md-4 control-label">Sms Send Mobile Number 1 <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="mobile_no_1" type="text" class="form-control" name="mobile_no_1" value="{{ (old('mobile_no_1'))?:Auth::user()->mobile_no}}" required>

                                @if ($errors->has('mobile_no_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('mobile_no_2') ? ' has-error' : '' }}">
                            <label for="mobile_no_2" class="col-md-4 control-label">Sms Send Mobile Number 2</label>

                            <div class="col-md-6">
                                <input id="mobile_no_2" type="text" class="form-control" name="mobile_no_2" value="{{ (old('mobile_no_2'))?:Auth::user()->mobile_no}}">

                                @if ($errors->has('mobile_no_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Device
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
