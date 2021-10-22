<div class="modal fade" id="showModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">{{awtTrans('عرض')}} {{$singleName}}</h4></div>
            <form id="showForm">
                <div class="modal-body">
                    <div class="row">
                        {{$inputs}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{awtTrans('اغلاق')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>