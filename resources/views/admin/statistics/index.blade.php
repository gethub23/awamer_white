@extends('admin.layout.master')
@section('content')
    <section id="configuration" style="margin-top: 5px ">
        <div class="row">
            <div class="col-6">
                <div class="card mainCard">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('المستخدمين')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <canvas id="userChart"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- labels --}}
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
        {{-- labels --}}

        {{-- drow chart function --}}
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
        {{-- drow chart function --}}
        
        {{-- user chart --}}
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
        {{-- user chart --}}
    </x-slot >
</x-admin.scripts >