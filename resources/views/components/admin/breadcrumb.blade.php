@section('breadcrumb')
<!-- brecamb -->
    <div class="content-header row mb-2">
        <!-- brecamb left div -->
        <div class="content-header-left col-md-6 col-12" >
            {{-- <h3 class="content-header-title">{{\Request::route()->getAction()['title']}}</h3> --}}
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">{{awtTrans('الرئيسية')}}</a></li>
                    <li class="breadcrumb-item active">{{awtTrans(\Request::route()->getAction()['title'])}}</li>
                </ol>
                </div>
            </div>
        </div>
        <!-- brecamb left div -->
        <!-- brecamb buttons div -->
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    
                    @if ($addbutton == 'true')
                        <button data-toggle="modal" data-target="#addModel" class="btn btn-primary btn-sm mr-1 box-shadow-2"><i class="ft-plus white"></i>  {{awtTrans('اضافة')}}  {{isset($singleName) ? $singleName : ''}}</button>
                    @endif
                    @if ($deletebutton == 'true')
                        <button class="btn btn-danger  btn-sm mr-1 box-shadow-2 delete_all_button" data-toggle="modal" data-target="#delete-all-model" ><i class="ft-trash white"></i>  {{awtTrans('حذف المحدد')}} </button>
                    @endif
                    {{isset($moreButtons) ? $moreButtons  : ''}}
                    <button class="btn btn-warning btn-sm mr-1 box-shadow-2" onclick="location.reload()"><i class="ft-rotate-cw white"></i>  {{awtTrans('تحديث الصفحه')}}</button>
                </div>
            </div>
        </div>
        <!-- brecamb buttons div -->
    </div>
<!-- brecamb -->
@endsection
