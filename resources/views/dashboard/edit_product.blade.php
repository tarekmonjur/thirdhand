@extends('layouts.app')

@section('content')

    @push('script')
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount contextmenu colorpicker textpattern code help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '{{asset('css/vendor.bundle.css')}}',
                '{{asset('css/style.css')}}'
            ]
        });
    </script>
    @endpush

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Product</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ url('product-edit/'.$product->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                        <label for="product_name" class="control-label">Product Name <span class="text-danger">*</span></label>
                                        <input id="product_name" type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                                        @if ($errors->has('product_name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('product_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                                        <label for="product_price" class="control-label">Product Price <span class="text-danger">*</span></label>
                                        <input id="product_price" type="text" class="form-control" name="product_price" value="{{ $product->product_price }}" required>
                                        @if ($errors->has('product_price'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('product_price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('product_description') ? ' has-error' : '' }}">
                                <label for="product_description" class=" control-label">Product Description</label>
                                <textarea id="product_description" type="text" class="form-control" name="product_description">{{ $product->product_description }}</textarea>
                                @if ($errors->has('product_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('product_feature') ? ' has-error' : '' }}">
                                <label for="product_feature" class=" control-label">Product Feature</label>
                                <textarea id="product_feature" type="text" class="form-control" name="product_feature">{{ $product->product_feature }}</textarea>
                                @if ($errors->has('product_feature'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_feature') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('product_faq') ? ' has-error' : '' }}">
                                <label for="product_faq" class=" control-label">Product FAQ</label>
                                <textarea id="product_faq" type="text" class="form-control" name="product_faq">{{ $product->product_faq }}</textarea>
                                @if ($errors->has('product_faq'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_faq') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('product_work') ? ' has-error' : '' }}">
                                <label for="product_work" class=" control-label">Product Work</label>
                                <textarea id="product_work" type="text" class="form-control" name="product_work">{{ $product->product_work }}</textarea>
                                @if ($errors->has('product_work'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_work') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                                <label for="product_image" class=" control-label">Product Image</label>
                                <input id="product_image" type="file" class="form-control" name="product_image" value="{{ old('product_image') }}">
                                @if ($errors->has('product_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Product
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
