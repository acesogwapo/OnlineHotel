<div class="container mainbox">
		<div class="row">
            <div class="col-sm-5">
            </div>
            <div class ="col-sm-4 header-info">
			Admin Login
            </div>
            <div class="col-sm-3"></div>
		</div>
		<div class = "row">
			<form action="<?php echo base_url(); ?>admin" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
				<div class = "row form-input ">
					<div class="col-sm-5">
         			</div>
         			<div class ="col-sm-4">
         				 <input type="text" placeholder="Username" name="txt_username" required>
         			</div>
                </div>
                <div class = "row form-input ">
         			<div class="col-sm-5"></div>
         			<div class ="col-sm-4">
         			 	<input type="password" placeholder="Password" name="txt_password" required><br>
         			</div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-sm-5"></div>
         			<div class="col-sm-4">
         				<input type="submit" class="btn btn-default btn-home submit-btn" value="login"></input>
         			</div>
         			<div class="col-sm-3"></div>
         		</div>
			</form>
		</div>
</div>