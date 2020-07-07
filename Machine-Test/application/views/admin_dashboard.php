<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link rel="icon" href="<?php echo base_url()?>Assets/img/asdc_logo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/plugins/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/css/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/css/design.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/css/MoneAdmin.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>Assets/plugins/Font-Awesome/css/font-awesome.css" />
		<link href="<?php echo base_url() ?>Assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
	</head>
	<body class="padTop53 " >
		<div id="wrap">
			<div id="top">
				<nav class="navbar navbar-inverse navbar-fixed-top " style="padding: 10px;">
					<a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
					<i class="icon-align-justify"></i></a>
					<header class="navbar-header">
						<a href="#" class="navbar-brand">
							<p><img src="<?php echo base_url()?>Assets/img/asdc_logo.png" align="middle" class="img-thumbnail" alt="Machine Test" style="width:50px;"/> Admin Dashboard</p>
						<!--<img src="<?php echo base_url() ?>Assets/img/logo.jpeg" alt="Nicola PMKVY Portal"/>--></a>
					</header>
					<ul class="nav navbar-top-links navbar-right">
						
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
							</a>
							
							<ul class="dropdown-menu dropdown-user">
								<li><a href="#"><i class="icon-user"></i> User Profile </a>
								</li>
								<li><a href="#"><i class="icon-gear"></i> Settings </a>
								</li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url('Welcome/logout'); ?>"><i class="icon-signout"></i> Logout </a>
								</li>
							</ul>
							
						</li>
					</ul>
					
				</nav>
				
			</div>
			<!--END MENU SECTION -->
			
			
			<!--PAGE CONTENT -->
			<div class="container">
	<div class="row">
      <div class="col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-address-card-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">1</p>
                <p class="announcement-text">Profiles</p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-barcode fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">12</p>
                <p class="announcement-text"> Products</p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo count($users); ?></p>
                <p class="announcement-text">Users</p>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url(); ?>dashboard/users_list">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">9000</p>
                <p class="announcement-text"> Orders!</p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div><!-- /.row -->
    </div>
			
			
			
			
		</div>
		<!--END PAGE CONTENT -->
		
		
	</div>
	
	<!--END MAIN WRAPPER -->
	
	<!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Machine Test &nbsp;2020 &nbsp;</p>
	</div>
    <!--END FOOTER -->
	<!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url() ?>Assets/plugins/jquery-2.0.3.min.js"></script>
	<script src="<?php echo base_url() ?>Assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>Assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
	<!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url() ?>Assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>Assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
		$('#dataTables-example').dataTable();
		});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
	</body>
	<!-- END BODY -->
</html>
