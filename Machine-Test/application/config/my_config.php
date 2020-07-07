<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_path']                                      = BASEPATH;

$config['gender']                                           = array('male'=>'Male', 'female'=>'Female', 'transgender'=>'Transgender');

$config['user']                                 			= '1';
$config['admin']                                     		= '2';

$config['image_file_types']                                 = array('png', 'jpg', 'jpeg');
$config['doc_file_types']                                   = array('pdf', 'doc', 'docx','rtf','txt','png', 'jpg', 'jpeg','avi','mp4','3gp', 'mov');
$config['image_thumb_size']                                 = 200;
$config['file_upload_size']                                 = 10000;
$config['profile_img_folder']                               = 'profile_pic';
$config['assets_folder']                                    = 'Assets';
$config['assets_upload_path']                               = 'Assets/uploads/';