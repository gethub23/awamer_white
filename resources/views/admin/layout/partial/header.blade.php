<!doctype html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>@yield('title',isset(\Request::route()->getAction()['title']) ? awtTrans(\Request::route()->getAction()['title']) : '')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('station/assets/css/bootstrap.rtl.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('admin/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.4/date-1.1.1/fc-4.0.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/extensions/toastr.css')}}"> --}}

    @yield('css')
</head>

<body>