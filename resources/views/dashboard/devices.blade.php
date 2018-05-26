@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Devices</div>
                <div class="panel-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>
                                <th>Device Number</th>
                                <th>Mobile No 1</th>
                                <th>Mobile No 2</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($devices as $device)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>@if($device->user) {{$device->user->name}} @else ---- @endif</td>
                                <td>{{$device->device_no}}</td>
                                <td>{{$device->mobile_no_1}}</td>
                                <td>{{$device->mobile_no_2}}</td>
                                <td>{{$device->created_at}}</td>
                                <td>{{$device->updated_at}}</td>
                                <td>
                                    <div>
                                        <a href="{{url('device-edit/'.$device->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" onclick="confirmAction('Delete', 'Delete', '{{url('device-delete/'.$device->id)}}')" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
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
