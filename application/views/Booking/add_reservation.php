<div class="container mainbox">
		<div class="row header-info">
         <?php
            if(isset($roomsinfo)){
               print_r($roomsinfo);
            }
         ?>
         Reservation Details
		</div>
		<div class = "row">
			<form action="<?php echo base_url(); ?>booking/step2" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
               <div class = "row form-input">
                  <div class ="col-xs-5">
                     Check In Date: <input type="date" placeholder="First Name" name="date_check_in"><br>
                  </div>

                  <div class ="col-xs-1"></div>
                  <div class="col-xs-5">
                     Check out Date: <input type="date" placeholder="Address" name="date_check_out"><br>
                  </div>
               </div>
               <div class = "row">
                <div class="col-xs-5 label-form">
                  Choose a Room:
                </div>
               </div>
               <div class = "row">
                  <div class="col-xs-5">
                     <input type="radio" name="rad_RoomType" value="Bungalow">Bungalow (Price: PHP 3000 / night) <br>
                  </div>
               </div>
               <div class = "row">
                  <div class="col-xs-12">
                     <input type="radio" name="rad_RoomType" value="Deluxe">Deluxe (Price: PHP 6000 / night) <br>
                  </div>
               </div>
               <div class = "row">
                  <div class="col-xs-12">
                     <input type="radio" name="rad_RoomType" value="Executive">Executive (Price: PHP 10000 / night) <br>
                  </div>
               </div>
                <div class = "row">
                  <div class="col-xs-12">
                     <input type="radio" name="rad_RoomType" value="Presidential Suite">Presidential Suite(Price: PHP 10000 / night) <br>
                  </div>
               </div>
               <div class = "row" style="margin: 20px;">
                  <div class="col-xs-7"></div>
                  <div class="col-xs-5" style="font-size:21px;">
                     Total Payment: <?= (isset($reservation_total))?  $reservation_total :  0;?> PHP
                  </div>
               </div>
               <div class = "row form-input">
                  <div class="col-xs-5"></div>
                  <div class="col-xs-4">
                     <input type="submit" class="btn btn-default btn-home submit-btn "></input>
                  </div>
                  <div class="col-xs-3"></div>
               </div>
               <div class = "row" style="margin: 20px;">
                  <div class="col-xs-7"><i> *It is a standard that check in and check out dates starts and ends at 12 NN of their specific dates </i></div>
               </div>
         </form>
      </div>
</div>