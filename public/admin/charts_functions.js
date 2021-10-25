
// pie function for drow digram
// pass 3 arrays 
// first array lables contains names of lables like ['active', 'not active']
// secound array series contains numbers of lables like [200, 300]
// third array colors contains colors of lables  like ['#7367F0', '#FF9F43']
function pieChartFunction(lables , series , colors){
    var customerChartoptions = {
        chart: {
        type: 'pie',
        height: 330,
        dropShadow: {
            enabled: false,
            blur: 5,
            left: 1,
            top: 1,
            opacity: 0.2
        },
        toolbar: {
            show: false
        }
        },
        labels: lables,
        series: series,
        dataLabels: {
        enabled: false
        },
        legend: { show: false },
        stroke: {
        width: 5
        },
        colors: colors,
        fill: {
        type: 'gradient',
        gradient: {
            gradientToColors: ['#A9A2F6', '#ffc085'] ,
        }
        }
    }
    return customerChartoptions ;
}


// pie function for drow digram
// pass 3 arrays 
// first array lables contains names of lables like ['active', 'not active']
// secound array series contains numbers of lables like [200, 300]
// third array colors contains colors of lables  like ['#7367F0', '#FF9F43']

function radialBarFunction(colors , colors2 , lables ,series){
    var supportChartoptions = {
    chart: {
        height: 270,
        type: 'radialBar',
        sparkline:{
            enabled: false,
        }
    },
    plotOptions: {
        radialBar: {
            size: 150,
            offsetY: 20,
            startAngle: -150,
            endAngle: 150,
            hollow: {
                size: '65%',
            },
            track: {
                background: '#fff',
                strokeWidth: '100%',

            },
            dataLabels: {
                value: {
                    offsetY: 30,
                    color: '#99a2ac',
                    fontSize: '2rem'
                }
            }
        },
    },
    colors: colors,
    fill: {
        type: 'gradient',
        gradient: {
            // enabled: true,
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: colors2,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
        },
    },
    stroke: {
        dashArray: 8
    },
    series: series,
    labels: lables,
    }

    return supportChartoptions ;
}