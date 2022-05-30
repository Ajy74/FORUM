<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="loginmodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="#loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form action="/forum/partials/_loginhandler.php" method="post">
                      <div class="mb-3">
                          <label for="loginEmail" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp"
                              name="loginEmail">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                      </div>
                      <div class="mb-3">
                          <label for="lpassword" class="form-label">Password</label>
                          <input type="lpassword" class="form-control" id="lpassword" name="lpassword">
                      </div>

                      <button type="submit" class="btn btn-primary">LOGIN</button>
                  </form> 
            </div>
        </div>
    </div>
</div>