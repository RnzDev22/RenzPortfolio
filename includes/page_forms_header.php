    <head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>BPI NSQCS PMC</title>
        <link rel="icon" href="../ace-assets/favicon.ico">

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="../ace-assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../ace-assets/font-awesome/4.5.0/css/font-awesome.min.css" />		
        
		<link rel="stylesheet" href="../ace-assets/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="../ace-assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="../ace-assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../ace-assets/css/ace-rtl.min.css" />

        <script src="../ace-assets/js/ace-extra.min.js"></script>
        
        <link href="../plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../ace-assets/select2/css/select2.min.css">
        
        <link rel="stylesheet" href="../ace-assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../ace-assets/css/jquery.gritter.min.css" />
        
        <link rel="stylesheet" href="../ace-assets/css/fullcalendar.min.css" />
        <link href="../ace-assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <link href="../ace-assets/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
                
       <!-- Custom js Loader -->
        <script type="text/javascript"  src="../ace-assets/custom-js/report.js"></script>
        <script src="../ace-assets/js/jquery-2.1.4.min.js"></script>
            
        <!-- PNotify -->
        <link href="../assets/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="../assets/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="../assets/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
        
        
        <style>
            div#load_screen{
                background: #000;
                opacity: 0.75;
                position: fixed;
                z-index:10;
                top: 0px;
                width: 100%;
                height: 1600px;
            }
            div#load_screen > div#loading{
                color:#FFF;
                width: 100%;
                max-width: 400px;
                height: auto;
                margin: 350px auto;
            }
            </style>
            <script>
            window.addEventListener("load", function(){
                var load_screen = document.getElementById("load_screen");
                document.body.removeChild(load_screen);
            });
        </script>
        
        <div id="load_screen">
            <div id="loading" align="center">
                <img src="../ace-assets/images/bpilogo.png" width="50%" height="50%">
                <br><h3>Loading Please Wait...</h3>
            </div>
        </div>
	</head>