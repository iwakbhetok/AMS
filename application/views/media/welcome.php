<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Dadang Nurjaman
  Email  : mail.nurjaman@gmail.com
  @2014

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
        <link rel="stylesheet" href="<?php echo base_url('assets/css/welcome.css') ?>" type="text/css"> 
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico'); ?>" />        
        <link rel="stylesheet" href="<?php echo base_url('assets/css/historic.css') ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/cssreset-min.css') ?>" type="text/css">
        <script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>          
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                window.setInterval(function() {
                    var sisawaktu = $("#waktu").val();

                    sisawaktu = eval(sisawaktu);
                    if (sisawaktu == 0) {
                        $("#waktu").fadeOut();
                        location.href = "<?php echo base_url('media/login'); ?>";
                    } else {
                        $("#waktu").val(sisawaktu - 1);
                    }
                }, 1000);
            });
        </script>
    </head>
    <body class="download">     
        <img class="bg" src=<?php echo base_url('assets/img/xxx.jpg'); ?> />
        <div class="dark-bg"></div>	       
        <form id="slick-login">
            <div align="center">
                <img src="<?php echo base_url('assets/img/abr_brands.png'); ?>"/>
            </div>            
            <input type="hidden" value="3" id="waktu" />
        </form>        
    </body>
</html>