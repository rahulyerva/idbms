<?php
session_start();
include("config.php");
$sql1 = 'SELECT userid, daccno, dbalance FROM debitaccount';
   $sql2 = 'SELECT userid, caccno, cbalance FROM creditaccount';
   $retval1 = mysqli_query( $con,$sql1);
   $retval2 = mysqli_query( $con,$sql2);
   
   if(! $retval1 ) {
      die('Could not get data: ' . mysqli_error($con));
   }
   
   while($row = mysqli_fetch_assoc($retval1)) {
      echo "USER ID :{$row['userid']}  <br> ".
         "Debit Account Number : {$row['daccno']} <br> ".
         "Debit Account Balance : {$row['dbalance']} <br> ".
         "--------------------------------<br>";
   }
   
   while($row = mysqli_fetch_assoc($retval2)){
         echo "USER ID :{$row['userid']}  <br> ".
         "Credit Account Number : {$row['caccno']} <br> ".
         "Credit Account Balance : {$row['cbalance']} <br> ".
         "--------------------------------<br>";   
         } 
         
   
   mysqli_close($con);

?>


<html>
    <h1> This is admin </h1>
    <p><a href="logout.php" target="self">logout</a></p>
</html>

