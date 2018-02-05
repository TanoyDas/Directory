<?php  

include('include/db_connect.php');
include('pagination.php');
?>
<div>
  <a class="close" href="index.php" style="color:red; " >&times;</a>
</div>
<br><br>

<?php

if($_POST){
	extract($_POST);	
	if(isset($division) and $division != '-99'){
		$sql= "SELECT * FROM db_user AS usr INNER JOIN division ON usr.division = division.division_id INNER JOIN district ON usr.district = district.district_id INNER JOIN service ON usr.service = service.service_id WHERE division = $division and district = $district and service = $service ORDER BY usr.id";
		$sql_qry = mysqli_query($mysqli, $sql);
		if($sql_qry){
			while($row = mysqli_fetch_array($sql_qry))  
       		{  
       			$name = $row['name'];
				    $email = $row['email'];
				    $phone = $row['phone'];
            $output = <<<HHH
            				<div class="col-sm-4">
                   				<div class="box box-services" id="box_data" name="box_data">
                       			<h4 class="heading"> <span class="name">$name</span></h4>
				                  <p class="info">
				                  <div id="phone">$phone</div>
				                  <div id="email">$email</div>
				                </p> 
				              </div>
				            </div>
HHH;
       	
       			if($output == ''){
       				echo 'no data found';
       			}
       			else{
       				echo $output;
				}
			}
        }
        else{
       		echo mysqli_error($mysqli);
       		echo '<br/>';
       		echo mysqli_errno($mysqli);
        }
	}
}
 
?>  