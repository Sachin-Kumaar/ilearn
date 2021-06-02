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
    $stu_pass = $row["stu_pass"];
}
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['stu_pass'] == "")) {
        $passmsg = '<div class="alert alert-warning" col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $stu_pass = $_REQUEST["stu_pass"];
        $sql = "UPDATE student SET  stu_pass = '$stu_pass' WHERE stu_email = '$stuLogEmial'";
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
    <h3 class="text-center">Update Student Password</h3>
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
            <label for="stu_pass">Student Password</label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass">
        </div><br>
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