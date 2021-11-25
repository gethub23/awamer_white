
    
  var dataListView = $('.data-list-view').DataTable( {
    dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    aLengthMenu: [[20, 50, 100], [20, 50, 100]],
    order: false,
    buttons: [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [ 0, ':visible' ]
            }
        },
        // {
        //     extend: 'pdfHtml5',
        //     exportOptions: {
        //         columns: ':visible'
        //     }
        // },
        {
            text: 'JSON',
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();

                $.fn.dataTable.fileSave(
                    new Blob( [ JSON.stringify( data ) ] ),
                    'Export.json'
                );
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        }
    ]
});



$.fn.dataTable.ext.search.push(
  function (settings, data, dataIndex) {
    var min = $('#min').datepicker("getDate");
    var max = $('#max').datepicker("getDate");
    // need to change str order before making  date obect since it uses a new Date("mm/dd/yyyy") format for short date.
    var d = data[1].split("/");

    var startDate = new Date(d[1]+ "/" +  d[0] +"/" + d[2]);

    if (min == null && max == null) { return true; }
    if (min == null && startDate <= max) { return true;}
    if(max == null && startDate >= min) {return true;}
    if (startDate <= max && startDate >= min) { return true; }
    return false;
  }
);

$('#min').datepicker({ onSelect: function () { dataListView.draw(); }, changeMonth: true, changeYear: true ,dateFormat:"dd/mm/yy"});
$('#max').datepicker({ onSelect: function () { dataListView.draw(); }, changeMonth: true, changeYear: true ,dateFormat:"dd/mm/yy"});
// Event listener to the two range filtering inputs to redraw on input

// Event listener to the two range filtering inputs to redraw on input
$('#min, #max').keyup( function() {
dataListView.draw();
} );