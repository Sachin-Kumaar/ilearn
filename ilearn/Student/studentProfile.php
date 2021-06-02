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
$sql = "SELECT * FROM student WHERE stu_email= '$stuLogEmial'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_type"];
    $stuImg = $row["stu_img"];
}
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['stuName'] == "")) {
        $passmsg = '<div class="alert alert-warning" col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/student/' . $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);
        $sql = "UPDATE student SET stu_name='$stuName', stu_type = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuLogEmial'";
        if($conn->query($sql) == True){
            $passmsg = '<div class="alert alert-success" col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        }else{
            $passmsg = '<div class="alert alert-danger" col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}
// })

?>
<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Update Student Details</h3>
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuId)) {
                                                                                            echo $stuId;
                                                                                        } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="stuEmail">Student Email</label>
            <input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php if (isset($stuLogEmial)) {
                                                                                                echo $stuLogEmial;
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="stuName">Student Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if (isset($stuName)) {
                                                                                                echo $stuName;
                                                                                            } ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_type">Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) {
                                                                                                echo $stuOcc;
                                                                                            } ?>">
        </div><br>
        <div class="form-group">
            <label for="stuImg">Student Image</label>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>
        <div class="text-left"><br>
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>






<script src="js/jquory.min.js"></script>
<script src="js/poppper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/ajaxrequest.js"></script>
<script src="js/adminloginrequest.js"></script>

</body>

</html>