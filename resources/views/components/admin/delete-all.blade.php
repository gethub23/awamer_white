<div class="modal fade" id="delete-all-model">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{$route}}" method="post" enctype="multipart/form-data" id="send-delete-all">
                @csrf
                <div class="modal-header"><h6 class="modal-title">{{awtTrans('تأكيد حذف المحدد ')}}</h6></div>
                <div class="modal-body p-5"><h5 class="text-center text-danger">{{awtTrans('هل انت متاكد من عملية الحذف')}}</h5></div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-danger">{{awtTrans('حذف')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{awtTrans('الغاء')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>


