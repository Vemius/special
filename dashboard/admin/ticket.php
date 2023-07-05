<?php 
include_once 'class.crud.php';

?>
    
 <?php include 'count.php'; ?>

 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 

        <br><br><br><br><br><br><br>
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL TICKETS</a></h3>
            </div>
                     <div class="card-body">


<table id="dtBasicExample" class="table table-responsive table-striped table-sm" cellspacing="0" width="100%">
                            <thead>
		
                                <tr>
                                    <th><b>Ticket Number</b></th>
									<th><b>Sender</b></th>
									<th><b>Subject</b></th>
                                    <th><b>Message</b></th>
                                    <th><b>Date Opened</b></th>
                                    <th><b>Reply</b></th>
                                    <th><b>Delete Ticket</b></th>
                                </tr>
                            </thead>
                            <tbody>
							                                <?php
			$query = "SELECT * FROM ticket  ";       
			$records_per_page=10;
			$newquery = $crud->paging($query,$records_per_page);
			$crud->dataviewtik($newquery);
		 ?>   
                                </tbody>
                        </table>
               
               <?php $crud->paginglink($query,$records_per_page); ?>
               
               
               
               
               
        </div>
      </div>      </div>

     </div>
 
 
    
       <?php include 'foot.php'; ?>   
                 