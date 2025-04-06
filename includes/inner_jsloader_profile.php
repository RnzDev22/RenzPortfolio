<!-- jQuery -->
<script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../assets/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<!-- iCheck -->
<script src="../assets/vendors/iCheck/icheck.min.js"></script>


<!-- PNotify -->
<script src="../assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="../assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>

<script src="../assets/vendors/echarts/dist/echarts.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="../assets/vendors/moment/min/moment.min.js"></script>
<script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="../assets/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<!--<script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>-->
<!-- Autosize -->
<script src="../assets/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../assets/vendors/starrr/dist/starrr.js"></script>

<script src="../assets/vendors/morris.js/morris.min.js"></script>
<script src="../assets/vendors/raphael/raphael.min.js"></script>

<script src="../assets/vendors/Chart.js/dist/Chart.min.js"></script>

<script src="../assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<!-- Datatables -->
<script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/pace/pace.min.js"></script>

<!-- Datatables -->
<!--
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
-->
<script src="../assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatables/dataTables.bootstrap.js"></script>
<script src="../assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/js/datatables/buttons.bootstrap.min.js"></script>
<script src="../assets/js/datatables/jszip.min.js"></script>
<!--    <script src="assets/js/datatables/pdfmake.min.js"></script>-->
<script src="../assets/js/datatables/vfs_fonts.js"></script>
<script src="../assets/js/datatables/buttons.html5.min.js"></script>
<script src="../assets/js/datatables/buttons.print.min.js"></script>
<script src="../assets/js/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../assets/js/datatables/dataTables.keyTable.min.js"></script>
<script src="../assets/js/datatables/dataTables.responsive.min.js"></script>
<script src="../assets/js/datatables/responsive.bootstrap.min.js"></script>
<script src="../assets/js/datatables/dataTables.scroller.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../assets/build/js/custom.min.js"></script>

<script>
/* DATA TABLES */

function init_DataTables() {

    console.log('run_datatables');

    if (typeof ($.fn.DataTable) === 'undefined') { return; }
    console.log('init_DataTables');

    var handleDataTableButtons = function () {
        if ($(".datatable-buttons").length) {
            $(".datatable-buttons").DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": false,
                //dom: "Blfrtip",
                //"dom": '<"toolbar">frtip',
                "dom": '<"top"rfi>t<"bottom"l>p',
                
                "order": [],"bSort" : true,
                "iDisplayLength": 10,
                language: { search: "" },
                buttons: [],
                responsive: true
            });
            $("div.toolbar").html('Search');
        }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons()
        }
      }
    }();

    var $datatable = $('#datatable-checkbox');
    TableManageButtons.init();
};

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
      ajax: "../assets/js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 400,
      scrollCollapse: true,
      scroller: true
    });
    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });
  });
  //TableManageButtons.init();
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

</script>