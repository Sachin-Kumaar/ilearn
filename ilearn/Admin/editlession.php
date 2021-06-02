<?php
if (!isset($_SESSION)) {
    session_start();
}
include('navinclude.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['lession_id'] == "") || ($_REQUEST['lession_name']
        == "") || ($_REQUEST['lession_desc'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lession_id = $_REQUEST['lession_id'];
        $lession_name = $_REQUEST['lession_name'];
        $lession_desc = $_REQUEST['lession_desc'];
        $lession_link = '../lessionvid/' . $_FILES['lession_link']['name'];

        $sql = "UPDATE lession SET course_id ='$course_id', course_name = '$course_name', lession_id = '$lession_id', lession_name = '$lession_name',
        lession_desc = '$lession_desc', lession_link = '$lession_link'
        WHERE lession_id='$lession_id'";

        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center">Lesson edited Succesfully</div>';
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2  text-center">Unable to edit lesson</div>';
        }
    }
}

?>



<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM lession WHERE lession_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>


    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                                                                                                echo $row['course_id'];
                                                                                            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                                                                                                    echo $row['course_name'];
                                                                                                } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lession_id">Lesson ID</label>
            <input type="text" class="form-control" id="lession_id" name="lession_id" value="<?php if (isset($row['lession_id'])) {
                                                                                                    echo $row['lession_id'];
                                                                                                } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lession_name">Lesson Name</label>
            <input type="text" class="form-control" id="lession_name" name="lession_name" value="<?php if (isset($row['lession_name'])) {
                                                                                                        echo $row['lession_name'];
                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="lession_desc">Lesson Description</label>
            <textarea type="text" class="form-control" id="lession_desc" name="lession_desc" row=2><?php if (isset($row['lession_desc'])) {
                                                                                                        echo $row['lession_desc'];
                                                                                                    } ?></textarea>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php if (isset($row['lession_link'])) {
                                                            echo $row['lession_link'];
                                                        } ?>" allowfullscreen></iframe>
        </div>
        <div class="form-group">
            <label for="lession_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" id="lession_link" name="lession_link">
        </div>
        <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
        <a href="students.php" class="btn btn-secondary">Close</a>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
</div>
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