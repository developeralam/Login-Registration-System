<?php
  include_once 'inc/header.php';
  include_once 'lib/User.php';
?>
<?php
  $user = new User();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userLogin = $user->userLogin($_POST);
  }
?>  
        
        <div class="card-header">
          <h2>User Login</h2>
        </div>
        <?php
          if (isset($userLogin)) {
            echo $userLogin;
          }
        ?>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Email Here">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password Here">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>
      </div>
      <!-- Main content End -->
<?php
  include_once 'inc/footer.php';
?>