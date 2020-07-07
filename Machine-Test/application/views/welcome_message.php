<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8"/>
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="icon" href="<?php echo base_url() ?>Assets/img/fav.png" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/plugins/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/css/login.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/plugins/magic/magic.css" />
    </head>
    <body> 
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="text-center panel-heading">
                            <h1><p><img src="<?php echo base_url()?>Assets/img/asdc_logo.png" align="middle" class="img-thumbnail" alt="Spericorn Technology Pvt Ltd" style="width:130px;"/></p>
                           <p>Login</p> </h1>
                            
                        </div>
                        <div class="tab-content">
                            <div id="errorMessage"><?php echo @$error; ?></div>
                            <div id="login" class="tab-pane active">
                                <form action="<?php echo site_url('Welcome/user_login_process'); ?>" method="POST" id="loginform" class="form-signin" enctype="multipart/form-data">
                                    <input type="text" placeholder="Username" name="username" id="username" class="form-control"/>
                                    <input type="password" placeholder="Password" name="password" id="password" class="form-control"/>
                                    <button type="submit" name="submit" id="action" class="btn btn-sm text-muted text-center btn-success">Login</button>
                                    &nbsp;<a class="btn btn-sm btn-primary pull-right" href="#registration" data-toggle="tab">User Registration</a>
                                </form>
                            </div>
                            <div id="registration" class="tab-pane">
                            <div class="row">
                                <div  style="max-width: 600px;margin: 0 auto;">
                                    <div class="">
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Fullname</label>
                                                <input type="text" name="fullname" id="fullname" placeholder="name" class="form-control"/>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" placeholder="Email Address" class="form-control"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Password</label>
                                                <input type="password" name="o_password" id="o_password" placeholder="Password" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <div class="">
                                                <label>Confirm Password</label>
                                                <input type="password" name="c_password" id="c_password" placeholder="Confirm Password" class="form-control"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="">
                                            <div class="">
                                                <label>Address</label>
                                                <textarea name="address" id="address" placeholder="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="">
                                                <button type="button" id="register_now" class="btn btn-success btn-sm">Register</button>
                                                <a class="btn btn-primary  btn-sm pull-right" href="#login" data-toggle="tab">login Page</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="text-center">
                            <ul class="list-inline">
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script> var root = '<?php echo base_url(); ?>';</script>
        <script src="<?php echo base_url()?>Assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>Assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>Assets/js/login.js"></script>
    </body>
</html>
