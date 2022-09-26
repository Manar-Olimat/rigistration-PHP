




<?php
require_once './connection.php';

$sql="SELECT * FROM users";

$getData= $conn->query($sql);
$users=$getData->fetchAll(PDO::FETCH_ASSOC);

// print_r($food);
?>




<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
    <title>Admin</title></head>

<body>


<table class="table">
  
    <tr>
      <th >Id</th>
      <th ><th>Name</th>
</th>
<th >Email</th>
      <th >Password</th> 
      <th >Edit</th>
      <th >Delete</th>
    </tr>
    <?php 
    foreach($users as $user){

    
    ?>
  <tr> 
<td >

<?php echo $user['id'];?></td>
<td ><?php echo $user['first_name'];?></td>
<td ><?php echo $user['email'];?></td>
<td ><?php echo $user['pwd'];?></td>
<td><a href="update.php?id=<?php echo $user['id'];?>"> Edit</a></td>
<td><a href="delete.php?id=<?php echo $user['id'];?>">Delete </a></td>
  </tr>
  <?php 
  }?>
</table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>