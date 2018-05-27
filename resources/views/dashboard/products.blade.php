@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product name</th>
                                <th>Product price</th>
                                <th>Product image</th>
                                <th>Product description</th>
                                <th>Product feature</th>
                                <th>Product faq</th>
                                <th>Product work</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td><img src="{{asset('uploads/products/'.$product->product_image)}}" alt=""></td>
                                    <td>{{$product->product_description}}</td>
                                    <td>{!! $product->product_feature !!}</td>
                                    <td>{!! $product->product_faq !!}</td>
                                    <td>{!! $product->product_work !!}</td>
                                    <td>
                                        <div>
                                            <a href="{{url('product-edit/'.$product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" onclick="confirmAction('Delete', 'Delete', '{{url('product-delete/'.$product->id)}}')" class="btn btn-sm btn-danger">Delete</a>
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
