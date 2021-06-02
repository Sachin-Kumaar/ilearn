<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmial=$_SESSION['stuLogEmail'];
}

// include('./stuInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
     $_SESSION['stuLogEmial']= $stuLogEmial;
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link media="screen" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stustyle.css">
</head>
<body>
    <div class="container-fluid bg-sucess p-2">
        <h3>Welcome to Learn2Earn</h3>
        <a class="btn btn-danger" href="./myCourse.php">My Courses</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                       if(isset($_GET['course_id'])){
                           $course_id = $_GET['course_id'];
                           $sql = "SELECT * FROM lession WHERE course_id= '$course_id'";
                           $result = $conn->query($sql);
                           if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){
                                   echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lession_link'].' style="cursor:pointer;">'.$row['lession_name'].'</li>';
                               }
                           }
                       } 
                    ?>
                
                </ul>
            </div>
            <div class="col-sm-8">
                       <video id="videoarea" src="<?php ?>" class="mt-5 w-75 ml-2" controls>
                       </video>
            </div>
        </div>
    </div>


<script src="../js/jquory.min.js"></script>
<script src="../js/poppper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/custum.js"></script>
<script src="../js/ajaxrequest.js"></script>
<script src="../js/adminloginrequest.js"></script>

</body>

</html>