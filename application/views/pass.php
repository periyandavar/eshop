
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><a href="<?php echo base_url(); ?>Admin/index">Dashboard </a> --> <a href="#"> Change Password</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="<?php echo base_url(); ?>Admin/index">Dashboard </a> --> <a href="#"> Change Password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row" style="width:2385px">
                    <div class="col-lg-6">
                         <div class="card">
                           <div class="card-header">Chaneg Password</div>
                             <div class="card-body card-block">
                                <form action="<?php echo base_url()?>/Certificate/pass" method="post" enctype="multipart/form-data" class="">
                                      <div class="form-group">
                                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i></div>
                                     <input type="password" id="username" name="pass1" placeholder="Old Password" class="form-control">
                             </div>
                             </div>
                              <div class="form-group">
                                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i></div>
                                     <input type="password" id="username" name="pass2" placeholder="New Password" class="form-control">
                             </div>
                             </div>
                              <div class="form-group">
                                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i></div>
                                     <input type="password" id="username" name="pass3" placeholder="Confirm Password" class="form-control">
                             </div>
                             </div>
                           
                                                  
                            <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                                 </form>
                             </div>
                         </div>
                    </div>
             </div>
             
</div></div>