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
        <p class="h4 font-thin m-r m-b-sm">Tambah Unit</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">                
                <form data-validate="parsley" action="<?php echo base_url('master/unit/create'); ?>"  method="post">
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Formulir Unit </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Biro</label> 
                                        <div> 
                                            <select name="val[department_id]" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <?php foreach ($data_department as $r) { ?>
                                                    <option value="<?php echo $r->department_id; ?>"><?php echo $r->department_name; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>     
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Bagian</label> 
                                        <div> 
                                            <select name="val[division_id]" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <?php foreach ($data_division as $r) { ?>
                                                    <option value="<?php echo $r->division_id; ?>"><?php echo $r->division_name; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Sub Bagian</label> 
                                        <div> 
                                            <select name="val[sub_division_id]" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <?php foreach ($data_subdivision as $r) { ?>
                                                    <option value="<?php echo $r->sub_division_id; ?>"><?php echo $r->sub_division_name; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Unit</label> 
                                        <div> 
                                            <input type="text" name="val[unit_name]" id="division_name" class="form-control" placeholder="Ketikkan nama unit" data-required="true">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6">                                     
                                    <div class="form-group">
                                        <label>Keterangan</label> 
                                        <div> 
                                            <input type="text" name="val[description]" id="description" class="form-control" placeholder="Ketikkan keterangan">
                                        </div>
                                    </div>
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="val[status]" id="status" class="form-control" value="1">
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
                            <a href="<?php echo base_url('master/subdivision/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                    </section>
                </form>                
            </div>                       
        </div>
    </section>
</section>