<!-- fixed-Loader --><!doctype html>
<html class="no-js" lang="ar" dir="rtl">

    <head>
        <meta charset="utf-8">
        <title>{{__('site.login')}}</title>
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
        <link rel="stylesheet" href="{{asset('admin/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.4/date-1.1.1/fc-4.0.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
    
        @yield('css')
    </head>
    
    <body>
    
    <section class="form_login" id="form_login">
        <div class="container">
            <div class="col-12 text-center">
                <img class="logo_form" src="{{asset('storage/images/settings/logo.png')}}" alt="">
            </div>
            <div class="col-xl-7 col-lg-8 col-md-9 col-12 m-auto">
                <form  class="form-horizontal"  action="{{route('admin.login')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="name_form_head">
                                <h2>{{__('site.hi')}} {{$data['name_'.lang()]}}</h2>
                            </div>
                        </div>
    
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">{{__('site.email')}}</label>
                                <input class="form-control" placeholder="{{__('site.email')}}" name="email" type="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">{{__('site.password')}}</label>
                                <input class="form-control " name="password" placeholder="{{__('site.password')}}" type="password">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-main w-100 submit_button">{{__('site.login')}} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>

@include('admin.layout.partial.footer')
<script>
    $(document).ready(function(){
        $(document).on('submit','.form-horizontal',function(e){
            e.preventDefault();
            var url = $(this).attr('action')
            $.ajax({
                url: url,
                method: 'post',
                data: new FormData($(this)[0]),
                dataType:'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $(".submit_button").html('<i class="fas fa-spinner"></i>').attr('disables',true);
                },
                success: function(response){
                    $(".text-danger").remove()
                    $('.form-horizontal input').removeClass('border-danger')
                    if (response.status == 'login'){
                        toastr.success(response.message)
                        setTimeout(function(){
                            window.location.replace(response.url)
                        }, 1000);
                    }else{
                        $(".submit_button").html(`<i class="ft-unlock"></i> {{awtTrans('تسجيل دخول')}}`).attr('disable',false)
                        $('.form-horizontal input[name=password]').addClass('border-danger')
                        $('.form-horizontal input[name=password').after(`<span class="mt-5 text-danger">${response.message}</span>`);
                    }
                },
                error: function (xhr) {
                    $(".submit_button").html("{{awtTrans('تسجيل دخول')}}").attr('disable',false)
                    $(".text-danger").remove()
                    $('.form-horizontal input').removeClass('border-danger')

                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.form-horizontal input[name='+key+']').addClass('border-danger')
                        $('.form-horizontal input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                    });
                },
            });

        });
    });
</script>
