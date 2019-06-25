<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
if(isset($_POST['submit']))
  {
    $u=$_POST["date"];
$e=$_POST["item"];
$n=$_POST["amount"];
$g=$_SESSION['detsuid'];
    $query=mysqli_query($con,"insert into EXP(ID,DATE,ITEM,AMOUNT) values('$g','$u', '$e', '$n')");
    if ($query) {
    $msg="You have added your expenses";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}


 ?>


 
<html>
<head> <center><h1> ADD YOUR EXPENSES </center> </h1> </head>
<style>
body {
background-color:lightblue;
margin:50px 0px;padding:0px;
text-align:center;
align:center;
}
div.form{
width:100%;
display:block;
text-align:center;
}
form
{
display:inline-block;
margin-left:auto;
margin-right:auto;
text-align:left;
font-size:20px;
}
</style>
</head>
	


<body>

	<form role="form" action="" method="post" >
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<h2>
<center><br>

<input type="date" name="date" placeholder="Enter date" required><br>
<br>
<input type="text" name="item" placeholder="Item name"required><br>
<br>


<input type="number" name="amount" placeholder="Amount" maxlength="10" pattern="[0-9]{10}"><br>
<br>

<button type="submit" name="submit" value="submit">ADD</button>



</form>

</body>
</html> 