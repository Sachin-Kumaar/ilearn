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
if (isset($_REQUEST['newStuSubmitBtn'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_type'] == "") || ($_REQUEST['stu_pass']
        == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_type = $_REQUEST['stu_type'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_img = $_FILES['stu_img']['name'];
        $stu_img_temp = $_FILES['stu_img']['tmp_name'];
        $img_folder = '../image/student/' . $stu_img;
        move_uploaded_file($stu_img_temp, $img_folder);

        $sql = "INSERT INTO student (stu_name, stu_email, stu_type, stu_pass, stu_img) 
        VALUE ('$stu_name', '$stu_email', '$stu_type', '$stu_pass', '$img_folder')";

        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student added Succesfully</div>';
        }else{
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email ID</label>
            <input type="email" class="form-control" id="stu_email" name="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="password" class="form-control" id="stu_pass" name="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_type">Occupation</label>
            <input type="text" class="form-control" id="stu_type" name="stu_type">
        </div>
        <div class="form-group">
            <label for="stu_img">Student Image</label>
            <input type="file" class="form-control-file" id="stu_img" name="stu_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
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