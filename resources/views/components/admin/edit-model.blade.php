<div class="modal fade" id="editModel">
    <div class="modal-dialog modal-lg">
       <div class="modal-content position-relative">
            <div class="edit-loader loader loadPage d-none">
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
            <div class="modal-header"><h4 class="modal-title">{{awtTrans('تعديل')}} {{$singleName}}</h4></div>
            <form action=""  novalidate  id="editForm" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="text" name="id" id="id"  hidden>
                <div class="modal-body">
                    <div class="row">
                        {{$inputs}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">{{awtTrans('حفظ')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{awtTrans('اغلاق')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>