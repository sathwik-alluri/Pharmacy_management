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
       //$category = $_POST['category'];
       $supplier = $_POST['supplier'];
       $doctor = $_POST['doctor'];
       $sheets = $_POST['sheets'];
       $quantity = $_POST['quantity'];
       $cost = $_POST['cost'];
      // $price = $_POST['price'];
       $d=date("d/m/y");

       $x=$sheets * $quantity;
       $y=$cost/$x;    
       
       

       $query = "SELECT mname,sname,doctor FROM medicines WHERE mname = '$medicine' AND sname = '$supplier' AND doctor = '$doctor'";
       $result = mysqli_query($con,$query);
       
         if (!(mysqli_num_rows($result) > 0)) 
         {    

            function function_alert($message)
            {      
           echo "<script type ='text/JavaScript'>";  
           echo "alert('$message')";  
           echo "</script>";   
            }   
           function_alert("Medicine Does not Exist");

     }
        else 
        {
            $sqlquery = "UPDATE `medicines` SET `quantity_present`= `quantity_present` + " . (int)$x . " WHERE mname = '$medicine' and sname = '$supplier' and doctor = '$doctor'";
            $res = mysqli_query($con,$sqlquery);

            
            $sqlquery99 = "INSERT INTO `purchase` VALUES ('$medicine', '$supplier','$d','$doctor', '$x','$cost')";
            $res99 = mysqli_query($con,$sqlquery99);


             header("Location: add-old-medicine.php");
             exit();
        }
        
        
      // $sqlquery99 = "INSERT INTO `purchase` VALUES ('$medicine', '$supplier','$d','$doctor', '$x','$cost')";
      // $res99 = mysqli_query($con,$sqlquery99);

       //header("Location: add-new-medicines.php");
       //exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>ADD EXISTING MEDICINES</title>

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
    <h3 class="page-title">Add Existing Medicine</h3>
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

<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Medicine Name <span class="login-danger">*</span></label>
<input name="medicine" class="form-control" type="text" placeholder="Enter Medicine Name" required>
</div>
</div>   -->


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Medicine<span class="login-danger">*</span></label>
<select name="medicine" value="" class="form-control select" required>
   <?php
$query12 = " select distinct mname from `medicines`";
            $res12 = mysqli_query($con,$query12);

            while($row = mysqli_fetch_array($res12))
            {
                
             ?>
                <option> <?php echo $row['mname']; ?></option>
            <?php
             }
            ?>
</select>
</div>
</div>



<!--<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>category <span class="login-danger">*</span></label>
<select class="form-control select">
<option value="" name="category">Select Category</option>
<option>Tablet</option>
<option>Ointment</option>
<option>Syrup</option>
</select>
</div>
</div>  -->


<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Category <span class="login-danger">*</span></label>
<select name="category" value="" class="form-control select">
<option>Select Category</option>
<option>Tablet</option>
<option>Ointment</option>
</select>
</div>
</div>   -->


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Supplier <span class="login-danger">*</span></label>
<select name="supplier" value="" class="form-control select" required>
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
<select name="doctor" value="" class="form-control select" required>
<option>Select Doctor</option>
<option selected>Dr. ABC</option>
<option>Dr. CDE</option>
</select>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Number Of Sheets or Units<span class="login-danger">*</span></label>
<input name="sheets" value="" class="form-control datetimepicker" type="number" placeholder="Enter Quanity " reequired>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Quantity Per Sheet or Unit<span class="login-danger">*</span></label>
<input name="quantity" value="" class="form-control datetimepicker" type="number" placeholder="Enter Quanity Per Unit" required>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Overall Cost <span class="login-danger">*</span></label>
<input name="cost" value="" class="form-control" type="text" placeholder="Enter Overall Cost" required>
</div>
</div>   


<!--
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label> Price <span class="login-danger">*</span></label>
<input name="price" value="" class="form-control" type="number" placeholder="Enter Price To Sell" required>
</div>
</div>   -->



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