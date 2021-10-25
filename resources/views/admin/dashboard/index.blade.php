@extends('admin.layout.master')
@section('content')
        <div class="row">
            @foreach($menus as $key => $menu)
                @php $color = $colores[array_rand($colores)] @endphp
                <a href="{{$menu['url']}}" class="col-xl-2 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-{{$color}} p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather {!! $menu['icon'] !!} text-{!! $color !!} font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{$menu['count']}}</h2>
                                <p class="mb-0 line-ellipsis" style="color: #6e6a6a">{{$menu['name']}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">{{__('site.users')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body py-0">
                            <div id="customer-chart"></div>
                        </div>
                        <ul class="list-group list-group-flush customer-info">
                            <li class="list-group-item d-flex justify-content-between ">
                                <div class="series-info">
                                    <i class="fa fa-circle font-small-3 text-primary"></i>
                                    <span class="text-bold-600">{{__('site.active_users')}}</span>
                                </div>
                                <div class="product-result">
                                    <span>{{$activeUsers}}</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between ">
                                <div class="series-info">
                                    <i class="fa fa-circle font-small-3 text-warning"></i>
                                    <span class="text-bold-600">{{__('site.not_active_users')}}</span>
                                </div>
                                <div class="product-result">
                                    <span>{{$notActiveUsers}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">{{__('site.users')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                    <h1 class="font-large-2 text-bold-700 mt-2 mb-0">{{$activeUsers + $notActiveUsers}}</h1>
                                    <small>{{__('site.users')}}</small>
                                </div>
                                <div class="col-sm-10 col-12 d-flex justify-content-center">
                                    <div id="support-tracker-chart"></div>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between">
                                <div class="text-center">
                                    <p class="mb-50">{{__('site.active_users')}}</p>
                                    <span class="font-large-1">{{$activeUsers}}</span>
                                </div>
                                <div class="text-center">
                                    <p class="mb-50">{{__('site.not_active_users')}}</p>
                                    <span class="font-large-1">{{$notActiveUsers}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
@section('js')
    <script src="{{asset('admin/charts_functions.js')}}"></script>
    <script>
        new ApexCharts(
            document.querySelector("#support-tracker-chart"),
            radialBarFunction(['#EA5455'] , ['#7367F0'] , ['Active Users'] , ['{{($activeUsers * 100) / ($activeUsers + $notActiveUsers)}}'])
        ).render();


       new ApexCharts(
            document.querySelector("#customer-chart"),
            pieChartFunction(['active', 'not active'] , ['{{$activeUsers}}', '{{$notActiveUsers}}'] , ['#7367F0', '#FF9F43'])
        ).render();

    </script>
@endsection