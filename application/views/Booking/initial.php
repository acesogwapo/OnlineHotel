<div class="container mainbox">
		<div class="row header-info">
			Information
		</div>
		<div class = "row">
			<form action="<?php echo base_url(); ?>booking" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
				<div class = "row form-input ">
					<div class ="col-sm-2 label-pos">
         				First Name:
         			</div>
         			<div class ="col-sm-4">
         				 <input type="text" placeholder="First Name" name="txt_cust_fname" required>
                      <?php if(isset($s_error_fname)) { echo 'Invalid input'; }?>
         			</div>
         			<div class ="col-sm-2 label-pos">
         				Last Name: 
         			</div>
         			<div class ="col-sm-4">
         			 	<input type="text" placeholder="Last Name" name="txt_cust_lname" required><br>
         			</div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-sm-2 label-pos">
         				Address:
         			</div>
         			<div class = "col-sm-10">
         				<textarea placeholder="(Street.House No. , Location Name, Street Name, Barangay, City, Province)" rows="4" cols="50" name="txt_cust_address" required></textarea>
         			</div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-sm-2 label-pos">
         				Contact Number: 
         			</div>
         			<div class="col-sm-4">

         				<input type="text" placeholder="Contact No. ex. +639225555555" name="txt_cust_number" required><br>
         			</div>
         			<div class="col-sm-7"></div>
         		</div>
         		<div class = "row form-input">
         			<div class="col-sm-5"></div>
         			<div class="col-sm-4">
         				<input type="submit" class="btn btn-default btn-home submit-btn "></input>
         			</div>
         			<div class="col-sm-3"></div>
         		</div>
			</form>
		</div>
</div>