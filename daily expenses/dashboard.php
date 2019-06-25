<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
?>
<html>
<body>

	<?php include_once('header.php');?>
	<?php include_once('sidebar.php');?>
<center>
<h1>Dashboard</h1>
<?php
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$sql=mysqli_query($con,"select sum(AMOUNT) as e1 from EXP where DATE='$tdate' && (ID='$userid');");
$res=mysqli_fetch_array($sql);
$row=$res['e1'];

?>

<h2>
Today's Expenses
</h2>
<br>
<?php
if($row==0)
{
echo "0";
}
else
{
echo $row;
}
?>
</center>
<div>



</body>
</html>
<?php } ?>