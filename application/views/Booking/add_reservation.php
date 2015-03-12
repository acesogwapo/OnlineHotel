<div class="container mainbox">
		<div class="row header-info">
         Reservation Details
		</div>
		<div class = "row">
			<form action="<?php echo base_url(); ?>booking/step2" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
               <div class = "row form-input">
                  <div class ="col-xs-2 label-pos">
                     Check In Date:
                  </div>
                  <div class ="col-xs-4">
                     <input type="date" placeholder="Check in" name="date_check_in" required><br>
                  </div>
               </div>
               <div class = "row form-input">

                  <div class ="col-xs-2 label-pos">
                     Check out Date:
                  </div>
                  <div class="col-xs-4">
                     <input type="date" placeholder="Check out" name="date_check_out" required><br>
                  </div>
               </div>
               <div class = "row">
                <div class="col-xs-5 label-form">
                  Choose a Room:
                </div>
               </div>
               <?php foreach($roomsinfo as $rooms_info){?>
               <div class = "row">
                  <div class="col-xs-2 label-pos">
                     <input type="radio" name="rad_RoomType" value="<?=$rooms_info->rooms_info_type?>">
                  </div>
                  <div class = "col-xs-4">
                     <?=$rooms_info->rooms_info_type?> (Price: <?=$rooms_info->rooms_info_price?>/ night)
                  </div>
       
                  <div class="col-xs-2 label-pos"></div>
                  <div class = "col-xs-4">
                     <?php
                        if($rooms_info->rooms_left < 5){
                              echo 'There are only <b>'. $rooms_info->rooms_left.'</b> rooms left!';
                        }

                     ?>
                  </div>
               </div>          
                <?php } ?>

               <div class="row form-group" style="padding:20px;">
                  <label for="sel1">Payment Type</label>
                  <select class="form-control" name="ddn_payment_type" style="width:30%;">
                    <option value="Cash">Cash</option>
                    <option value="Credit">Credit</option>
                  </select>

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

<script type="text/javascript">
   $(document).ready(function() {
      $('input[name="rad_RoomType"],input[name="date_check_in"],input[name="date_check_out"]').change(function(e) {
        var total = 0;
        var $row = $(this).parent();
        var RoomType = $row.find('input[name="rad_RoomType"]').val();
        var CheckIn= $row.find('input[name="date_check_in"]').val();
        var CheckOut= $row.find('input[name="date_check_out"]').val();
        var oneDay = 24*60*60*1000; 
        //var diffDays = Math.round(Math.abs((CheckOut.getTime() - CheckIn.getTime())/(oneDay)));

        total = RoomType * diffDays;
        //update the row total
        $row.find('.amount').text(total);

        var total_amount = 0;
        $('.amount').each(function() {
            //Get the value
            var am= $(this).text();
            console.log(am);
            //if it's a number add it to the total
            if (IsNumeric(am)) {
                total_amount += parseFloat(am, 10);
            }
         });
         $('.total_amount').text(total_amount);
      });
   });

</script>