@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("رسالة")}}' deletebutton="true" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                    </th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('الهاتف')}}</th>
                    <th>{{awtTrans('الايميل')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-phone    = '{{$row->phone}}'
                                            data-email    = '{{$row->email}}'
                                            data-name     = '{{$row->name}}'
                                            data-message  = '{{$row->message}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.intromessages.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("رسالة")}}' >
        <x-slot name="inputs">
            <div class="col-sm-4"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاسم')}} 
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4"> 
                <div class="form-group">
                    <h5>{{awtTrans('لهاتف')}} 
                    </h5>
                    <div class="controls">
                        <input type="text" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4"> 
                <div class="form-group">
                    <h5>{{awtTrans('email')}} 
                    </h5>
                    <div class="controls">
                        <input type="text" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('email')}} 
                    </h5>
                    <div class="controls">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" ></textarea>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.intromessages.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >