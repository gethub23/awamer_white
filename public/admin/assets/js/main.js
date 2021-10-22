$(window).on('load', function () {
    $('.loader').fadeOut(1000);
    new WOW().init();
    $('body').addClass('o-auto');
});



$(document).ready(function () {

    $('#example').DataTable({
            responsive: true,
            "ordering": true,
            "columnDefs": [{
                "width": "10%"
            }],

            "language": {
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "اظهار عدد _MENU_  ",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "اظهار _START_ الى _END_ من اصل  _TOTAL_   ",
                "sInfoEmpty": "اظهار النتائج 0 إلى 0 من 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": " ",
                "searchPlaceholder": "اكتب كلمة بحثك",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "<i class='fa fa-angle-right' ></i>",
                    "sNext": "<i class='fa fa-angle-left' ></i>",
                    "sLast": "الأخير"
                }
            }
        });
    
    

    $('#supervisors_reports').DataTable({
        dom: 'Blfrtip',
            responsive: true,
            "ordering": true,
            "columnDefs": [{
                "width": "10%"
            }],
        buttons: [{
            extend: 'collection',
            text: 'تصدير',
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf',
                'print'
            ]
        }],
        "language": {
            "sProcessing": "جارٍ التحميل...",
            "sLengthMenu": "اظهار عدد _MENU_  ",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ - _END_      ",
            "sInfoEmpty": "اظهار النتائج 0 إلى 0 من . 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": " ",
            "searchPlaceholder": "اكتب كلمة بحثك",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "<i class='fa fa-angle-right' ></i>",
                "sNext": "<i class='fa fa-angle-left' ></i>",
                "sLast": "الأخير"
            }
        }
    });

    
    $('.dataTables_length').parent().addClass('col-md-3').removeClass("col-md-6");
    $('.dataTables_filter').parent().addClass('col-md-4').removeClass("col-md-6");
    
    $("#supervisors_reports_wrapper").removeClass("col-md-3 col-md-4");
    
    $("#supervisors_reports_wrapper").children(".dataTables_length ,.dataTables_filter").wrapAll("<aside class='row'></aside>");
    
    $('#supervisors_reports_wrapper .dataTables_length').addClass('col-md-3');
    $('#supervisors_reports_wrapper .dataTables_filter').addClass('col-md-4');
    
     $('#supervisors_reports_wrapper .btn-group').addClass('add_box');
    
    $("#supervisors_reports_wrapper").children(".dataTables_info ,.dataTables_paginate").wrapAll("<aside class='d-flex justify-content-between'></aside>");
    

});


$('.main-nav').on('click', function () {
    $(this).children().toggleClass("fa-bars fa-times");
    $(this).next().toggle();
});


$('.open_drop').on('click', function () {
    $('.drop_menu').toggle();
});



// SHOW MENU
const showMenu = (toggleId, navbarId, mainId) => {
    const toggle = document.getElementById(toggleId),
        navbar = document.getElementById(navbarId),
        mainypadding = document.getElementById(mainId);

    if (toggle && navbar) {
        toggle.addEventListener("click", () => {
            // APARECER MENU
            navbar.classList.toggle("show");
            // ROTATE TOGGLE
            toggle.classList.toggle("rotate");
            // PADDING BODY
            mainypadding.classList.toggle("expander");
            mainypadding.classList.toggle("expander2");
        });
    }
};
showMenu("open_menu", "navbar", "main");


// Change active link when clicked
const linkColor = document.querySelectorAll(".nav-link");

function colorLink() {
    linkColor.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));


$(document).ready(function name() {
    // input to add img
    let inputs = document.querySelectorAll(".foleinput");
    inputs.forEach((input) => {
        input.addEventListener("click", function (e) {
            e.target.addEventListener("change", function (e) {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(input)
                            .parent(".forfile")
                            .next(".imgcontainer")
                            .children(".phote")
                            .attr("src", e.target.result);

                        $(input)
                            .parent(".forfile")
                            .next(".imgcontainer ")
                            .css("display", "block");
                    };

                    reader.readAsDataURL(this.files[0]);

                    $(document).on("click", ".removep", function () {
                        $(this).parent(".imgcontainer").css("display", "none");
                    });
                }
            });
        });
    });

    // Change img profile picture
    var changeprof = document.querySelector(".editprof");

    changeprof.onchange = function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".profile-pic-Edit").attr("src", e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    };

});

// 

//////
jQuery(document).ready(function () {
    jQuery('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+1d',
        onSelect: function (datetext) {
            var d = new Date(); // for now

            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s;

            datetext = datetext + " " + h + ":" + m + ":" + s;

            $('#datepicker').val(datetext);
        }
    });
});


$(".nav-list a").each(
    function() {
        if (window.location.href.includes($(this).attr('href'))) {
            $(this).addClass("active");
            $(this).parent().parent('.drop_menu').show();

        }
    }
);