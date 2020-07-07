<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	//error_reporting(0);
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
							<p><img src="<?php echo base_url()?>Assets/img/asdc_logo.png" align="middle" class="img-thumbnail" alt="Machine Test" style="width:50px;"/> User Dashboard</p>
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
	<div class="tab-content">
                            <div id="errorMessage"><?php echo @$error; ?></div>
                            <div id="login" class="tab-pane active">
							<div class="row">
                                <?php
								$session = $CI->session->userdata('logged_in');
		 $condition   				= array();
		 $condition['tbl_users_id'] = $session['id'];
		 $condition['status']       = '1';
		 $result                    = $CI->users_model->get_user_personal_details($condition);
		 if(count($result) > 0){
			$personal = $result[0];
			
		}
		 
		  
		 ?>
		 <p><img src="<?php echo base_url().$CI->config->item('assets_upload_path').$personal['img_path'].$personal['img_name'];?>" class="img-thumbnail" style="width:150px;"/></p>
		 <p>Name : <?php echo $personal['fullname'];?></p>
		 <p>Email : <?php echo $session['email'];?></p>
		 <p>Address : <?php echo $personal['address'];?></p>
		 <a class="btn btn-primary  btn-sm pull-right" href="#registration" data-toggle="tab">Update</a>
		 </div>
                            </div>
                            <div id="registration" class="tab-pane">
                            <div class="row">
                                <div  style="max-width: 600px;margin: 0 auto;">
								<form  method="POST" id="loginform"  enctype="multipart/form-data">
                                    <div class="">
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Fullname</label>
                                                <input type="text" name="fullname" id="fullname" value="<?php echo $personal['fullname'];?>" placeholder="name" class="form-control"/>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" value="<?php echo $session['email'];?>" placeholder="Email Address" class="form-control"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Photo</label>
                                                <input type="file" name="image" id="image" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                             <p><img src="<?php echo base_url().$CI->config->item('assets_upload_path').$personal['img_path'].$personal['img_name'];?>" class="img-thumbnail" style="width:150px;"/></p>
                                        </div>
                                        <br>
                                        <div class="">
                                            <div class="">
                                                <label>Address</label>
                                                <textarea name="address" id="address" placeholder="address" class="form-control"><?php echo $personal['address'];?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="">
                                                <button type="submit" id="register_now" class="btn btn-success btn-sm">Update</button>
                                                <a class="btn btn-primary  btn-sm pull-right" href="#login" data-toggle="tab">View</a>
                                            </div>
                                        </div>
										</form>
                                    </div>
                                    </div>
                                </div>
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
		
		$('#loginform').on('submit', function(e){
    e.preventDefault();
 
               
                     //var dataString = {fullname:fullname,email:email,image:image,address:address};
                     $.ajax({
                         type: "POST",
                         url: '<?php echo base_url(); ?>dashboard/update_user',
                         data:new FormData(this),
							processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
                         dataType: "json",
                         success: function(result){
                             if(result.status == 'success'){
                                 alert('successfully registered');
                                 } else {
                                 alert(result.message);
                             }
                         }
                     });
                    return true; 
                 
    
    
});
		});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
	</body>
	<!-- END BODY -->
</html>
