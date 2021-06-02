<!-- header.php -->
<?php
include('./dbConnection.php');
include('./maininclude/header.php');
?>

<!--header end  -->

<!-- banner -->

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/1st.jpg" alt="course" style="height: 500px; width: 100%; object-fit:cover;
    box-shadow:10px;" />
    </div>
</div>


<!-- banner end -->

<div class="container mt-5">
    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $_SESSION['couse_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['course_id'] = $course_id;
    }

    ?>
    <div class="row">
        <div class="col-md-4">
            <img src=" <?php echo str_replace('..', '.', $row['course_img'])  ?>" class="card-img-top" alt="img" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo $row['course_name'];  ?> </h5>
                <p class="card-text">
                    Description: <?php echo $row['course_desc'];  ?>
                </p>
                <p class="card-text">Duration: <?php echo $row['course_duration'];  ?> </p>
                <form action="checkout.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['course_price']?>">
                    <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_orignal_price']; ?> </del><span class="fomt-weight-bolder">&#8377 <?php echo $row['course_price']; ?> </small></p>
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>

                </form>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <th scope="col">Lesson No.</th>
                <th scope="col">Lesson Name</th>
            </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM lession";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $num = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($course_id == $row['course_id']) {
                        $num++;
                        echo '<tr>
                    <th scope="row"> '.$num.' </th>
                    <td> ' . $row['lession_name'] . '</tb>
                    </tr>';
                    }
                }
            }



            ?>
        </tbody>
        </table>
    </div>
</div>


<!-- footer.php -->

<?php
include('./maininclude/footer.php');
?>

<!--footer end  -->