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
       $medicine = $_POST['medicine'];
       $category = $_POST['category'];
       $supplier = $_POST['supplier'];
       $doctor = $_POST['doctor'];
       $sheets = $_POST['sheets'];
       $quantity = $_POST['quantity'];
       $cost = $_POST['cost'];
       $price = $_POST['price'];

       $x=$sheets * $quantity;
       $y=$cost/$x;          
    
       $sqlquery = "INSERT INTO `medicines` VALUES ('$medicine', '$category', '$supplier','$y','$doctor', '$price','$x')";
       $res = mysqli_query($con,$sqlquery);


       header("Location: add-medicines.php");
       exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>ADD MEDICINES</title>

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
include "recept-sidebar.php";
?>
<div class="page-wrapper">
    <div class="content container-fluid">
    
    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Add Medicine</h3>
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
<h5 class="form-title student-info">Medicine Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Medicine Name <span class="login-danger">*</span></label>
<input name="medicine" class="form-control" type="text" placeholder="Enter Medicine Name">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>category <span class="login-danger">*</span></label>
<select class="form-control select">
<option value="" name="category">Select Category</option>
<option>Tablet</option>
<option>Ointment</option>
<option>Syrup</option>
</select>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Supplier <span class="login-danger">*</span></label>
<select name="supplier" value="" class="form-control select">
<!--<option>Select Supplier</option>
<option value="Raju">Raju</option>
<option value="">Ravi</option>
<option value="Syrup">Mahesh</option>  -->
   <?php
$query12 = " select distinct sname from `supplier`";
            $res12 = mysqli_query($con,$query12);

            while($row = mysqli_fetch_array($res12))
            {
                
             ?>
                <option> <?php echo $row['sname']; ?></option>
            <?php
             }
            ?>
</select>
</div>
</div>



<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Doctor <span class="login-danger">*</span></label>
<select name="doctor" value="" class="form-control select">
<option>Select Doctor</option>
<option>Dr. ABC</option>
<option>Dr. CDE</option>
</select>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Number Of Sheets<span class="login-danger">*</span></label>
<input name="sheets" value="" class="form-control datetimepicker" type="number" placeholder="Enter Quanity Of Sheets">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Quantity Per Sheet<span class="login-danger">*</span></label>
<input name="quantity" value="" class="form-control datetimepicker" type="number" placeholder="Enter Quanity Per sheet">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Overall Cost <span class="login-danger">*</span></label>
<input name="cost" value="" class="form-control" type="text" placeholder="Enter Overall Cost">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label> Price <span class="login-danger">*</span></label>
<input name="price" value="" class="form-control" type="number" placeholder="Enter Price To Sell">
</div>
</div>


<!-- <div class="col-12 col-sm-4">
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
<label>Expiry Date<span class="login-danger">*</span></label>
<input class="form-control datetimepicker" type="number" placeholder="Select Expiry Date Of Medicine">
</div>
</div>  -->



<!-- <div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Speciality <span class="login-danger">*</span></label>
<select class="form-control select">
<option>Please Select Speciality </option>
<option>Pediatric</option>
<option>Maternity </option>
</select>
</div>
</div>  -->


<div class="col-12">
<div class="student-submit">
<button name="submit" type="submit" class="btn btn-primary">Submit</button>
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