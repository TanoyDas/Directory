<?php
//fetch all division data from database
//Include database configuration file
include('include/db_connect.php');

    $query = $mysqli->query("SELECT * FROM division WHERE status = 1 ORDER BY division_name ASC");
    // select all division from database 
    //Count total number of rows
    $rowCount = $query->num_rows;
    //Display district list
    if($rowCount > 0){
	    echo '<option value="">Select Division</option>';
        // initial message display{   
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
            // select service id & name from division table
        }
    }
	else{
        echo '<option value="">Division Not Available</option>'; //display when no data!
	}



?>
