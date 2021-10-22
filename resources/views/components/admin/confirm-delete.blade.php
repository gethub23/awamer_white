<div class="modal fade" id="delete-model">
    <div class="modal-dialog modal-md">
        <div class="modal-content position-relative">
            <div class="add-loader loader delete-loader loadPage d-none">
                <div class="loader-wrapper">
                    <div class="loader-container">
                        <div class="folding-cube loader-blue-grey">
                            <div class="cube1 cube"></div>
                            <div class="cube2 cube"></div>
                            <div class="cube4 cube"></div>
                            <div class="cube3 cube"></div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="" method="post" id="confirm-delete-form">
                @csrf
                @method('delete')
                <div class="modal-header"><h6 class="modal-title">{{awtTrans('تأكيد الحذف')}}</h6></div>
                <div class="modal-body p-5"><h5 class="text-center text-danger">{{awtTrans('هل انت متاكد من عملية الحذف')}}</h5></div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-danger">{{awtTrans('حذف')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{awtTrans('الغاء')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>


