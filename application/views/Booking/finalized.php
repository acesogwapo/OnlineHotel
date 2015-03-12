<div class="container mainbox">
		<div class="row header-info">
         Final Details
		</div>
    <?php if(isset($reservation_info) && $reservation_info->payment_type == 'Credit'){ ?>
		<div class = "row">
			<form action="<?php echo base_url(); ?>booking/step3" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >   
                <div class="row form-input">
                  <div class ="col-sm-2 label-pos">
                   Credit Card No.
                  </div>
                  <div class ="col-sm-4">
                    <input type="text" name="txt_cc_no" required>
                  </div>
                </div>
                <div class="row form-input">
                  <div class ="col-sm-2 label-pos">
                   Pin No.
                  </div>
                  <div class ="col-sm-4">
                    <input type="text" name="txt_cc_pin" required>
                  </div>
                </div>
               <div class="row form-input">
                  <div class ="col-sm-2 label-pos">
                   Expiration Date
                  </div>
                  <div class ="col-sm-4">
                    <input type="date" name="date_cc_expiration" required>
                  </div>
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
      <?php  } else {

              echo '<div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-sm-11">
                        <p> You have Chosen Cash as form of payment. Please pay in the front desk when you check in</p>
                        <a href="'.base_url().'booking/complete">Click Here</a> to proceed to the next page.
                      </div>
                    </div>';
      } ?> 

                <div class = "row" style="margin: 20px;">
                  <div class="col-xs-5" style="font-size:21px;">
                     Total Payment: <?= (isset($reservation_info->reservation_totalpayment))?  $reservation_info->reservation_totalpayment :  0;?> PHP
                  </div>
                  <div class="col-xs-7"></div>
               </div>

              <div class = "row" style="margin: 20px;">
                  <div class="col-xs-7"><i> *It is a standard that check in and check out dates starts and ends at 12 NN of their specific dates </i></div>
              </div>
</div>
