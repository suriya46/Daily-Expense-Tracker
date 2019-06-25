<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
if(isset($_POST['submit']))
  {
    $u=$_POST["username"];
$e=$_POST["email"];
$n=$_POST["number"];
$p=$_POST["password"];

    $ret=mysqli_query($con, "select EMAIL from users where EMAIL='$e' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con,"insert into users(USERNAME,EMAIL,NUMBER,PASSWORD) values('$u', '$e', '$n', '$p' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>


 
<html>
<head> <center><h1> SIGNUP </center> </h1> </head>
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
	<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>

<body>
<div class="form">
	<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<h2>
<center><br>

<input type="text" name="username" placeholder="Full Name" required><br>
<br>
<input type="email" name="email" placeholder="Email-id"required><br>
<br>


<input type="text" name="number" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}"><br>
<br>

<input type="password" name="password" placeholder="Password" required><br>
<br>
<input type="password" name="repeatpassword" placeholder="Repeat Password" required ><br>
<br>
<button type ="submit" name="submit" value="submit">Register</button>
<br>
<a href="login.php">Already have an account?</a>

</center>
</form>
</div>
</body>
</html> 