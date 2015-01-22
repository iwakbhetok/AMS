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

<section class="vbox">
    <header class="header bg-dark lt box-shadow">
        <p class="h4 font-thin m-r m-b-sm">Tambah Surat Keluar</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">
                <form data-validate="parsley" action="#">
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Form Surat Keluar </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">                                
                                    <div class="form-group">
                                        <label>Nomor Surat</label> 
                                        <div> <input type="text" class="form-control" placeholder="Ketikkan nomor surat"> </div>
                                    </div>         
                                    <div class="form-group">
                                        <label>Tanggal Surat</label> 
                                        <div> <input class="datepicker-input form-control" type="text" data-date-format="yyyy-mm-dd" placeholder="Pilih tanggal"> </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Perihal</label> 
                                        <textarea class="form-control" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan perihal"></textarea> 
                                    </div>                                
                                </div>
                                <div class="col-sm-6">   
                                    <div class="form-group">
                                        <label>Sifat Surat</label> 
                                        <div> 
                                            <select name="account" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <option value="1">Biasa</option>
                                                <option value="2">Rahasia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Keterangan</label>
                                        <div>
                                            <textarea class="form-control" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan keterangan"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sertakan File</label> 
                                        <div> <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <a type="submit" class="btn btn-success btn-s-xs">Simpan</a> 
                            <a href="<?php echo base_url('mail/outbox/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                    </section>
                </form>
            </div>                       
        </div>
    </section>
</section>