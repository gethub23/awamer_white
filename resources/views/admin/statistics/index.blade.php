@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/pages/data-list-view.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
@section('content')
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{awtTrans('الاحصائيات')}}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection

 {{-- <x-admin.scripts >
    <x-slot name='moreScript'>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const months = [
                        '{{awtTrans('يناير')}}',
                        '{{awtTrans('فبراير')}}',
                        '{{awtTrans('مارس')}}',
                        '{{awtTrans('ابريل')}}',
                        '{{awtTrans('مايو')}}',
                        '{{awtTrans('يونيو')}}',
                        '{{awtTrans('يوليو')}}',
                        '{{awtTrans('اغسطس')}}',
                        '{{awtTrans('سبتمبر')}}',
                        '{{awtTrans('اكتوبر')}}',
                        '{{awtTrans('نوفمبر')}}',
                        '{{awtTrans('ديسمبر')}}',
                    ];
            </script>
        <script>
           function drow (div_id , data) {
                const config = {
                    type: 'line',
                    data,
                    options: {}
                };
                var myChart = new Chart(
                    document.getElementById(div_id),
                    config
                );
            } 
        </script>
        
            <script>
                const userData = {
                    labels: months,
                    datasets: [{
                        label: "{{awtTrans('المستخدمين  خلال السنة')}}",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: @json($users),
                    },{
                        label: "{{awtTrans('المشرفين خلال السنة')}}",
                        backgroundColor: 'rgb(75, 192, 192)',
                        borderColor: 'rgb(75, 192, 192)',
                        data: @json($admins),
                    }]
                };
                drow ('userChart' , userData)
            </script>
    </x-slot >
</x-admin.scripts > --}}