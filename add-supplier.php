<?php
//include("listDBconn.php");

 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "pharmacy";

  
 // Create connection
 $con = mysqli_connect($servername, $username, $password, $dbname);
  
    if(isset($_POST['submit']))
    {
       $sname = $_POST['sname'];
       $phone = $_POST['phone'];
       $lic_num = $_POST['licnum'];
       $place = $_POST['place'];
    
       //$sqlquery = "INSERT INTO `supplier` VALUES ('$sname', '$phone', '$lic_num','$place')";

       $sqlquery =   "INSERT INTO supplier (sname, phone,licence_number,place)
       SELECT '$sname','$phone','$lic_num','$place'
       WHERE NOT EXISTS (
       SELECT 1
       FROM supplier
           WHERE sname = '$sname' AND phone = '$phone' AND licence_number = '$lic_num' AND place = '$place'
       LIMIT 1
       ) ";

       $res = mysqli_query($con,$sqlquery);


       header("Location: add-supplier.php");
       exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>ADD SUPPLIER</title>

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
    
    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Add New Supplier</h3>
    <ul class="breadcrumb">
    <!-- <li class="breadcrumb-item"><a href="fees.html">Fees</a></li>
    <li class="breadcrumb-item active">Add Fees</li> -->
    </ul>
    </div>
    </div>
    </div>
    
    <div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form method="POST">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Supplier Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Supplier Name <span class="login-danger">*</span></label>
<input name="sname" value="" class="form-control" type="text" placeholder="Enter Name" required>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Licence Number <span class="login-danger">*</span></label>
<input name="licnum" value="" class="form-control" type="text" placeholder="Enter Licence Number" required>
</div>
</div>
<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Gender <span class="login-danger">*</span></label>
<select class="form-control select">
<option>Select Gender</option>
<option>Female</option>
<option>Male</option>
<option>Others</option>
</select>
</div>
</div>  -->
<!-- <div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Age<span class="login-danger">*</span></label>
<input class="form-control datetimepicker" type="number" placeholder="Enter Age">
</div>
</div>  -->
<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Height</label>
<input class="form-control" type="number" placeholder="Enter Height of Patient">
</div>
</div>   -->
<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Weight</label>
<input class="form-control" type="number" placeholder="Enter Weight of Patient">
</div>
</div>  -->

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Place <span class="login-danger">*</span></label>
<input name="place" value="" class="form-control" type="text" placeholder="Enter Place" required>
</div>
</div> 

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Phone <span class="login-danger">*</span></label>
<input name="phone" value="" class="form-control" type="text" placeholder="Enter Phone Number" required>
</div>
</div> 

<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Speciality <span class="login-danger">*</span></label>
<select class="form-control select">
<option>Please Select Speciality </option>
<option>Pediatric</option>
<option>Maternity </option>
</select>
</div>
</div>
-->

<div class="col-12">
<div class="student-submit">
<button type="submit" class="btn btn-primary" name="submit">ADD</button>
</div>
</div>
</div>
</form>
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