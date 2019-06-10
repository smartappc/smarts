

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

    /////////////////////////date///////////////
    //////////////////////////////////
    $('.myDate-picker').datepicker({
        changeMonth : true,
        changeYear  :true,
        dateFormat : 'yy-mm-dd',
        buttonText: "Choose",
        yearRange: "1940:2040",
        currentText: "Now",
        width :  100
    });
    $( "#inc_date" ).datepicker( "option", "autoSize", true );

});