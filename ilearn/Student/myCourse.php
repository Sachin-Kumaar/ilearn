<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmial=$_SESSION['stuLogEmail'];
}

include('./stuInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
     $_SESSION['stuLogEmial']= $stuLogEmial;
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>
<div class="col-sm-6 mt-5 mx-3">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Courses</h4>
            <?php
                if(isset($stuLogEmial)){
                    $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, 
                    c.course_img, c.course_author, c.course_orignal_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id= co.course_id WHERE co.stu_email = '$stuLogEmial'";
                    $result = $conn->query($sql);
                    if($result -> num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            ?>
                            <div class="bg-light mb-3">
                                <h5 class="card-header"><?php echo $row['course_name']; ?></h5>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo $row['course_img'];?>" class="card-img-top mt-4" alt="pic">
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                    <div class="card-body">
                                        <p class="card-title">
                                            <?php echo $row['course_desc']; ?>
                                        </p>
                                        <small class="card-text">Duration :  <?php echo $row['course_duration']; ?> </small><br />
                                        <small class="card-text">Instructor : <?php echo $row['course_author']; ?></small><br />
                                        <p class="card-text d-inline">Price : <small><del>&#8377 <?php echo $row['course_orignal_price']; ?></del></small>
                                        <span class="font-weight-bold">&#8377 <?php echo $row['course_price']; ?></span></p><br />
                                        <a href= "watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary mt-4 float-right">Watch Course</a>
                                    </div>
                                    </div>  
                                </div>
                            </div>

                       <?php     
                        }
                        
                    }
                }
            
            
            ?>
        </div>
    </div>
</div>



<script src="js/jquory.min.js"></script>
<script src="js/poppper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/ajaxrequest.js"></script>
<script src="js/adminloginrequest.js"></script>

</body>

</html>