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
<html lang="en" class="bg-dark">
    <head>
        <meta charset="utf-8" />
        <title>Scale | Web Application</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/app.v1.css'); ?>" type="text/css" />
        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    </head>
    <body class="" >
        <section id="content">
            <div class="row m-n">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="text-center m-b-lg">
                        <h1 class="h text-white animated fadeInDownBig">404</h1>
                    </div>
                    <div class="list-group bg-info auto m-b-sm m-b-lg">
                        <a href="<?php echo base_url('media/dashboard');?>" class="list-group-item"> 
                            <i class="fa fa-chevron-right icon-muted"></i>
                            <i class="fa fa-fw fa-home icon-muted"></i> Kembali ke Beranda
                        </a> 
                        <a href="#" class="list-group-item"> 
                            <i class="fa fa-chevron-right icon-muted"></i>
                            <i class="fa fa-fw fa-question icon-muted"></i> Send us a tip
                        </a> 
                        <a href="#" class="list-group-item"> 
                            <i class="fa fa-chevron-right icon-muted"></i> 
                            <span class="badge bg-info lt">021-215-584</span>
                            <i class="fa fa-fw fa-phone icon-muted"></i> Call us
                        </a> 
                    </div>
                </div>
            </div>
        </section>
        <!-- footer --> 
        <footer id="footer">
            <div class="text-center padder clearfix">
                <p> <small>Aplikasi Manajemen Surat<br>&copy; 2015</small> </p>
            </div>
        </footer>
        <!-- / footer -->
        <!-- Bootstrap -->
        <!-- App -->
        <script src="<?php echo base_url('assets/js/app.v1.js');?>"></script> 
        <script src="<?php echo base_url('assets/js/js/app.plugin.js');?>"></script>
    </body>
</html>