<?php 

$con = mysqli_connect("localhost","root","", "pharmacy");

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>MANAGE INVOICES</title>

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


<form method="POST">
<div class="student-group-form">
<div class="row">
   
<div class="col-lg-3 col-md-6">
<div class="form-group">
<input type="text" name="svalue" value="" class="form-control" placeholder="Search ...">
</div>
</div>

<div class="col-lg-2">
<div class="search-student-btn">
<button type="btn" name="search" class="btn btn-primary">Search</button>
</div>
</div>
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
<h3 class="page-title">Manage Invoices</h3>
</div>
</div>
</div>

<table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
<thead class="student-thread">

<tr>
<th>Invoice ID</th>
<th>Customer Name</th>
<th>Doctor</th>
<th>Date</th>
<th>Price</th>
<!-- <th class="text-end">Add</th>  -->
</tr>

</thead>
<tbody>

    <?php
                       if(isset($_POST['search']))
                        {
                                $value = $_POST['svalue'];

                                $query = " select * from `invoices` where CONCAT(invoice_id,customer_name,doctor,date,price) LIKE '%$value%'";
                                $res = mysqli_query($con,$query);

                                if(mysqli_num_rows($res) > 0)
                                {
                                    $c = 1;
                                    while($row = mysqli_fetch_array($res))
                                    {
                ?>
                                        <tr>
                                        <td> <?php echo $row['invoice_id']; ?> </a> </td>
                                        <td>
                                        <?php echo $row['customer_name']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['doctor']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['date']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['price']; ?></small>
                                        </td>
                    </tr>
                 <?php
                                    }
                                }

                                else{

                    ?>
                          <tr>
                            <td colspan="7">
                                    <h5><span><i></i>NO RECORD FOUND</span></h5>
                                </td>
                                <?php 
                                
                                       }
                     }  
                             
                     else
                     {


   $query = " select * from `invoices` ORDER BY `date` DESC";

   // $query = " select register_number,name,gmail,current_year,department,gender,cgpa from `students` where register_number in (select registered_students.register_number from `registered_students`) and concat(register_number,name,gmail,current_year,department,gender,cgpa) LIKE '%$value%'";
    $res = mysqli_query($con,$query);

    if(mysqli_num_rows($res) > 0)
    {
        while($row = mysqli_fetch_array($res))
        {
            
   ?>
                    <tr>
                                        <td> <?php echo $row['invoice_id']; ?> </a> </td>
                                        <td>
                                        <?php echo $row['customer_name']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['doctor']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['date']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['price']; ?></small>
                                        </td>
                    </tr>

                    <?php

            }
        }
                        else
                            {
                ?>
                       <tr>
                            <td colspan="7">
                                    <h5><span><i></i>NO RECORD FOUND</span></h5>
                                </td>
                                <?php 
                                }
                            }

                             ?>  

<!--
<tr>
<td>
</td>
<td>PRE1534</td>
<td>
<h2>
<a>MCA</a>
</h2>
</td>
<td>Lois A</td>
<td>1992</td>
<td>200</td>
<td class="text-end">
<button type="button" class="btn btn-rounded btn-info">Add</button>
</td>
</tr>

<tr>
<td>
</td>
<td>PRE2153</td>
<td>
<h2>
<a>BCA</a>
</h2>
</td>
<td>Calvin</td>
<td>1992</td>
<td>152</td>
<td class="text-end">
<button type="button" class="btn btn-rounded btn-info">Add</button>
</td>
</tr>  -->

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