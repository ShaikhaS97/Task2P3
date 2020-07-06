<?php
echo "<style>background: linear-gradient(to right , #4cb8c4, #3CD3AD); </style>";
$con= new mysqli("localhost","root","","Robot");
if($con->connect_error){
  die("Coneection failed:".$con->connect_error);
}

if(isset($_POST['add'])) {	
$right=mysqli_real_escape_string($con, $_POST['right']); 
$left=mysqli_real_escape_string($con, $_POST['left']); 
$forward=mysqli_real_escape_string($con, $_POST['forward']);  

$sql="INSERT INTO Control (Righ,Lef,forward) VALUES ('$right','$left','$forward')";

}

if($con->query($sql)===TRUE){
  echo "<p style='color:green;'>Data has been Successfully Added! </p>";
   header("Refresh: 2;task2.php"); } 
 else{
  echo "ERORR";
}


 if(isset($_POST['delete']))   
    {
       foreach ($_POST["checkbox"] as $id){
       $de1 = "DELETE FROM Control WHERE PID='$id'";
       if(mysqli_query($con, $de1))
       echo "<b>Deletion Successful. </b>";
       else
       echo "ERROR: Could not execute";
       }
    }
  


  ?>