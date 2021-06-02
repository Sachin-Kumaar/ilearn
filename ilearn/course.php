<!-- header.php -->
<?php
include('./dbConnection.php');
include('./maininclude/header.php');
?>

<!--header end  -->

<!-- banner -->

<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./image/main.jpg" alt="course" style="height: 500px; width: 100%; object-fit:cover;
    box-shadow:10px;" />
  </div>
</div>


<!-- banner end -->

<div class="container mt-5">
  <h1 class="text-center">All Course</h1>
  <div class="row mt-4">
    <?php

    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
        <div class="col-sm-4 mb-4">
            <a href="./cousedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" width="200" height="300" alt="!st" />
          <div class="card-body">
            <h5 class="card-title">' . $row['course_name'] . '</h5>
            <p class="card-text">' . $row['course_desc'] . '</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_orignal_price'] . '</del></small>
              <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id=' . $course_id . '">Enroll</a>
          </div>
        </div>
      </a>
      </div>';
      }
    }
    ?>

  </div>
</div>
  <!-- <div class="card-deck mt-4">
    <?php

    $sql = "SELECT * FROM course LIMIT 3 , 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" width="200" height="300"  alt="!st" />
          <div class="card-body">
            <h5 class="card-title">' . $row['course_name'] . '</h5>
            <p class="card-text">' . $row['course_desc'] . '</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_orignal_price'] . '</del></small>
              <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id=' . $course_id . '">Enroll</a>
          </div>
        </div>
      </a>';
      }
    }
    ?>
  </div>
  <div class="card-deck mt-4">
    <?php

    $sql = "SELECT * FROM course LIMIT 6 , 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" width="200" height="300" alt="!st" />
          <div class="card-body">
            <h5 class="card-title">' . $row['course_name'] . '</h5>
            <p class="card-text">' . $row['course_desc'] . '</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_orignal_price'] . '</del></small>
              <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id=' . $course_id . '">Enroll</a>
          </div>
        </div>
      </a>';
      }
    }
    ?>

  </div>
  <div class="card-deck mt-4">
    <?php

    $sql = "SELECT * FROM course LIMIT 9 , 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" width="200" height="300" alt="!st" />
          <div class="card-body">
            <h5 class="card-title">' . $row['course_name'] . '</h5>
            <p class="card-text">' . $row['course_desc'] . '</p>
          </div>
          <div class="card-footer">
            <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_orignal_price'] . '</del></small>
              <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span>
            </p>
            <a class="btn btn-primary text-white font-weight-bolder float-right" href="./cousedetail.php?course_id=' . $course_id . '">Enroll</a>
          </div>
        </div>
      </a>';
      }
    }
    ?>

  </div>
</div> -->

<!-- contectus.php -->
<?php
include('./maininclude/contectus.php');
?>
<!-- End Contectus -->

<!-- footer.php -->

<?php
include('./maininclude/footer.php');
?>

<!--footer end  -->