<!-- Begin Page Content -->
<div class="container-fluid produk">
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

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <br>
                <div>
              <h6 class="m-0 font-weight-bold text-black">Daftar Barang</h6>
                </div>
                <br>
    

              <div class="row mb-2">
                        <div class="col-4">
                            <div class="input-group">
                                <input type="text" id="searchbox" class="form-control" placeholder="Cari User
                                ">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search text-danger"></i></span>
                                    </div>
                            </div>
                            
                        </div>
                            <div class="col-2">
                                    
                                    </div>
                                <div class="col-2"></div>
                            <div class="col-4 text-right">
                            <div class="btn-group group-action-area ">
                                
                            </div>
                            </div>
                        </div>
                        <br>
                <div class="card shadow mb-4">
               
                    <div class="card-body">
                      
                        <div class="table-responsive">
                            <table class="table table-striped dataTable" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> Username</th>
                                        <th> Fullname</th>
                                        <th width ="5px">Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($user as $u) : ?>
                                            <tr>
                                           <td><?= $u['username']; ?></td>
                                            <td><?= $u['fullname']; ?></td>
                                            
                                            <td>
                                                <div class="custom-control custom-switch">
                                                     <input type="checkbox" name="whitelist" class="custom-control-input toggle-status" id="customSwitch<?= $u['id_user'] ?>" data-id="<?= $u['id_user'] ?>" <?= $u['is_active'] == '1' ? 'checked="true"' : ''; ?>>
                                                     <label class="custom-control-label" for="customSwitch<?= $u['id_user'] ?>"></label>
                                                </div>
                                        </td>
                                            </tr>
                                        <?php endforeach ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>
    <!-- Delete Modal -->
     <div class="modal fade" id="confirmation-dialog" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body confirmation-dialog-notice"> Do you want to continue?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-shadow btn-confirmation-dialog-yes" data-dismiss="modal" data-url="javascript:;">
                        <i class="fa fa-trash m-r-5"></i> Yes
                    </button>
                    <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete Modal -->

</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>

