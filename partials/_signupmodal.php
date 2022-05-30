<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="signupmodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="#signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/forum/partials/_signuphandler.php" method="post">
              <div class="mb-3">
                  <label for="signupEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp" name="signupEmail">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                  <label for="spassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="spassword" name="spassword">
              </div>
              <div class="mb-3">
                  <label for="cpassword" class="form-label">Confirm Password</label>
                  <input type="cpassword" class="form-control" id="cpassword" name="cpassword">
              </div>
              <button type="submit" class="btn btn-primary">SIGNUP</button>
        </form> 
      </div>
      </div>
      
  </div>
</div>