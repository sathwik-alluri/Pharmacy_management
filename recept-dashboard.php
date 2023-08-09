<?php 

$con = mysqli_connect("localhost","root","", "pharmacy");

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Dashboard</title>

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
<!-- <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css"> -->

<div class="page-wrapper">
<div class="content container-fluid">
<!--
<div class="page-header">
<div class="row">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Welcome !</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Manager</li>
</ul>
</div>
</div>
</div>
</div>  -->


<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">

<div class="db-info">
<h6>Total Customers</h6>
    <?php
    $query97 = "SELECT COUNT(*) AS total FROM `customers`";
    $res97 = mysqli_query($con, $query97);
    $countData = mysqli_fetch_assoc($res97);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
 
<!-- <h3>240</h3>  -->
</div>
<div class="db-icon">
<img src="assets/img/icons/customers_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Total Suppliers</h6>
<?php
    $query96 = "SELECT COUNT(*) AS total FROM `supplier`";
    $res96 = mysqli_query($con, $query96);
    $countData = mysqli_fetch_assoc($res96);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/supplier_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Total Medicines Available</h6>
<?php
    $query95 = "SELECT COUNT(*) AS total FROM `medicines` where quantity_present > 0";
    $res95 = mysqli_query($con, $query95);
    $countData = mysqli_fetch_assoc($res95);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/medicine_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Invoices Generated</h6>
<?php
    $query94 = "SELECT COUNT(*) AS total FROM `invoices`";
    $res94 = mysqli_query($con, $query94);
    $countData = mysqli_fetch_assoc($res94);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/invoices_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div> 
</div>


<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Out Of stock</h6>
<?php
    $query93 = "SELECT COUNT(*) AS total FROM `medicines` where quantity_present=0";
    $res93 = mysqli_query($con, $query93);
    $countData = mysqli_fetch_assoc($res93);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/outofstocks_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>

<!--
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Expired</h6>
<h3>100</h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/expired_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>   -->
</div>


<!--
<div class="row">
<!--    <div class="col-xl-3 col-sm-6 col-12 d-flex">    -->

<!--
<div class="col-sm-5">
<div class="card bg-comman w-100">
<div class="card-body">
<center> <h6>TODAY'S SALES REPORT</h6> </center>
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Doctor 1</h6>
<h3>240</h3>
</div>
<!--  <div class="db-info">
<h6>Doctor 2</h6>
<h3>240</h3>  
</div>  -->
<!--
<div class="db-icon">
<img src="assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
</div>  
</div>
</div>
</div>
</div>  

</div>    -->





<div class="row">
<!--    <div class="col-xl-3 col-sm-6 col-12 d-flex">    -->

<div class="col-sm-12">
<div class="card bg-comman w-100">
<div class="card-body">
<center> <h6>TODAY'S SALES</h6> </center>

<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Doctor 1</h6>
<h3>240</h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
</div> 

<div class="db-info">
<h6>Doctor 2</h6>
<h3>360</h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
</div> 

 </div> 


</div>
</div>
</div>  
</div>



<div class="row">                       
        <div class="col-sm-12">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <!-- <i class="mdi mdi-cart-plus widget-icon"></i> -->
                            </div>
                        <a data-bs-toggle="modal" data-bs-target="#signup-modal" ><h1 style="text-align:center"><i style="font-size: 60px" class="mdi mdi-plus widget-ico"></i></h1> <!--</a> -->
                            <p class="mb-0 text-muted" style="text-align:center">
                                     <a href="edit-sellingprice.php">   Edit Selling Price Of Existing Medicine  </a>
                            </p>
                        </a>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
        </div>
</div>


<div class="row">                       
        <div class="col-sm-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <!-- <i class="mdi mdi-cart-plus widget-icon"></i> -->
                            </div>
                        <a href="" data-bs-toggle="modal" data-bs-target="#signup-modal" ><h1 style="text-align:center"><i style="font-size: 60px" class="mdi mdi-plus widget-ico"></i></h1></a>
                            <p class="mb-0 text-muted" style="text-align:center">  <a href="add-medicines.php" >Add Medicine</a>
                                <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold">Add Course</i> 1.08%</span> -->
                                <!-- <span class="text-nowrap">Since last month</span> -->
                            </p>
                        </div> <!-- end card-body-->
                </div> <!-- end card-->
        </div>


        <div class="col-sm-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <!-- <i class="mdi mdi-cart-plus widget-icon"></i> -->
                            </div>
                        <a href="" data-bs-toggle="modal" data-bs-target="#signup-modal" ><h1 style="text-align:center"><i style="font-size: 60px" class="mdi mdi-plus widget-ico"></i></h1></a>
                            <p class="mb-0 text-muted" style="text-align:center"><a href="add-supplier.php">Add Supplier</a>
                                <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold">Add Course</i> 1.08%</span> -->
                                <!-- <span class="text-nowrap">Since last month</span> -->
                            </p>
                        </div> <!-- end card-body-->
                </div> <!-- end card-->
        </div>
</div>

</body>




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

