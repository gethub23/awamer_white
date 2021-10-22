@extends('admin.layout.master')
<x-admin.breadcrumb singleName='عميل' addbutton='fasle' deletebutton="false" >
    <x-slot name="moreButtons">
        <a href="{{route('admin.roles.create')}}" class="btn btn-primary  btn-sm mr-1 box-shadow-2"><i class="ft-plus white"></i>  {{awtTrans('اضافة صلاحية')}} </a>
     </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
                 {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                   <th>#</th>
                    <th>{{awtTrans('الاسم بالعربيه')}}</th>
                    <th>{{awtTrans('الاسم بالانجليزيه')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($roles as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name_ar}}</td>
                            <td>{{$row->name_en}}</td>
                            <td>
                                <a href="{{route('admin.roles.edit',$row->id)}}" class="badge border-primary primary badge-border"><i class="la la-edit"></i></a>
                                @if(auth()->guard('admin')->user()->role->id != $row->id)
                                    <x-admin.delete route="{{route('admin.roles.delete' , [$row->id])}}" />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>
@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
    </x-slot >
</x-admin.scripts >
