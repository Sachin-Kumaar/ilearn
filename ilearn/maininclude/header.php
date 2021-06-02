<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>learn n earn</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"?v=<?php echo time(); ?>>
  <link rel="stylesheet" media="screen" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" media="screen" href="css/all.min.css?v=<?php echo time(); ?>">
  <link rel="preconnect" media="screen" href="https://fonts.gstatic.com">
  <link media="screen" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light pl-5 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Learn2Earn</a>
      <!-- <span class="navbar-text">Learn to Get your Placement</span> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav custam-nav pl-5">
          <li class="nav-item custam-nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item custam-nav-item">
            <a class="nav-link" href="course.php">Courses</a>
          </li>
          <li class="nav-item custam-nav-item">
            <a class="nav-link" href="paymentstatus.php">Payment Status</a>
          </li>
          <?php
              session_start();
              if(isset($_SESSION['is_login'])){
                echo '<li class="nav-item custam-nav-item">
                <a class="nav-link" href="./Student\studentProfile.php">My Profile</a>
              </li>
              <li class="nav-item custam-nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>';
              } else {
                echo'<li class="nav-item custam-nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModel">Login</a>
              </li>
              <li class="nav-item custam-nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Signup</a>
              </li>';
              }
          ?>
          <li class="nav-item custam-nav-item">
            <a class="nav-link" href="#">Feedback</a>
          </li>
          <li class="nav-item custam-nav-item">
            <a class="nav-link" href="card.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>