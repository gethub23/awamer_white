
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
        <x-admin.table  addbutton="{{route('admin.clients.create')}}" deletebutton="{{route('admin.clients.deleteAll')}}">
            <x-slot name="tableHead">
                <th>
                    <label class="container-checkbox">
                        <input type="checkbox" value="value1" name="name1" id="checkedAll">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th>{{awtTrans('الصورة')}}</th>
                <th>{{awtTrans('الاسم')}}</th>
                <th>{{awtTrans('البريد الالكتروني')}}</th>
                <th>{{awtTrans('رقم الهاتف')}}</th>
                <th>{{awtTrans('الحالة')}}</th>
                <th>{{awtTrans('التحكم')}}</th>
            </x-slot>
            <x-slot name="tableBody">
                @foreach($rows as $row)
                    <tr class="delete_row">
                        <td class="text-center">
                            <label class="container-checkbox">
                                <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td><img src="{{asset($row->avatar)}}" width="50px" height="50px" alt=""></td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>
                            @if($row->block)
                                <span class="btn btn-sm round btn-outline-danger"> 
                                    {{awtTrans('محظور')}}  <i class="la la-close font-medium-2"></i>
                                </span>
                            @else
                                    <span class="btn btn-sm round btn-outline-success"> 
                                    {{awtTrans('نشط')}}  <i class="la la-check font-medium-2"></i>
                                </span>
                            @endif
                        </td>
                        <td class="product-action">
                            <span class="action-edit text-primary"><a href="{{route('admin.clients.edit' , ['id' => $row->id])}}"><i class="feather icon-edit"></i></a></span>
                            <span class="delete-row text-danger" data-url="{{url('admin/clients/'.$row->id)}}"><i class="feather icon-trash"></i></span>
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