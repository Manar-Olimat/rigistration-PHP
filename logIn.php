<?php
require_once './connection.php';







function validate_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;

 }
$emailErr="";
$pwdErr="";
if(isset($_POST['submit']))
{
$email=validate_input($_POST['email']);
$pwd="";
$sql="SELECT * FROM users WHERE email='$email'";

$getData= $conn->query($sql);
$user=$getData->fetchAll(PDO::FETCH_ASSOC);
	//email validate
 
if ($user) {
	$email=validate_input($_POST['email']);

}
	else{
		$emailErr="Email does not exist!";

	}
	//validate password
if($user['pwd']!==$_POST['pwd'])
{
	$pwdErr="Wrong Password";
}
else
{	$pwd=validate_input($_POST['pwd']);
}

$full_name=$user['first_name'].$user['family_name'];
// echo ;
if($email =="admin@gmail.com")
{
	header("location: admin.php?fullName=$full_name");

}
else{
header("location: welcome.php?fullName=$full_name");

}
}
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">    
<title>log-in</title>
    </head>
<body>
<div class="login-box">
  <h2>Sign-Up</h2>
 <form id="insertForm"  method="POST">

<label class =" label" >
    Email: 
<span class="user-box">
<input type="text" class="input" name="email" required placeholder=" Email">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $emailErr ?></h5>
</div>
</label>
<br>
<label class =" label" >
    Password: 
<span class="user-box">
<input type="password" class="input" name="pwd" required placeholder="Password">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $pwdErr ?></h5>
</div>
</label><br>



<button type="submit" name="submit" id="submit-ptn"> Log In
</button>
</form>

<br><br><br>
</div>



</body>
</html>