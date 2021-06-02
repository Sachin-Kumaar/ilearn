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
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_type'] == "") || ($_REQUEST['stu_pass']
        == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $s_id = $_REQUEST['stu_id'];
        $s_name = $_REQUEST['stu_name'];
        $s_email = $_REQUEST['stu_email'];
        $s_type = $_REQUEST['stu_type'];
        $s_pass = $_REQUEST['stu_pass'];
        $s_img = '../image/student/' . $_FILES['stu_img']['name'];

        $sql = "UPDATE student SET stu_id ='$s_id', stu_name = '$s_name', stu_email = '$s_email', stu_pass = '$s_pass',
        stu_type = '$s_type', stu_img = '$s_img'
        WHERE stu_id='$s_id'";
        
        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student added Succesfully</div>';
        }else{
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}

?>



<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM student WHERE stu_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>


    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if (isset($row['stu_id'])) {
                                                                                                    echo $row['stu_id'];
                                                                                                } ?>" readonly >
        </div>
        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if (isset($row['stu_name'])) {
                                                                                                    echo $row['stu_name'];
                                                                                                } ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if (isset($row['stu_email'])) {
                                                                                                    echo $row['stu_email'];
                                                                                                } ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass" row=2 value="<?php if (isset($row['stu_pass'])) {
                                                                                                        echo $row['stu_pass'];
                                                                                                    } ?> ">
        </div>
        <div class="form-group">
            <label for="stu_type">Occupation</label>
            <input type="text" class="form-control" id="stu_type" name="stu_type" value="<?php if (isset($row['stu_type'])) {
                                                                                                        echo $row['stu_type'];
                                                                                                    } ?>">
        </div>
        <div class="form-group">
            <label for="stu_img">Student Image</label>
            <img src="<?php if (isset($row['stu_img'])) {
                            echo $row['stu_img'];
                        } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="stu_img" name="stu_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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