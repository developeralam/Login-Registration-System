<?php
  include_once 'inc/header.php';
?>
        
        <div class="card-header">
          <h2>User Profile <span class="float-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
        </div>
        <div class="card-body">
          <div class="m-auto" style="width:600px">
            
            <form action="" method="post">
              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name Here">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Username Here">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Here">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password Here">
              </div>
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Main content End -->
<?php
  include_once 'inc/footer.php';
?>