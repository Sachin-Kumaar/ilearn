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
$sql= "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql= "SELECT * FROM student";
$result = $conn->query($sql);
$totalstudent = $result->num_rows;

$sql= "SELECT * FROM courseorder";
$result = $conn->query($sql);
$totalcourseorder = $result->num_rows;


?>
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalcourse ?></h4>
                    <a class="btn text-white" href="courses.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalstudent ?></h4>
                    <a class="btn text-white" href="students.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Sold</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalcourseorder ?></h4>
                    <a class="btn text-white" href="sellreport.php">View</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">Course Ordered</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                $sql = "SELECT * FROM courseorder";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                    echo'              
                    <th scope="row">'.$row["order_id"].'</th>
                    <td>'.$row["course_id"].'</td>
                    <td>'.$row["stu_email"].'</td>
                    <td>'.$row["order_date"].'</td>
                    <td>'.$row["amount"].'</td>
                    <td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["or_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                            <i class="far fa-trash-alt"></i></button></td>
                </tr>';
                } }else{
                    echo "0 Results";
                }
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM courseorder WHERE or_id ={$_REQUEST['id']}";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="refresh" content= "0;URL=?
                        deleted" />'; 
                    }else{
                        echo "Unable to Delete Data";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
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