@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="row">
            @foreach($menus as $menu)
                <a href="{{$menu['url']}}" class="col-xl-3 col-lg-6 col-12" >
                    <div class="card homeCard" >
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        {!! $menu['icon'] !!}
                                    </div>
                                    <div class="media-body text-right  float-left">
                                        <h3>{{$menu['count']}}</h3>
                                        <span>{{$menu['name']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection