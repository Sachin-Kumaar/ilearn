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
<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <labe1 for="stuLogEmail" class="pl-2 font-weight-bold">Email</labe1><small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <labe1 for="stuLogPass" class="pl-2 font-weight-bold">Password</labe1>
                    <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>

            </form></br>
            <small id="statusLogMsg"></small>
        </div>

        <div class="col-md-6 offset-md-1">
            <h5 class="md-3"> New User !! Sign Up</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <labe1 for="stuname" class="pl-2 font-weight-bold">Name</labe1>
                    <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <labe1 for="stuemail" class="pl-2 font-weight-bold">Email</labe1><small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <labe1 for="stupass" class="pl-2 font-weight-bold">Password</labe1>
                    <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
                </div>
                <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Login</button>
            </form><br>
            <small id="successMsg"></small>
        </div>
    </div>


</div>
<?php

include('./maininclude/contectus.php');
include('./maininclude/footer.php');


?>