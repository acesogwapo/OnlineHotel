<div class="container mainbox">
		<div class="row header-info">
			Information
		</div>
		<div class = "row">
			<form action="<?php echo base_url(); ?>booking" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
				<div class = "row form-input ">
					<div class ="col-xs-5">
         				Last Name:  <input type="text" placeholder="Last Name" name="txt_cust_lname">
         			</div>
         			<div class ="col-xs-1"></div>
         			<div class ="col-xs-5">
         				First Name: <input type="text" placeholder="First Name" name="txt_cust_fname"><br>
         			</div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-xs-12 address">
         				Address: <input type="text" placeholder="Address" name="txt_cust_address"><br>
         			</div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-xs-5">
         				Contact Number: <input type="text" placeholder="Contact No. ex. +639225555555" name="txt_cust_number"><br>
         			</div>
         			<div class="col-xs-7"></div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-xs-5"></div>
         			<div class="col-xs-4">
         				<input type="submit" class="btn btn-default btn-home submit-btn "></input>
         			</div>
         			<div class="col-xs-3"></div>
         		</div>
			</form>
		</div>
</div>