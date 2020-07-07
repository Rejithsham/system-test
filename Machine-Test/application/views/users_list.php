<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	error_reporting(0);
 $CI =& get_instance(); 
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
			
			<p></p>
			<p></p>
			<p></p>
			<hr>
			<!--PAGE CONTENT -->
			<div class="container">
				<div class="row">
					<div class="table-responsive">
						<table class="table display" id="dataTables-example">
							<thead>
								<th>#</th>
								<th>Details</th>
								<th>Date</th>
								<th>status</th>
								<th>Action</th>
							</thead>
							<tbody>
							<?php $no =1; 
							if(count($users) > 0) {  foreach($users as $val_users)?>
								<tr>
									
									<td><?php echo $no; ?></td>
									<td>
										<?php
										$condition 			=  array();
										$condition['tbl_users_id'] = $val_users['id'];
										 $result_data = $CI->users_model->get_user_personal_details($condition); 
										  $result_data = $result_data[0];
										  echo $result_data['fullname'].'<br>';
										  echo $val_users['email'].'<br>';
										  echo $result_data['address'].'<br>';
										  ?>
										
										</td>
									<td><?php echo date('d-m-Y',strtotime($val_users['created_date'])); ?></td>
									<td> <?php if($val_users['status']==1) { echo '<p class="label label-success">Active</p>';} else {
										echo '<p class="label label-danger">In Active</p>';} ?></td>
									<td><a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="approve(<?php echo $val_users['id']; ?>);">Approve</a>
										<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="delete(<?php echo $val_users['id']; ?>);">Delete</a>
										<a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="view(<?php echo $val_users['id']; ?>);">View</a></td>
								</tr>
							<?php $no++; } else { ?>
							<tr> <td colspan="4">No Record Found</td></tr>
							<?php } ?>
							</tbody>
						</table>
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
	var root = '<?php echo base_url(); ?>';
		$(document).ready(function () {
		$('#dataTables-example').dataTable();
		});
		function approve(id){
		
                 var dataString = {id:id};
                     $.ajax({
                         type: "POST",
                         url: root+'dashboard/approve',
                         data:dataString,
                         dataType: "json",
                         success: function(result){
                             if(result.status == 'success'){
                                 alert('success');
								 window.location.reload();
                                 } else {
                                 alert(result.message);
                             }
                         }
                     });
                    return true; 
                }
				
				function delete(id){
		
                 var dataString = {id:id};
                     $.ajax({
                         type: "POST",
                         url: root+'dashboard/delete',
                         data:dataString,
                         dataType: "json",
                         success: function(result){
                             if(result.status == 'success'){
                                 alert('success');
								 window.location.reload();
                                 } else {
                                 alert(result.message);
                             }
                         }
                     });
                    return true; 
                }
		
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>
