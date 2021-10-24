@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="row">
            @foreach($menus as $menu)
                <a href="{{$menu['url']}}" class="col-lg-2">
                    <div class="price_card">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 text-center">
                                
                                {!! $menu['icon'] !!}
                            </div>
                            <div class="col-12">
                                <div class="title text-center">
                                    <h3 style="color: #767676">{{$menu['count']}}</h3>
                                    <span>{{$menu['name']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection