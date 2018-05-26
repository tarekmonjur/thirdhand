@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Device SMS Log History</div>
                <div class="panel-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>
                                <th>Device Number</th>
                                <th>Mobile Number</th>
                                <th>Message</th>
                                <th>Response</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($sms_logs as $sms_log)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>@if($sms_log->user) {{$sms_log->user->name}} @else ---- @endif</td>
                                <td>{{$sms_log->device_no}}</td>
                                <td>{{$sms_log->mobile_number}}</td>
                                <td>{{$sms_log->body}}</td>
                                <td>{{$sms_log->response}}</td>
                                <td>{{$sms_log->status}}</td>
                                <td>{{$sms_log->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
