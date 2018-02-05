<?php
//Include database configuration file
include('include/db_connect.php');

if(isset($_POST["division_id"]) && !empty($_POST["division_id"])){
    //Get all district data
    $query = $mysqli->query("SELECT * FROM district WHERE division_id = ".$_POST['division_id']." AND status = 1 ORDER BY district_name ASC");
    //Count total number of rows
    $rowCount = $query->num_rows;
    //Display district list
    if($rowCount > 0){
        echo '<option value="">Select district</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
        }
    }
    else{
        echo '<option value="">District not available</option>';
    }
}

if(isset($_POST["district_id"]) && !empty($_POST["district_id"])){
    //Get all service data
    $query = $mysqli->query("SELECT * FROM service WHERE status = 1 ORDER BY service_name ASC");
    //Count total number of rows
    $rowCount = $query->num_rows;
    //Display service list
    if($rowCount > 0){
        echo '<option value="">Select service</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['service_id'].'">'.$row['service_name'].'</option>';
        }
    }
    else{
        echo '<option value="">Service not available</option>';
    }
}

?>
