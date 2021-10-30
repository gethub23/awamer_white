@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/pages/data-list-view.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
    
@section('content')
    {{-- table --}}
        <x-admin.table  addbutton="{{route('admin.roles.create')}}" >
            <x-slot name="tableHead">
                <th>#</th>
                <th>{{awtTrans('الاسم بالعربيه')}}</th>
                <th>{{awtTrans('الاسم بالانجليزيه')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </x-slot>
            <x-slot name="tableBody">
                @foreach($rows as $row)
                    <tr class="delete_row">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->name_ar}}</td>
                        <td>{{$row->name_en}}</td>
                        <td class="product-action">
                            <span class="action-edit text-primary"><a href="{{route('admin.roles.edit' , ['id' => $row->id])}}"><i class="feather icon-edit"></i></a></span>
                            @if(auth()->guard('admin')->user()->role->id != $row->id)
                                <span class="delete-row text-danger" data-url="{{url('admin/roles/'.$row->id)}}"><i class="feather icon-trash"></i></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.table >
    {{-- #table --}}
@endsection


@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
@endsection


