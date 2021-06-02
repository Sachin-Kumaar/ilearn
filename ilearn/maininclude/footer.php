<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
      <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
      </div>
    </div>
  </div>
  <div class="container-fluid p-4" style="background-color: #E9ECEF">
    <div class="container" style="background-color: #E9ECEF;">
      <div class="row text-center">
        <div class="col-sm">
          <h5>About US</h5>
          <p>
            Learn2Earn is a open Learing platfrom Where everyone can learn what they
            want to learn here every course is free of cost.
          </p>
        </div>
        <div class="col-sm">
          <h5>Category</h5>
          <a class="text-dark" href="#">Web Development</a><br />
          <a class="text-dark" href="#">Web Designing</a><br />
          <a class="text-dark" href="#">Android App Dev</a><br />
          <a class="text-dark" href="#">IOS Development</a><br />
          <a class="text-dark" href="#">Data Analysis</a><br />
        </div>
        <div class="col-sm">
          <h5>COntact US</h5>
          <p>
            Learn2Earn Pvt. Ltd.<br>
            DAVIET College<br>
            Kabir Nagar Jalandhar<br>
          </p>
        </div>
      </div>
    </div>
  </div>
  <footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2021 || Designed by 1803853 ||<a href="#" data-bs-toggle="modal" data-bs-target="#adminLoginModel"> Admin Login</a></small>
  </footer>

  <!-- Modal1-->
  <?php
    include('./maininclude/registration.php');
  ?>
<!-- Modal2-->

  <div class="modal fade" id="LoginModel" tabindex="-1" aria-labelledby="LoginModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LoginModel">Student Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="stuLoginForm">
            <div class="form-group">
              <i class="fas fa-user"></i>
              <label for="stuLogemail" class="pl-2 font-weight-bold">Email address</label>
              <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
              </div>
            <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
            </div>
          </form>
          <small id="statusLogMsg"></small>
        </div>
        <div class="modal-footer">
        <!-- <small id="statusLogMsg"></small> -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
          <!-- <small id="statusLogMsg"></small> -->
        </div>
      </div>
    </div>
  </div>

<!-- model3 -->

  <div class="modal fade" id="adminLoginModel" tabindex="-1" aria-labelledby="adminLoginModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModel">Admin Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="adminLoginForm">
            <div class="form-group">
              <i class="fas fa-user"></i>
              <label for="adminLogemail" class="pl-2 font-weight-bold">Email address</label>
              <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
              </div>
            <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
        <small id="statusadminLogMsg"></small>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()"> Login</button>
        </div>
      </div>
    </div>
  </div>


  <script src="js/jquory.min.js"></script>
  <script src="js/poppper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/ajaxrequest.js"></script>
  <script src="js/adminloginrequest.js"></script>

</body>

</html>