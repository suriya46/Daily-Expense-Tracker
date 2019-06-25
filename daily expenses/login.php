<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if(isset($_POST['submit'])){
$n=$_POST["email"];
$p=$_POST["password"];

$sql = mysqli_query($con,"SELECT ID FROM users where EMAIL='$n' and PASSWORD = '$p' ");

    $ret=mysqli_fetch_array($sql);
    if($ret>0){
     $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
else
{
echo 'emailid and password incorrect';
}
}

?>
<html>

<style>
body {
background-color:lightgreen;
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
<body>
<div class="form">
<form role="form" action="" method="post"><center><h2>

<input type="email" name="email"  placeholder="Emailid" required><br>
<br>

<input type="password" name="password" placeholder="Password" required><br>
<br>
<button type ="submit" name="submit" value="submit">Login<br>
</form>
</h2>


</center>
</form>
<div>
</body>
</html> 