
<div class="container-fluid employee-attendance-data-summary">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
       
        </div>
        <div class="col-4">
        <!-- <button class="btn btn-sm btn-primary data-daterangepicker float-right">&nbsp; <i class="fas fa-calendar-alt mr-2"></i> Date &nbsp;</button>
           -->
    </div>
       
    </div>
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <br>
                <div>
                 <a href="<?= base_url('/jenisbarang')?>" class="h-6 font-weight-bold ">Daftar Barang > Tambah Barang</a>
                <br>
                <br>
               
                <form class="form">
                        <div class="form-group ">
                            <label>Nama Jenis Barang</label>
                            <input type="text" class="form-control" id="name" name="name" required>  
                            <div class="invalid-feedback errorname">
                            </div>
                    </div>
                 
                        <div class="row">
                            
                            <div class="col-sm-2">
                            <a href="<?= base_url('/jenisbarang')?>"class="btn btn-outline-primary  btn-block " role="button">Batalkan </a>
                            
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="save()" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                            <div class="col-sm-8"></div>
                        </div>
                   </form>

              
                
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>


</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>