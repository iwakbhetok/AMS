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
        <p class="h4 font-thin m-r m-b-sm">Laporan Surat Keluar</p>
    </header>
    <section class="scrollable w-f">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">  		
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="" id="dt_a">
                        <thead>
                            <tr>
                                <th width="10%">Nomor</th>
                                <th width="15%">Sifat Surat</th>
                                <th width="15%">Nomor Surat</th>
                                <th width="15%">Tanggal Surat</th>
                                <th width="25%">Perihal</th>
                                <th width="20%">Keterangan</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
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