
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

(function ($) {
    "use strict";
    var mainApp = {
        dataTable_fun: function () {

            $('#mydata').dataTable();

        },
       
        custom_fun:function()
        {
            /*====================================
             WRITE YOUR   SCRIPTS  BELOW
            ======================================*/
            $('#datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
            });



        },

    }
   
   
    $(document).ready(function () {
        mainApp.dataTable_fun();
        mainApp.custom_fun();
    });
}(jQuery));


