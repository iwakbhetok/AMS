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
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>[beta version]Aplikasi Manajemen Surat</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <link rel="stylesheet" href="<?php echo base_url('assets/css/app.v1.css'); ?>" type="text/css" />        
        <link rel="stylesheet" href="<?php echo base_url('assets/js/datatables/datatables.css'); ?>" type="text/css" />        
        <link rel="stylesheet" href="<?php echo base_url('assets/js/magnific/magnific-popup.css'); ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/js/datepicker/datepicker.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/js/autocomplete/autocomplete.css'); ?>" type="text/css" />

        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    </head>
    <body>
        <section class="vbox">
            <?php echo $_header; ?>
            <section>
                <section class="hbox stretch">
                    <!-- .aside --> 
                    <?php echo $_sidebar; ?>
                    <!-- /.aside --> 
                    <section id="content">
                        <?php echo $_content; ?>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
                    </section>
                </section>
            </section>            
        </section>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.popup-pdf').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });

            });
        </script>

        <!-- Bootstrap -->
        <!-- App -->
        <script src="<?php echo base_url('assets/js/app.v1.js'); ?>"></script>			
        <!-- Sparkline Chart -->
        <script src="<?php echo base_url('assets/js/charts/sparkline/jquery.sparkline.min.js'); ?>"></script>
        <!-- Datatables -->
        <script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/datatables/demo.js'); ?>"></script>
        <!-- Easy Pie Chart -->
        <script src="<?php echo base_url('assets/js/charts/easypiechart/jquery.easy-pie-chart.js'); ?>"></script>
        <!-- Flot -->
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.tooltip.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.resize.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.orderBars.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.pie.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.grow.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/charts/flot/demo.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/app.plugin.js'); ?>"></script>
        <!-- Magnific -->
        <script src="<?php echo base_url('assets/js/magnific/jquery.magnific-popup.js'); ?>"></script>   
        <script src="<?php echo base_url('assets/js/magnific/jquery.magnific-popup.min.js'); ?>"></script> 

        <script src="<?php echo base_url('assets/js/datepicker/bootstrap-datepicker.js'); ?>"></script>         
        <script src="<?php echo base_url('assets/js/file-input/bootstrap-filestyle.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/wysiwyg/jquery.hotkeys.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/wysiwyg/bootstrap-wysiwyg.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/wysiwyg/demo.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/parsley/parsley.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/parsley/parsley.extend.js'); ?>"></script>
		
		<script src="<?php echo base_url('assets/js/autocomplete/jquery.autocomplete.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/autocomplete/currency-autocomplete.js'); ?>"></script>
		
    </body>
</html>