@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("مشرف")}}' addbutton="false" deletebutton="false" >

 </x-admin.breadcrumb >
@section('content')

    <section class="content">
        <div class="card page-body">
            <form action="{{route('admin.admins.update_profile',$admin->id)}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="text-center">
                                <label>{{awtTrans('الصوره الشخصيه')}} </label>
                                <div class="dropBox">
                                    <div class="textCenter">
                                        <div class="imagesUploadBlock">
                                            <label class="uploadImg">
                                                <span><i class="la la-image"></i></span>
                                                <input type="file" accept="image/*" name="logo" class="imageUploader">
                                            </label>
                                            <div class="uploadedBlock">
                                            <img src="{{auth()->guard('admin')->user()->avatar}}">
                                            <button class="close">
                                                <i class="la la-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awtTrans('الاسم')}}</label>
                                <input type="text" name="name" class="form-control" value="{{$admin->name}}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awtTrans('رقم الهاتف')}}</label>
                                <input type="text" name="phone" class="form-control" value="{{$admin->phone}}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awTTrans('البريد الالكتروني')}} </label>
                                <input type="email" name="email" class="form-control" value="{{$admin->email}}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{awtTrans('الرقم السري')}} </label>
                                <input type="password" name="password" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">{{awtTrans('حفظ')}}</button>
                </div>
            </form>
        </div>
    </section>


@endsection
