<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Refresh Otomatis -->
		<meta http-equiv="refresh" content="4"> 
        <!-- ------------------------- -->

        <title>Monitoring Tanaman Kaktus</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
		<!-- Datepicker  -->
        <link rel="stylesheet" href="template/bootstrap/css/datepicker.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="template/font-awesome-4.7/css/font-awesome.min.css">
       <!-- DataTables -->
        <link rel="stylesheet" href="template/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="template/dist/css/AdminLTE.min.css">
       
        <link rel="stylesheet" href="template/dist/css/skins/_all-skins.min.css">

		<!-- CKEditor -->
		<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="assets/ckfinder/ckfinder.js"></script>
      
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo">
                   <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Monitoring Kaktus</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
                                <a href="index.php" >
                                    <span class="hidden-xs">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="index.php?m=riwayat" >
                                    <span class="hidden-xs">Riwayat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
					<br>	
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						<li>
                            <a href="index.php?m=riwayat">
                                <i class="fa fa-calendar"></i> <span>Riwayat</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php
                include("konten.php");
                ?>
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2021 ROY LINDRA</strong> All rights reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="template/bootstrap/js/bootstrap.min.js"></script>
		 <!-- Datepicker -->
        <script src="template/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- DataTables -->
        <script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="template/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="template/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="template/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="template/dist/js/demo.js"></script>

        <script src="template/plugins/chartjs/Chart.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

		
        <!-- page script -->
        <script>

            $(function () {
				$('.tanggal').datepicker({
					format:'yyyy-mm-dd'
				});
				
				$('.tanggal').on('changeDate', function(ev){
					$(this).datepicker('hide');
				});
            });
        </script>

<script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                    var humidity = [];
                    var time = [];
                    for (var i in data) {
                        time.push(data[i].time);
                        humidity.push(data[i].humidity);
                    }
                    var chartdata = {
                        labels: time,
                        datasets: [
                            {
                                label: 'Kelembapan',
                                borderColor: '#46d5f1',
                                hoverBorderColor: '#666666',
                                data: humidity
                            }
                        ]
                    };
                    var graphTarget = $("#myChart");
                    var Graph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                            animation: {
                                duration: 0,
                            }
                        }
                    });
                });
            }
        }
        </script>

		
    </body>
</html>