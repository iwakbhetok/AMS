<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Abdul Gofur
  Email  : abdul.createit@gmail.com
  @2015

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Aplikasi Manajemen Surat</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">        
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/historic.css') ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/cssreset-min.css') ?>" type="text/css">
        <script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
        <script src="<?php echo base_url('assets/css/app.js'); ?>"></script>         
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>                 
        <script type="text/javascript">
            $(document).ready(function() {
                $("#username").focus();
            });
        </script>
    </head>
    <body class="download">     
        <img class="bg" src="<?php echo base_url('assets/img/xxx.jpg'); ?>" />
        <div class="dark-bg"></div>	
        <div class="modal-over">
            <div class="well modal-center animated flipInX bg-white" style="width:300px;margin:-135px 0 0 -150px;">       
                <div>
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-responsive"/>
                </div>
                <br/>               
                <form action="<?php echo base_url('media/do_login'); ?>" method="post" >                     
                    <p class="text-white">
                        <input type="text" id="username" name="username" class="form-control text-sm" placeholder="Enter username" />
                    </p> 
                    <div class="input-group"> 
                        <input type="password" id="password" name="password" class="form-control text-sm" placeholder="Enter password" /> 
                        <span class="input-group-btn"> 
                            <button id="login_button" class="btn btn-info" type="submit">
                                Login
                            </button>
                        </span> 
                    </div> 
                </form> 
            </div>
        </div>                
    </body>
</html>