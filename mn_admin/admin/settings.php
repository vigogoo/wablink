<?php
include "header.php";
//include "../../security.php";
?>
    <div class="col-md-9">

      <div class="content-wrapper">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <p><i class="icon-bar-chart"></i> Mini price DASHBOARD</p>
</div>
       
    <div class="main-content">
            <div class="row" >
              <div class="col-md-6" style="width:100%">
                <div class="widget">
                  <div class="widget-content-white glossed">
                    <div class="padded">
                      <form action="" role="form" method="post">
                       
                        <h3 class="form-title form-title-first"><i class="icon-user"></i> App settings</h3>
                      <p id="status" style="color:red">
						<?php
						if(isset($_POST['helpline'],$_POST['email'])){
							//var_dump($_POST); return;
							$helpline=clean_data($_POST['helpline']);
							$email=clean_data($_POST['email']);
							$currency=clean_data($_POST['currency']);
							if($helpline && $email){
								mysqli_query($conn,"UPDATE setting set setting_value='$helpline' where setting_name='help_line' ");								
								mysqli_query($conn,"UPDATE setting set setting_value='$email' where setting_name='email' ");
								mysqli_query($conn,"UPDATE setting set setting_value='$currency' where setting_name='currency' ");
								?>
								<div class="alert alert-success alert-dismissable">
                  <i class="icon-check-sign"></i> <strong>Success!</strong> Operation okay
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
								<?php
								
								}else{
								
								?>
								  <div class="alert alert-danger alert-dismissable">
                  <i class="icon-remove-sign"></i> <strong>Opps!</strong> All fields are requiredX!
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
								<?php
							}
						}					
						
							?></p>
                            <div class="form-group">
                              <label>Call center helpline</label>
                              <input type="text" name="helpline" value="<?php 
							  $sl = mysqli_query($conn,"SELECT * from setting where setting_name='help_line'");
							  $vl = mysqli_fetch_assoc($sl);
							  echo $vl['setting_value'];
							  ?>" class="form-control" placeholder="Help contact">
                            </div>
                          <div class="form-group">
                              <label>Contact email</label>
                              <input type="text" name="email" value="<?php 
							  $sl = mysqli_query($conn,"SELECT * from setting where setting_name='email'");
							  $vl = mysqli_fetch_assoc($sl);
							  echo $vl['setting_value'];
							  ?>" class="form-control" placeholder="Contact email">
                            </div>
							  <div class="form-group">
                              <label>Currency</label>
                              <input type="text" name="currency" value="<?php 
							  $sl = mysqli_query($conn,"SELECT * from setting where setting_name='currency'");
							  $vl = mysqli_fetch_assoc($sl);
							  echo $vl['setting_value'];
							  ?>" class="form-control" placeholder="Currency">
                            </div>
						<div>
						
                       <input style="margin-left:30px; background-color:#16a085;" type="submit" id="submit" onClick="validate()" class="btn btn-primary" value="Update" />
					   </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          </div>
      </div>

    </div>
  </div>
</div>

</div>
  <?php include "footer.php";?>
