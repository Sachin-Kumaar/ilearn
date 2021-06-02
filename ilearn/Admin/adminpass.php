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
$adminEmail = $_SESSION['adminLogEmail'];

if (isset($_REQUEST['adminPassUpdate'])) {
    if (($_REQUEST['adminPass'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $adminPass = $_REQUEST['adminPass'];
            $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
            if ($conn->query($sql) == true) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
                role= "alert"> Update Successfilly </div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
                role= "alert">Unable to Update</div>';
            }
        }
    }
}

?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $adminEmail ?> " readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="text" class="form-control" id="inputnewpassword" name="adminPass">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger" id="adminPassUpdate" name="adminPassUpdate">Update</button>
                    <a href="adminDasboard.php" class="btn btn-secondary">Close</a>

                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </div>
            </form>
        </div>
    </div>
</div>




<script src="../js/jquory.min.js"></script>
<script src="../js/poppper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/adminloginrequest.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>