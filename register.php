<?php

include_once('include/db_connect.php');

if(isset($_POST)){
    extract($_POST);

    if(!empty($_POST))
    {
     $output = '';
        $name = mysqli_real_escape_string($mysqli, $_POST["name"]);  
        $phone = mysqli_real_escape_string($mysqli, $_POST["phone"]);  
        $email = mysqli_real_escape_string($mysqli, $_POST["email"]);  
        $division = mysqli_real_escape_string($mysqli, $_POST["division1"]);  
        $district = mysqli_real_escape_string($mysqli, $_POST["district1"]);
        $service = mysqli_real_escape_string($mysqli, $_POST["service1"]);
        $query = "
        INSERT INTO db_user(name, phone, email, division, district, service)  
         VALUES('$name', '$phone', '$email', '$division', '$district', '$service')
        ";
        if(mysqli_query($mysqli, $query))
        {
            $output .= '<label class="text-success">Data Inserted</label>';         
        }
        echo $output;
    }
}

?>


