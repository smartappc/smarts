

$(function () {

    'use strict';

    $('.datatable').DataTable(
        {
            "aaSorting": [],
            "stateSave": true
        }
    )



    // triger select box
    $(".select").selectBoxIt({
        autoWidth: false
    });


    $('#print').on("click", function () {
        $('.show').printThis();
    });

    //ul side sub menu
    $('.sub-menu').click(function () {
        $(this).next().slideToggle(500);
        //$(this).child().slideToggle(500);
    });

    //open and close victim
    $('.other-victim').click(function () {
        $(this).next().slideToggle(500);
        //$(this).child().slideToggle(500);
    });


});