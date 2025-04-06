


    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='../ace-assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
        
    <script src="../ace-assets/js/bootstrap.min.js"></script>

    <!--Calendar-->
    <script src="../ace-assets/js/jquery-ui.custom.min.js"></script>
    <script src="../ace-assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../ace-assets/js/moment.min.js"></script>
    <script src="../ace-assets/js/fullcalendar.min.js"></script>
    <script src="../ace-assets/js/bootbox.js"></script>
    <!--End Calendar-->

    <!--Chart JS-->
    <script src="../plugins/chartjs/chart.min.js"></script>
    <!--End Chart JS-->

    <!-- PNotify -->
    <script src="../assets/pnotify/dist/pnotify.js"></script>
    <script src="../assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../assets/pnotify/dist/pnotify.nonblock.js"></script>

    <!--Old Datatable-->
	<!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="../plugins/datatables/jszip.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="../plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="../assets/dist/html2pdf.bundle.js"></script>

    <script type="text/javascript">
        var handleDataTableButtons = function() {
            "use strict";
            0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdf",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: !0
            })
        },

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                      handleDataTableButtons()
                    }
                }
            }
            ();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
                keys: true
            });
        $('#datatable-responsive').DataTable();		
        $('#datatable-jeru').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });
        });
        TableManageButtons.init();
    </script>
    <!--End Old Datatable-->

    <!-- ace scripts -->
    <script src="../ace-assets/js/ace-elements.min.js"></script>
    <script src="../ace-assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <!--Custom Scripts-->
    <script type="application/javascript">
        $(document).ready(function() {
          $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        });
    </script>

    <script type="application/javascript">
        function PopupCenter(url, title, w, h) {

            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

            var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var left = ((width / 2) - (w / 2)) + dualScreenLeft;
            var top = ((height / 2) - (h / 2)) + dualScreenTop;
            var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

            if (window.focus) {
                newWindow.focus();
            }
        }
        
        function PopupCenterNoWindow(url, title, w, h) {

            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

            var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var left = ((width / 2) - (w / 2)) + dualScreenLeft;
            var top = ((height / 2) - (h / 2)) + dualScreenTop;
            var newWindow = window.open(url, title, 'minimizable=no,scrollbars=yes,resizable=no,titlebar=no,location=no,toolbar=no,titlebar=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

            if (window.focus) {
                newWindow.focus();
            }
        }

    </script>
    <!--End Custom Scripts-->

    <!--Select-->
    <!-- Select2 -->
    <script src="../ace-assets/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
      })
    </script>
    <!--End Select-->

    <!--Notification-->
    <script src="../ace-assets/js/jquery.gritter.min.js"></script>
    <script>
        $("#gritter-remove").on(ace.click_event, function(){
            $.gritter.removeAll();
            return false;
        });
        
        $(document).one('ajaxloadstart.page', function(e) {
            $.gritter.removeAll();
            $('.modal').modal('hide');
        });
    </script>
    <!--End Notification-->

    <!--Date Picker-->
    <script src="../ace-assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {

            //datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            })
            //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
                $(this).prev().focus();
            });

        });
    </script>
    <!--End Date Picker-->

    <!--Page Loader 12/1/2020-->
    <script type="application/javascript">
        $(window).on("load",function(){
             $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <!--End Page Loader-->

    <script src="../ace-assets/js/bootstrap-datetimepicker.min.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
//var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
//(function(){
//var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
//s1.async=true;
//s1.src='https://embed.tawk.to/5a20628a198bd56b8c03e570/default';
//s1.charset='UTF-8';
//s1.setAttribute('crossorigin','*');
//s0.parentNode.insertBefore(s1,s0);
//})();
</script>
<!--End of Tawk.to Script-->

