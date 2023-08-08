<?php 

$con = mysqli_connect("localhost","root","", "pharmacy");

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>MANAGE MEDICINES STOCK</title>

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


<form method="post">
<div class="student-group-form">
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search by Medicine Name ...">
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search by Category ...">
</div>
</div>
<div class="col-lg-2">
<div class="search-student-btn">
<button name="outofstock" type="btn" class="btn btn-primary">Out Of stock</button>
</div>
</div>

<div class="col-lg-2">
<div class="search-student-btn">
<button name="runningout" type="btn" class="btn btn-primary">Running Out</button>
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
<h3 class="page-title">Manage Medicines Stock</h3>
</div>
</div>
</div>

<table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
<thead class="student-thread">


<tr>
<th>
SNo
</th>
<th>Medicine Name</th>
<th>Categoory</th>
<th>Doctor</th>
<th>Supplier</th>
<th>Quantity Present</th>
<th class="text-end">Edit</th>
</tr>
</thead>
<tbody>



           <?php

                            if(isset($_POST['outofstock']))
                            {
                                //$value = $_GET['search'];
                               // unset($row);
                               // $row = " ";


                               //$query = " select * from `list`";

                                $query = " select * from `medicines` where quantity_present = 0";
                                $res = mysqli_query($con,$query);

                                if(mysqli_num_rows($res) > 0)
                                {
                                    $c = 1;
                                    while($row = mysqli_fetch_array($res))
                                    {
                                        
                               ?>
                                        <tr>
                                        <td>
                                             <?php echo $c++ ?>
                                        </td>
                                        <td> <?php echo $row['mname']; ?> </a> </td>
                                        <td>
                                        <?php echo $row['category']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['doctor']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['sname']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['quantity_present']; ?></small>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-rounded btn-info">Edit</button>
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
                            

                       <?php }
                         }
                            /* end of isset of filter  */
       

                         elseif(isset($_POST['runningout']))
                         {
                                             $query = " select * from `medicines` where quantity_present < 10 and quantity_present != 0 " ;
                                             $res = mysqli_query($con,$query);
             
                                             if(mysqli_num_rows($res) > 0)
                                             {
                                                 $c = 1;
                                                 while($row = mysqli_fetch_array($res))
                                                 {                           
                                            ?>
                                                     <tr>
                                                     <td>
                                                          <?php echo $c++ ?>
                                                     </td>
                                                     <td> <?php echo $row['mname']; ?> </a> </td>
                                                     <td>
                                                     <?php echo $row['category']; ?></small>
                                                     </td>
                                                     <td>
                                                     <?php echo $row['doctor']; ?></small>
                                                     </td>
                                                     <td>
                                                     <?php echo $row['sname']; ?>
                                                     </td>
                                                     <td>
                                                     <?php echo $row['quantity_present']; ?></small>
                                                     </td>
                                                     <td class="text-end">
                                                         <button type="button" class="btn btn-rounded btn-info">Edit</button>
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

                            else
                            {
                                   
                                $allquery = " select * from `medicines` ";

                                $allres = mysqli_query($con,$allquery);

                                if(mysqli_num_rows($allres) > 0)
                                {
                                    $c = 1;
                                    while($row = mysqli_fetch_array($allres))
                                    {

                             ?>  
                                    <tr>
                                        <td>
                                             <?php echo $c++ ?>
                                        </td>
                                        <td> <?php echo $row['mname']; ?> </a> </td>
                                        <td>
                                        <?php echo $row['category']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['doctor']; ?></small>
                                        </td>
                                        <td>
                                        <?php echo $row['sname']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['quantity_present']; ?></small>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-rounded btn-info">Edit</button>
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
                            ?>
                                    


<!--
<tr>
<td>
</td>
<td>PRE2209</td>
<td>
<h2>
<a>Computer Science </a>
</h2>
</td>
<td>Aaliyah</td>
<td>1995</td>
<td>180</td>
<td class="text-end">
<button type="button" class="btn btn-rounded btn-info">Edit</button>
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