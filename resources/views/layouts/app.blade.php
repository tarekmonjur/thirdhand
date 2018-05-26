<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('image/favicon.png')}}" type="image/gif" sizes="16x16">

    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor.bundle.css')}}">
    !-- DataTables -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <!-- sweet alert2 -->
    <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    <style>
        .swal2-confirm.btn.btn-success{margin-right: 5px!important;}
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="70">

<!-- header -->
@include('layouts.header')
<!-- End header -->

@yield('content')

<!--Footer  -->
@include('layouts.footer')
<!-- End Footer -->

<!-- script -->
<script src="{{asset('js/vendor.bundle.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
@stack('script')
<script type="text/javascript">
    var baseUrl = '{{url('/')}}';

    function confirmAction(btn, message, url){
        swal({
            title: "Are you sure "+message+" this?",
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#218838',
            cancelButtonColor: '#c82333',
            confirmButtonText: 'Yes, '+btn+' it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            console.log(url);
            window.location.href=url;
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'your stuff is safe.',
                    'error'
                )
            }
        })
    }

    $(function () {
        $('#example1').DataTable();
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });
</script>

</body>
</html>