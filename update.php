<?php

require_once './connection.php';

$id=$_GET["id"];// get id from url always use _get
// echo $id;

$sql="SELECT * FROM users WHERE id=$id";

$getData= $conn->query($sql);
$user=$getData->fetchAll(PDO::FETCH_OBJ);
// print_r($food);


//////////////////////////////////////////////////////////////// 
$first_name=$mid_name=$last_name=$family_name=$email=$mobile=$date=$pwd=$pwd_conf="";
function validate_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;

 }
$emailErr="";
$nameErr_first="";
$nameErr_mid="";
$nameErr_last="";
$nameErr_family="";
$mobileErr="";
$dateErr="";
$pwdErr="";
$repPwdErr="";


 if(isset($_POST['submit'])){

 


//validate password
if (empty($_POST['pwd'])) {
  $pwdErr = "Password is required";
} 
if (strlen($_POST['pwd']) <= 8) {
  $pwdErr = "Your Password Must Contain At Least 8 Characters!";
}
elseif(!preg_match("#[0-9]+#",$_POST['pwd'])) {
  $pwdErr = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$_POST['pwd'])) {
  $pwdErr = "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match("#[a-z]+#",$_POST['pwd'])) {
  $pwdErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
}
else{
  $pwd=validate_input($_POST['pwd']);

}
///validate date
if (empty($_POST['birth-date'])) {
  $dateErr = "BirthDate is required";
}    
$regex = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
// '/^((([1-2][0-9])|([1-9]))/([2])/[0-9]{4})|((([1-2][0-9])|([1-9])|(3[0-1]))/((1[0-2])|([3-9])|([1]))/[0-9]{4})$/';
if (!preg_match($regex,$_POST['birth-date'])) {
    $dateErr="Invalid date format";
}
else{
   $date=validate_input($_POST['birth-date']);

}

 //email validate
 
 if (empty($_POST['email'])) {
     $emailErr = "Email is required";
   } else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
   {  // check if e-mail address is well-formed
      $emailErr = "Invalid email format";
    }
    else {
      # code...
      $email=validate_input($_POST['email']);

    }
     }
      /// name validation
  
      if (empty($_POST['first-name'])) {
        $nameErr_first = "first name is required";
      }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['first-name'])) {
        $nameErr_first = "Only letters and white space allowed";
      } 
       else {
        # code...   
        
        $first_name=validate_input($_POST['first-name']);

      }
      ////////////////////////////////////
      ////////////////////////////////////
      if (empty($_POST['mid-name'])) {
        $nameErr_mid = "middle name is required";
      }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['mid-name'])) {
        $nameErr_mid = "Only letters and white space allowed";
      } 
       else {
        # code...   
        
        $mid_name=validate_input($_POST['mid-name']);

      }
 ////////////////////////////////////
      ////////////////////////////////////
      if (empty($_POST['last-name'])) {
        $nameErr_last = "middle name is required";
      }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['last-name'])) {
        $nameErr_last = "Only letters and white space allowed";
      } 
       else {
        # code...   
        
        $last_name=validate_input($_POST['last-name']);

      }
 ////////////////////////////////////
      ////////////////////////////////////
      if (empty($_POST['family-name'])) {
        $nameErr_family = "middle name is required";
      }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['family-name'])) {
        $nameErr_family = "Only letters and white space allowed";
      } 
       else {
        # code...   
        
        $family_name=validate_input($_POST['family-name']);

      }
 
//validate mobile
if (empty($_POST['mobile'])) {
  $mobileErr = "Mobile number is required";
} 
if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/",$_POST['mobile'])) {
  $mobileErr = "Invalid Mobile Number";
}
else{
  $mobile=validate_input($_POST['mobile']);

}


$sql="INSERT INTO users (email,	mobile,	first_name,	mid_name	,last_name,	family_name,birth_date,	pwd) 
VALUES(:email,:mobile,:first_name,:mid_name	,:last_name,:family_name,:birth_date,	:pwd)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
$stmt->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$stmt->bindParam(':first_name',$first_name,PDO::PARAM_STR);
$stmt->bindParam(':mid_name',$mid_name,PDO::PARAM_STR);
$stmt->bindParam(':last_name',$last_name,PDO::PARAM_STR);
$stmt->bindParam(':family_name',$family_name,PDO::PARAM_STR);
$stmt->bindParam(':birth_date',$date,PDO::PARAM_STR);
$stmt->bindParam(':pwd',$pwd,PDO::PARAM_STR);
// $full_name=$first_name . $family_name;
// echo ;
$stmt->execute();
header("location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./style.css">    
<title>update</title>
    </head>
<body>

<div class="login-box">
  <h2>Update</h2>
 <form id="insertForm"  method="POST">

<label class =" label" >
    Email: 
<span class="user-box">
<input type="text" class="input" name="email" value="<?php echo $user[0]->email ?>">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $emailErr ?></h5>
</div>
</label>
<br>
<label class =" label" >
    Full Name: 
<span class="user-box">
<div class="err">
  <input type="text" class="input" name="first-name" value="<?php echo $user[0]->first_name; ?>"  placeholder="First name ">

  <h5 class="errMsg"> <?php echo $nameErr_first ?></h5>
</div>
<div class="err">
 <input type="text" class="input" name="mid-name"  value="<?php echo $user[0]->mid_name ?>" placeholder="Middle name ">
 <h5 class="errMsg"> <?php echo $nameErr_mid ?></h5>
</div>
<div class="err">
 <input type="text" class="input" name="last-name" value="<?php echo $user[0]->last_name ?>"  placeholder="Last name ">
 <h5 class="errMsg"> <?php echo $nameErr_last ?></h5>
</div>
<div class="err">
 <input type="text" class="input" name="family-name"  value="<?php echo $user[0]->family_name ?>" placeholder="Familly name ">
 <h5 class="errMsg"> <?php echo $nameErr_family ?></h5>
</div>
</span>

</label><br>
<label class =" label">
    Mobile NO: 
<span class="user-box">
<input type="text" class="input" name="mobile" value="<?php echo $user[0]->mobile ?>"  placeholder="Mobile">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $mobileErr ?></h5>
</div>
</label><br>
<label class =" label">
    Birth Date: 
<span class="user-box">
<input type="date" class="input" name="birth-date"  value="<?php echo $user[0]->birth_date ?>" placeholder="Date of Birth">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $dateErr ?></h5>
</div>
</label><br>

<label class =" label" >
    Password: 
<span class="user-box">
<input type="password" class="input" name="pwd"  value="<?php echo $user[0]->pwd ?>"  placeholder="Password">
</span>
<div class="err">
  <h5 class="errMsg"> <?php echo $pwdErr ?></h5>
</div>
</label><br>



<button type="submit" name="submit" id="submit-ptn"> Submit
</button>
</form>

<br><br><br>
</div>



</body>
</html>


