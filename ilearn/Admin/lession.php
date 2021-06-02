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

?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
    $sql = "SELECT course_id FROM course";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (($row['course_id']) == $_REQUEST['checkid']) {
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
    ?>
                <h4 class="mt-5 bg-dark text-white p-2">
                    Course ID:<?php if (isset($row['course_id'])) {
                                    echo $row['course_id'];
                                } ?> &nbsp;&nbsp;&nbsp;&nbsp; Course Name: <?php if (isset($row['course_name'])) {
                                                                        echo $row['course_name'];
                                                                    } ?> </h4>

    <?php
                $sql = "SELECT * FROM lession WHERE course_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                echo '<table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Lesson ID</th>
                                <th scope="col">Lesson Name</th>   
                                <th scope="col">Lesson Link</th>   
                                <th scope="col">Action</th>  
                                </tr> 
                            </thead>
                            <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row["lession_id"] . '</th>';
                    echo '<th>' . $row["lession_name"] . '</th>';
                    echo '<th>' . $row["lession_link"] . '</th>';
                    echo '<td>';
                    echo '<form action="editlession.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row["lession_id"] . '>
                    <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                            <i class="fas fa-pen"></i></button>
                            </form>
                                <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value=' . $row["lession_id"] . '>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>';
                }

                echo '</tbody>
                        </table>';
            }
        }
    }
    ?>


</div>
<?php
if (isset($_SESSION['course_id'])) {
    echo '<div>
        <a class="btn btn-danger box" href="addlession.php">
            <i class="fas fa-plus fa-2x"></i>
        </a>
        </div>';
}

?>

<?php

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM lession WHERE lession_id = {$_REQUEST['id']}";
        if($conn->query($sql) == true){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }


?>






<script src="../js/jquory.min.js"></script>
<script src="../js/poppper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/adminloginrequest.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>