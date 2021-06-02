<!-- header.php -->
<?php
include('./dbConnection.php');
include('./maininclude/header.php');
?>

<div class="container-fluid rm-img-prt">
  <div class="vid-parent">
    <video playsinline autoplay muted loop height="100%" width="100%">
      <source src="vido\main.mp4">
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-cont">
    <h1 class="my-cont"> Welcome to LEARN2EARN</h1>
    <small class="my-cont">Learn and Implement</small><br>
    <?php
    if (isset($_SESSION['is_login'])) {
      echo '<a class="btn btn-primary mt-3" href="Student\studentProfile.php">My Profile</a>';
    } else {
      echo '<a href="#" class="btn btn-danger btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Started</a>';
    }

    ?>
  </div>
</div>
<div class="container-fluid bg-danger txt-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-keyboard mr-3"></i>Life Time Acess</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee*</h5>
    </div>
  </div>
</div>
<div class="container mt-5">
  <h1 class="text-center">Popular Course</h1>
  <div class="card-deck mt-4">
    <?php

    $sql = "SELECT * FROM course LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="./cousedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..','.', $row['course_img']).'" class="card-img-top" width="200" height="300" alt="!st" />
          <div class="card-body">
            <h5 class="card-title">'.$row['course_name'].'</h5>
            <p class="card-text">'.$row['course_desc'].'</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orignal_price'].'</del></small>
              <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id='.$course_id.'">Enroll</a>
          </div>
        </div>
      </a>';
      }
    }
    ?>

  </div>
  <div class="card-deck mt-4">
    <?php

    $sql = "SELECT * FROM course LIMIT 3 , 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="./cousedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..','.', $row['course_img']).'" class="card-img-top" width="200" height="300"  alt="!st" />
          <div class="card-body">
            <h5 class="card-title">'.$row['course_name'].'</h5>
            <p class="card-text">'.$row['course_desc'].'</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_orignal_price'].'</del></small>
              <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id='.$course_id.'">Enroll</a>
          </div>
        </div>
      </a>';
      }
    }
    ?>
</div>
<div class="text-center m-2">
  <a class="btn btn-danger btn-sm" href="./course.php">
    View All Course
  </a>
</div>
<!-- contact us -->
<?php
include('./maininclude/contectus.php');
?>
<!-- 
<?php
include('./testimonial-maker/include/testimonial-setting.php');
?> -->


<!-- footer.php -->

<?php
include('./maininclude/footer.php');
?>