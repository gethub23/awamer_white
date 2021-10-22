@extends('admin.layout.master')
<x-admin.breadcrumb singleName='ss' addbutton='fasle' deletebutton="false" >
    <x-slot name="moreButtons">
        </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
        <div class="card page-body">
            <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                @method('put')
                @csrf
                <div class="container mt-2">
                    <div style="display: flex; flex-direction: row-reverse;">
                        <p style="margin-right: 10px;">{{awtTrans('تحديد الكل')}}</p>
                        <input type="checkbox" id="checkedAll">
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awtTrans('الاسم بالعربيه')}}</label>
                                <input type="text" name="name_ar" class="form-control" value="{{$role->name_ar}}" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awtTrans('الاسم بالانجليزيه')}}</label>
                                <input type="text" name="name_en" class="form-control" value="{{$role->name_en}}" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        {!! $html !!}
                    </div>
                </div>
                <div class="m-5">
                    <input type="submit" value="{{awtTrans('تعديل')}}" class="btn btn-success form-control" >
                </div>
            </form>
        </div>
    </section>

    

@endsection

@section('script')
    <script>
        $(function () {
            $('.roles-parent').change(function () {

                var childClass = '.' + $(this).attr('id');
                if (this.checked) {

                    $(childClass).prop("checked", true);

                } else {

                    $(childClass).prop("checked", false);
                }
            });
        });


        $("#checkedAll").change(function () {
            if (this.checked) {
                $("input[type=checkbox]").each(function () {
                    this.checked = true
                })
            } else {
                $("input[type=checkbox]").each(function () {
                    this.checked = false;
                })
            }
        });
    </script>
@endsection

