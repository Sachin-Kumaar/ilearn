<?php
if(!isset($_SESSION)){
    session_start();
}
include('navinclude.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else{
    echo "<script> location.href='../index.php';</script>";
}
if (isset($_REQUEST['courseSubmitBtn'])) {
    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_orignal_price']
        == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_author'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_duration = $_REQUEST['course_duration'];
        $course_orignal_price = $_REQUEST['course_orignal_price'];
        $course_price = $_REQUEST['course_price'];
        $course_author = $_REQUEST['course_author'];
        $course_img = $_FILES['course_img']['name'];
        $course_img_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimg/' . $course_img;
        move_uploaded_file($course_img_temp, $img_folder);

        $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration,
        course_price, course_orignal_price) VALUE ('$course_name', '$course_desc', '$course_author', '$img_folder',
         '$course_duration', '$course_price', '$course_orignal_price')";

        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course added Succesfully</div>';
        }else{
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea type="text" class="form-control" id="course_desc" name="course_desc" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_orignal_price">Course Orignal Price</label>
            <input type="text" class="form-control" id="course_orignal_price" name="course_orignal_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>



<script src="../js/jquory.min.js"></script>
<script src="../js/poppper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/adminloginrequest.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>