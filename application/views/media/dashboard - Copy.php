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

<section class="vbox">
    <header class="header bg-dark lt box-shadow">        
        <p class="h4 font-thin m-r m-b-sm">Beranda</p>         
    </header>
    <section class="scrollable"> <!-- w-f -->
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">	
            <section class="wrapper">
                <div>
                    <h3 class="m-b-xs text-black">Selamat Datang, <?php echo $this->session->userdata('employee_name'); ?></h3>
                    <small>Aplikasi Manajemen Surat</small> 
                </div>                
            </section>
            
        </div>
    </section>     
    <footer class="footer bg-white b-t b-light">
        <p>Waktu Eksekusi : <strong>{elapsed_time}</strong>, Penggunaan Memori : <strong>{memory_usage}</strong></p>
    </footer>    
</section>