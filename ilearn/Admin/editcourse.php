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
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_orignal_price']
        == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_author'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cduration = $_REQUEST['course_duration'];
        $corignalprice = $_REQUEST['course_orignal_price'];
        $cprice = $_REQUEST['course_price'];
        $cauthor = $_REQUEST['course_author'];
        $cimg = '../image/courseimg/' . $_FILES['course_img']['name'];

        $sql = "UPDATE course SET course_id ='$cid', course_name = '$cname', course_desc = '$cdesc', course_author = '$cauthor',
        course_duration = '$cduration', course_price = '$cprice', course_orignal_price = '$corignalprice', course_img = '$cimg'
        WHERE course_id='$cid'";
        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course added Succesfully</div>';
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
}

?>



<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM course WHERE course_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>


    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                                                                                                    echo $row['course_id'];
                                                                                                } ?>" readonly >
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                                                                                                    echo $row['course_name'];
                                                                                                } ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea type="text" class="form-control" id="course_desc" name="course_desc" row=2><?php if (isset($row['course_desc'])) {
                                                                                                        echo $row['course_desc'];
                                                                                                    } ?> 
            </textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if (isset($row['course_author'])) {
                                                                                                        echo $row['course_author'];
                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if (isset($row['course_duration'])) {
                                                                                                            echo $row['course_duration'];
                                                                                                        } ?>">
        </div>
        <div class="form-group">
            <label for="course_orignal_price">Course Orignal Price</label>
            <input type="text" class="form-control" id="course_orignal_price" name="course_orignal_price" value="<?php if (isset($row['course_orignal_price'])) {
                                                                                                                        echo $row['course_orignal_price'];
                                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if (isset($row['course_price'])) {
                                                                                                        echo $row['course_price'];
                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if (isset($row['course_img'])) {
                            echo $row['course_img'];
                        } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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