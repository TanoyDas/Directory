<?php

include_once('include/db_connect.php'); 
include('pagination.php');


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Directory</title>


    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  

</head>

<body>


  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="row">  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ABC Organization</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav main-nav  clear navbar-right ">
                <li><a class="navactive color_animation" href="index.php">DIRECTORY</a></li>
                <li><a class="color_animation" href="#story">HOME</a></li>
                <li> <a class="color_animation" href=""
                  data-toggle="modal" data-target="#add_data_Modal" >REGISTER</a></li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
  <br><br>


<form id="filter_form" method="post">  
  <section id="services" class="section-gray">
    <div class="container clearfix">
      <div class="row services">
        <div class="col-md-12">
          <h2 class="heading"><span> Home Builders Club <br> </span> Directory </h2>
          <hr/>
        
          <div class="row">
            <div class="col-md-1 col-sm-12" id="lable1"></div>
            <div class="col-md-1 col-sm-12" id="lable1"><id="lable1">Division</div>
            <div class="col-md-2">
              <select name="division" id="division" data-live-search="true" class="chosen selectpicker form-control" required>
              <option value="" > Select Division</option>  
              </select>
            </div>

            <div class="col-md-1 col-sm-12" id="lable1"><id="lable1">District</div>
            <div class="col-md-2">
              <select class="selectpicker form-control" name="district" id="district"  autofocus="autofocus" required>
              <option value="">Select an Option</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-12" id="lable1"><id="lable1">Service</div>
            <div class="col-md-2">
              <select class="selectpicker form-control" name="service" id="service" standard title="Select an Option" autofocus="autofocus" required>
              <option value="">Select an Option</option>
              </select>
            </div>


            <div class="col-md-2">
              <label class="control-label"></label>
              <input type="submit" name="filter" id="filter" class="btn btn-info" value="Filter">
            </div> 
          </div>
          <br>
 
          <div id="filtered_content">
            <div class="row">
            </div>
          </div>
          
          <div id="static_content">           
            <div class="row">

<?php

  $sqlget= "SELECT * FROM db_user ";
  $sqldata = mysqli_query($mysqli, $sqlget) or die('error');
  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

?>
           
              <div class="col-sm-4">
                <div class="box box-services" id="filtered_content" name="filtered_content">
                  <h4 class="heading"> <div class="name"><?php echo $row['name'];?></div></h4>
                  <p class="info">
                    <div id="phone"><?php echo $row['phone'];?></div>
                    <div id="email"><?php echo $row['email'];?></div>
                  </p> 
                </div>
              </div>           
<?php
  }
?> 
        
            </div>
            <div>
              <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
            </div>
          </div>           
        </div>
      </div>
    </section>
  </form>


  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a class="btn btn-link" href="index.php" style="float: right;" >Close</a>
          <h4 class="modal-title">Registration Form</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="insert_form">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" required="true"  class="form-control" >
            </div>          
            <div class="form-group">
              <label for="name">Phone Number</label>
              <input type="text" id="phone_no" name="phone" required="true"  class="form-control" >
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="text" id="email_id" name="email" class="form-control" >
            </div>
            <div class="form-group">
              <label for="division">Division </label>
              <select name="division1" id="division1" class="form-control"></select>
            </div>
            <div class="form-group">
              <label for="district">District </label>
              <select name="district1" id="district1" class="form-control"></select>
            </div>
            <div class="form-group">
              <label for="service">Service </label>
              <select name="service1" id="service1" class="form-control"></select>
            </div>
            <button type="submit" name="register"
              class="btn btn-success" id="enlist_btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>





<script>
  window.load=$( document ).ready(function() {
    $.ajax({
      type:'POST',
      url:'countryAjaxData.php',
      success:function(html){
        $('#division').html(html);
      }
    }); 
  });  
          
          
  $( document ).ready(function() {
    $('#division').on('change',function(){//change function on division to display all district 
      var divisionID = $(this).val();
      if(divisionID){
        $.ajax({
          type:'POST',
          url:'ajaxData.php',
          data:'division_id='+divisionID,
          success:function(html){
            $('#district').html(html);
            $('#service').html('<option value="">Select district first</option>'); 
          }
        }); 
      }
      else{
        $('#district').html('<option value="">Select division first</option>');
        $('#service').html('<option value="">Select district first</option>'); 
      }
    });
    
    $('#district').on('change',function(){//change district to display all service
      var districtID = $(this).val();
      if(districtID){
        $.ajax({
          type:'POST',
          url:'ajaxData.php',
          data:'district_id='+districtID,
          success:function(html){
            $('#service').html(html);
          }
        }); 
      }
      else{
        $('#service').html('<option value="">Select district first</option>'); 
      }
    }); 
  }); 

  $(document).ready(function(){  
    $('#filter').click(function(e){  
      e.preventDefault();
      
      var division = document.getElementById( 'division' ).value;
      var district = document.getElementById( 'district' ).value;
      var service = document.getElementById( 'service' ).value;
      if (division !='' && district !='' && service !='') {

      $.ajax({  
        url:"fetch.php",  
        type:"post",  
        data:$('#filter_form').serialize(),  
        success:function(data){  
          $('#filtered_content').children().html(data); 
          $('#static_content').hide(); 
        } 
      });
    }else{
      document.getElementById('errfn').innerHTML = "Please Select all the fields ";
    }      
    });      
  });


  window.load=$( document ).ready(function() {
    $.ajax({
        type:'POST',
        url:'countryAjaxData.php',
        success:function(html){
        $('#division1').html(html);
            
        }
    });                 
  });  
                                   
                                   
  $( document ).ready(function() {                          
      $('#division1').on('change',function(){//change function on division to display all district 
          var divisionID = $(this).val();
          if(divisionID){
              $.ajax({
                  type:'POST',
                  url:'ajaxData.php',
                  data:'division_id='+divisionID,
                  success:function(html){
                      $('#district1').html(html);
                      $('#service1').html('<option value="">Select district first</option>'); 
                  }
              }); 
          }
          else{
                  $('#district1').html('<option value="">Select division first</option>');
                  $('#service1').html('<option value="">Select district first</option>'); 
          }
      });
  
      $('#district1').on('change',function(){//change district to display all service
          var districtID = $(this).val();
          if(districtID){
              $.ajax({
                  type:'POST',
                  url:'ajaxData.php',
                  data:'district_id='+districtID,
                  success:function(html){
                      $('#service1').html(html);
                  }
              }); 
          }else{
              $('#service1').html('<option value="">Select district first</option>'); 
              }
      });       
  });
 




$(document).ready(function(){
  $('#enlist_btn').click(function(event){  
    event.preventDefault();  

    if($('#name').val() == "")  
    {  
      alert("Name is required");  
    }  
    if($('#phone_no').val() === "")  
    {  
      alert("Phone is required, fgffd");  
    }  
    else if($('#email_id').val() == "")
    {  
      alert("email is required");  
    }
    else if($('#division1').val() == "")
    {  
      alert("Division is required");  
    }
    else if($('#district1').val() == "")
    {  
      alert("District is required");  
    }
    else if($('#service1').val() == "")
    {  
      alert("Service is required");  
    }
    else{
      $.ajax({  
        url:"register.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),    
        success:function(data){  
          $('#insert_form').html(data);  
        }  
      });
    }   
  });
});

</script>


</body>
</html>