<?php 
require_once './connection.php';

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
      Welcome!</h1>
    <!-- Description -->
    <p class="overlay__description">
      This is a registration system.
      If you already have an account, then click <strong> Log-in</strong> Button below.
       Or else bress<strong> Sign-up </strong>to create new account.
    </p>
    <!-- Buttons -->
    <div class="overlay__btns">

    <form action="logIn.php" method="post">

    <button class="overlay__btn overlay__btn--transparent">

          Log-In
        </a>
      </button>
    </form>
    <form action="signUp.php" method="post">

<button class="overlay__btn overlay__btn--colors">
      Sign-Up
      </button>

    </form>
      

      
    </div>
  </div>
</div>
</body>
</html>