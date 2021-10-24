@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-lg-2">
                <div class="price_card">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 text-center">
                            
                            {!! $menu['icon'] !!}
                        </div>
                        <div class="col-12">
                            <div class="title text-center">
                                <h3>{{$menu['count']}}</h3>
                                <span>{{$menu['name']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection