
<div class="content-body">
    <!-- Data list view starts -->
    <section id="data-list-view" class="data-list-view-header">
        <div class="table_buttons">
            @isset($addbutton)
                <button type="button" class="btn bg-gradient-primary mr-1 mb-1 waves-effect waves-light" ><a style="color: white !important " href="{{$addbutton}}"><i class="feather icon-plus"></i> {{awtTrans('اضافة')}}</a> </button>
            @endisset
            @isset($deletebutton)
                    <button type="button" data-route="{{$deletebutton}}" class="btn bg-gradient-danger mr-1 mb-1 waves-effect waves-light delete_all_button"><i class="feather icon-trash"></i> {{awtTrans('حذف المحدد')}}</button>
            @endisset
            <button type="button" class="btn bg-gradient-warning mr-1 mb-1 waves-effect waves-light"><i class="feather icon-refresh-cw"></i> {{awtTrans('تحديث')}}</button>
        </div>
        <!-- DataTable starts -->
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr>
                        {{$tableHead}}
                    </tr>
                </thead>
                <tbody>
                    {{$tableBody}}
                </tbody>
            </table>
        </div>
        <!-- DataTable ends -->
    </section>
    <!-- Data list view end -->

</div>