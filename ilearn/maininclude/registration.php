<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="stuRegForm">
            <div class="form-group">
              <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">
                Name</label><small id="statusMsg1"></small>
                <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
            </div>
            <div class="form-group">
              <i class="fas fa-user"></i>
              <label for="stuemail" class="pl-2 font-weight-bold">Email address</label><small id="statusMsg2"></small>
              <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
              <samll>We'll never share your email with anyone else.</samll>
            </div>
            <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="stupass" class="pl-2 font-weight-bold">New Password</label><small id="statusMsg3"></small>
              <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <span id="successMsg">  

        </span>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
