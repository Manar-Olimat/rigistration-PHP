<?php 
require_once './connection.php';
$fullName=$_GET["fullName"];// get id from url always use _get
// echo $id;

// $sql="SELECT first_name,family_name FROM users WHERE id=$id";

// $getData= $conn->query($sql);
// $user=$getData->fetchAll(PDO::FETCH_ASSOC);
// print_r($food);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./style.css">
<title>Welcome</title>
    </head>
<body><!-- Canvas -->
<canvas class="orb-canvas"></canvas>
<!-- Overlay -->
<div class="overlay">
  <!-- Overlay inner wrapper -->
  <div class="overlay__inner">
    <!-- Title -->
    <h1 class="overlay__title">
      Welcome <?php echo $fullName;?>! <br> YOU DID IT!!</h1>
    <!-- Description -->
    <p class="overlay__description">
      This is a registration system.
      If you already have an account, then click <strong> Log-in</strong> Button below.
       Or else bress<strong> Sign-up </strong>to create new account.
    </p>
    <!-- Buttons -->
    <div class="overlay__btns">

    <form action="index.php" method="post">

    <button class="overlay__btn overlay__btn--transparent">

          Log-Out
        </a>
      </button>
    </form>
  
      

      
    </div>
  </div>
</div>
</body>
</html>