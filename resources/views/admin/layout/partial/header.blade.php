<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title',isset(\Request::route()->getAction()['title']) ? awtTrans(\Request::route()->getAction()['title']) : '')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/storage/images/settings/logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('/storage/images/settings/logo.png')}}">


    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet"> --}}
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/ui/prism.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- data table  -->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/plugins/loaders/loaders.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/core/colors/palette-loader.css')}}">
    <!-- data table  -->
    <!-- BEGIN MODERN CSS-->
    @if (lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css-rtl/app.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/app.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/plugins/forms/switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <!-- END MODERN CSS-->

    @if (lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css-rtl/core/menu/menu-types/vertical-content-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/core/menu/menu-types/vertical-content-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css/core/colors/palette-gradient.css')}}">
@endif

<!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/extensions/toastr.css')}}">
    <!-- END Page Level CSS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/extensions/jquery.toolbar.css')}}">
    <!-- END Custom CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/style.css')}}">

</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar bl-10 b {{ \Request::route()->getName() == 'admin.show.login' ? 'p-0' : '' }}"
      data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
<!-- fixed-top nave bar-->

<!-- fixed-Loader -->

<div class="loader">
    <div class="loader-wrapper">
        <div class="loader-container">
            <div class="folding-cube loader-blue-grey">
                <div class="cube1 cube"></div>
                <div class="cube2 cube"></div>
                <div class="cube4 cube"></div>
                <div class="cube3 cube"></div>
            </div>
        </div>
    </div>
</div>














