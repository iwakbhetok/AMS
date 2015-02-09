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
<script type="text/javascript">
/*$(function(){
  $("#mail_number").autocomplete({
    source: "<?php echo base_url();?>mail/inbox/auto_number"
  });
});*/
        </script>

<section class="vbox">
    <header class="header bg-dark lt box-shadow">
        <p class="h4 font-thin m-r m-b-sm">Tambah Surat Masuk</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">
                <?php echo form_open_multipart('mail/do_upload') ?>                
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Form Surat Masuk </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
									<div class="form-group">
                                        <label>No. Agenda Surat</label> 
                                        <div> <input type="text" name="val[mail_registry_number]" id="mail_registry_number" class="form-control" value="<?php echo $no_reg;?>" readonly="1"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Surat</label><br/>
                                        <div style="display:inline-table;"> 
                                            <select name="part[code]" id="code" style="width:100px;" class="form-control m-b">
                                                <option value="0">CODE</option>
                                                <option value="B">B</option>
                                                <option value="BND">BND</option>
                                                <option value="K">K</option>
                                                <option value="KEP">KEP</option>
                                                <option value="L">L</option>
                                                <option value="PENG">PENG</option>
                                                <option value="R">R</option>
                                                <option value="SE">SE</option>
                                                <option value="SIC">SIC</option>
                                                <option value="SIJ">SIJ</option>
                                                <option value="SKEP">SKEP</option>
                                                <option value="SPRIN">SPRIN</option>
                                                <option value="ST">ST</option>
                                                <option value="STR">STR</option>
                                                <option value="RND">RND</option>
                                                <option value="UND">UND</option>
                                            </select>
                                        </div> /
                                        <div style="display:inline-table;"> 
                                            <input type="text" name="part[number]" id="number" style="width:120px;" class="form-control" placeholder="Nomor surat"> 
										</div> /
                                        <div style="display:inline-table;"> 
                                            <select name="part[month]" id="month" style="width:120px;" class="form-control m-b">
                                                <option value="0">BULAN</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <option value="VII">VII</option>
                                                <option value="VIII">VIII</option>
                                                <option value="IX">IX</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>
                                        </div> /
                                        <div style="display:inline-table;"> 
                                            <select name="part[year]" id="year" style="width:120px;" class="form-control m-b">
                                                <option value="0">TAHUN</option>
                                                <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                                <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
                                                <option value="<?php echo date('Y')-2;?>"><?php echo date('Y')-2;?></option>
                                            </select>
                                        </div>
										<!--div id="outputbox">
										<p id="outputcontent">Choose a currency and the results will display here.</p>
									    </div-->
                                    </div>
									<div class="form-group">
                                        <label>Dari</label> 
                                        <div> <input type="text" name="val[mail_from]" id="mail_from" class="form-control" placeholder="Ketikkan asal surat"> 
										</div>
                                    </div> 
                                    <div class="form-group">
                                        <label>Tanggal Surat</label> 
                                        <div> <input class="datepicker-input form-control" name="mail_date" id="mail_date" type="text" data-date-format="dd-mm-yyyy" placeholder="Pilih tanggal"> </div>
                                    </div>                                    
                                    <div class="form-group"> 
                                        <label>Perihal</label> 
                                        <textarea class="form-control" name="val[mail_subject]" id="mail_subject" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan perihal"></textarea> 
                                    </div>									
                                </div>
                                <div class="col-sm-6">                             
                                    <div class="form-group">
                                        <label>Distribusi</label>
										<div> 
                                            <select name="val[mail_approved_by]" id="mail_approved_by" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
												<?php foreach ($users_distribution as $r) { ?>
                                                <option value="<?php echo $r->employee_id; ?>"><?php echo $r->job_title_name; ?></option>
												<?php }
													?>
                                            </select>
                                        </div>
                                    </div><br/>
                                    <div class="form-group">
                                        <label>Sifat Surat</label> 
                                        <div> 
                                            <select name="val[mail_type]" id="mail_type" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <option value="1">Biasa</option>
                                                <option value="2">Rahasia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Keterangan</label>
                                        <div>
                                            <textarea class="form-control" name="val[description]" id="description" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan keterangan"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sertakan File</label> 
                                        <div> <input type="file" name="dokumen" id="dokumen" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"> </div>
                                    </div>  
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="val[mail_approved]" id="status" class="form-control" value="0">
                                            <input type="hidden" name="val[created_by]" id="created_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                            <input type="hidden" name="val[created_date]" id="created_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                            <input type="hidden" name="val[updated_by]" id="updated_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                            <input type="hidden" name="val[updated_date]" id="updated_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Simpan</button>                            
                            <a href="<?php echo base_url('mail/inbox/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                    </section>
                    <?php
                    echo form_close();
                    ?>
                
            </div>                       
        </div>
    </section>
</section>