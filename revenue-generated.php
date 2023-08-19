<?php 

$con = mysqli_connect("localhost","root","", "pharmacy");

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>REVENUE GENERATED</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<div class="main-wrapper">
<?php
include "manager-sidebar.php";
?>
<div class="page-wrapper">
<div class="content container-fluid">


<form method="post">
<div class="student-group-form">
<div class="row">
    
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Enter Start Date <span class="login-danger"></span></label>
<input name="sdate" value="" class="form-control" type="text" placeholder="D/M/Y">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Enter End Date <span class="login-danger"></span></label>
<input name="edate" value="" class="form-control" type="text" placeholder="D/M/Y">
</div>
</div>

<div class="col-lg-2">
<div class="search-student-btn">
<button name="dates" type="btn" class="btn btn-primary">Generate</button>
</div>
</div> 


<div class="col-lg-2">
<div class="search-student-btn">
<button name="last7" type="btn" class="btn btn-primary">Last 7 Days</button>
</div>
</div>   


</div>

<!-- <div class="row">  -->
    <!--
<div class="col-lg-2">
<div class="search-student-btn">
<button name="last7" type="btn" class="btn btn-primary">Last 7 Days</button>
</div>
</div>    --> 
<!--
<div class="col-lg-2">
<div class="search-student-btn">
<button name="last30" type="btn" class="btn btn-primary">Last 30 Days</button>
</div>
</div>  -->
<!-- </div>  -->

</div>
</div>
</form>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Revenue Generated In Rupees</h3>
</div>
</div>
</div>

<table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
<thead class="student-thread">


<tr>
   
<th>Doctor 1</th>
<th>Doctor 2</th>
<!-- <th>Supplier</th>  -->
</tr>
</thead>
<tbody>
            
         <?php
                
                if(isset($_POST['dates']))
                {
                
                    $sdate = $_POST['sdate'];
                    $edate = $_POST['edate'];

                    if (empty($sdate) || empty($edate)) 
                    {
                        //echo "Please fill in all fields before submitting.";
                          function function_alert($message)
                          {      
                                 echo "<script type ='text/JavaScript'>";  
                                    echo "alert('$message')";  
                                echo "</script>";   
                          }   
                          function_alert("ENTER ALL FIELDS FOR SUCCESSFUL GENERATION Of REVENUE");

                    }

                    $query = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` >= '$sdate' AND `date` <= '$edate' AND `doctor` = 'Dr. ABC'";
                    $res = mysqli_query($con, $query);  
                    if ($res) 
                    {
                          $countData = mysqli_fetch_assoc($res);
                          $count = $countData['total'];
                   } 
                   else 
                   {
                         // Handle error here
                         $count = 0; // Default value in case of error
                     }
                  

                    $query2 = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` >= '$sdate' AND `date` <= '$edate' AND `doctor` = 'Dr. CDE'";
                    $res2 = mysqli_query($con, $query2);  
                    if ($res2) 
                    {
                               $countData2 = mysqli_fetch_assoc($res2);
                               $count2 = $countData2['total'];
                        } 
                        else {
                              // Handle error here
                              $count2 = 0; // Default value in case of error
                             }
                   
                    ?>
                              <tr>
                                      
                              <td> &#8377; <?php echo $count; ?> </a> </td>
                              <td> &#8377; <?php echo $count2; ?> </a> </td>
                  
                                 </tr>
                <?php

                    
                  }

                  else if(isset($_POST['last7']))
                            {
                            
                                        $sevenDaysAgo = date("d/m/y", strtotime("-7 days"));

                                        $query = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` >= '$sevenDaysAgo' AND `date` <= CURDATE() AND `doctor` = 'Dr. ABC'";
                                        $res = mysqli_query($con, $query);
                                        
                                        if ($res) 
                                        {
                                            $countData = mysqli_fetch_assoc($res);
                                            $count = $countData['total'];
                                        } 
                                        else 
                                        {
                                            // Handle error here
                                            $count = 0; // Default value in case of error
                                        }



                                        $sevenDaysAgo = date("d/m/y", strtotime("-7 days"));

                                        $query2 = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` >= '$sevenDaysAgo' AND `date` <= CURDATE() AND `doctor` = 'Dr. CDE'";
                                        $res2 = mysqli_query($con, $query2);

                                        if ($res2) {
                                                $countData2 = mysqli_fetch_assoc($res2);
                                                $count2 = $countData2['total'];
                                        } else {
                                                                  // Handle error here
                                                          $count2 = 0; // Default value in case of error
                                                }

                                        
               ?>
                                        <tr>
                                      
                                        <td> &#8377; <?php echo $count ?> </a> </td>
                                        <td> &#8377; <?php echo $count2 ?> </a> </td>
                            
                                           </tr>
                       <?php

                                   // }
                            }
                          

                            else
                            {
                                   
                                $today = date("d/m/y");

                            $query1 = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` = '$today' AND `doctor` = 'Dr. ABC'";
                            $res1 = mysqli_query($con, $query1);

                            if ($res1) {
                                    $countData = mysqli_fetch_assoc($res1);
                                    $count = $countData['total'];
                            } else {
                                                      // Handle error here
                                              $count = 0; // Default value in case of error
                                    }   

                                
                                    $today = date("d/m/y");

                            $query2 = "SELECT COALESCE(SUM(price), 0) AS total FROM `invoices` WHERE `date` = '$today' AND `doctor` = 'Dr. CDE'";
                            $res2 = mysqli_query($con, $query2);
        
                                    if ($res2) {
                                            $countData2 = mysqli_fetch_assoc($res2);
                                            $count2 = $countData2['total'];
                                    } else {
                                                              // Handle error here
                                                      $count2 = 0; // Default value in case of error
                                            }  
                             ?>  
                                   <tr>
                                      
                                   <td> &#8377; <?php echo $count; ?> </a> </td>
                              <td> &#8377; <?php echo $count2; ?> </a> </td>
                          
                                         </tr>
                                       
                    </tr>
                             
                            <?php 
                                }
                                
                            ?>
                                  

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>