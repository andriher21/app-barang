
<div class="container-fluid ">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
           
            <div class="card card-primary o-hidden border-0 shadow-lg my-5">
            <p class="h5 font-weight-bold text-center mt-5"> Daftar untuk memulai</p>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <h1 class="h4 text-gray-900 mb-4">Login Admin</h1> -->
                                    <?= session('message');  ?>
                                </div>
                                <form class="user" >
                                    <div class="form-group row">
                                    
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Username"class="form-control form-control-user" id="username" name="username" >
                                            <div class="invalid-feedback errorusername"> </div>                                      
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" placeholder="Password"class="form-control form-control-user" id="password" name="password">
                                            <div class="invalid-feedback errorpassword">  </div>                                                 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Fullname</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Fullname"class="form-control form-control-user" id="fullname" name="fullname">
                                            <div class="invalid-feedback errorfullname"></div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" onclick="save()" class="btn btn-danger btn-user btn-block">
                                       Sign In
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>
