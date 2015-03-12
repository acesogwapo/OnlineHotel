<div class="container mainbox">
   <?php if($s_page_title == 'Admin' && $this->session->userdata('o_admin') != NULL){ ?>
            <div class="row" style="position: float;">
               <a href="<?=base_url()?>admin/logout">Logout</a>
            </div>
   <?php } ?>
      <div class="row">
            <div class="col-sm-5">
            </div>
            <div class ="col-sm-4 header-info">
                Reservations
            </div>
            <div class="col-sm-3"></div>
      </div>
      <div class = "row">
            <?php
              if(isset($a_table_project_data) && $a_table_project_data != NULL){
            ?>

            <div class="intro-project-table pagination col-xs-7" id="phrase"> 
                  <table class = "dataTable  table table-content-custom" id="keywords" cellspacing="0" cellpadding="0">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Date Created</th>
                           <th>Check - In Date</th>
                           <th>Check - Out Date</th>
                           <th>Payment Type</th>
                           <th>Confirmation Code</th>
                           <th>Total Payment</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                        $i_count = 0;
                        foreach($a_table_project_data as $key => $value){
                        echo'
                           <tr>
                              <td> '.$value->reservation_id.' </td>
                              <td> '.$value->reservation_date.' </td>
                              <td> '.$value->reservation_checkin.' </td>
                              <td> '.$value->reservation_checkout.' </td>
                              <td> '. $value->payment_type.' </td>
                              <td> '. $value->reservation_confirmation_code.' </td>
                              <td> '. $value->reservation_totalpayment.' </td>              
                              <td><a href ="'.base_url().'admin/delete/'.$value->reservation_id.'"><button class="btn btn-success btn-sm">Cancel</button></td>
                           </tr>';
                        $i_count++;
                        }
            ?>
                     </tbody>
                  </table>
            </div>
         <?php   }else{ ?>
            <div class="row">
               <p> You currently have no reservation </p>
            </div>

         <?php }?>
      </div>
</div>