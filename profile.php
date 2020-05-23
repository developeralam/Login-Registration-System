<?php
  include_once 'inc/header.php';
  include_once 'lib/User.php';
  if (isset($_GET['id'])) {
    $userId = (int)$_GET['id'];
    $user = new User();
    $data = $user->getUserById($userId);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $update = $user->updateUserData($_POST);
    }
  }
?>
        
        <div class="card-header">
          <h2>User Profile <span class="float-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
        </div>
        <div class="card-body">
          <div class="m-auto" style="width:600px">
            <?php 
              if (isset($update)) {
                  echo $update;
              }
              if (isset($data)) {
            ?>
            <form action="" method="post">
              <div class="form-group">
                <input type="hidden"  name="id" value="<?php echo $data->id; ?>">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name Here" value="<?php echo $data->name; ?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="<?php echo $data->username; ?>" name="username" id="username" placeholder="Enter Your Username Here">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Here" value="<?php echo $data->email; ?>">
              </div>
              <button type="submit" class="btn btn-success">Update</button>
            </form>
            <?php
              }else{
                echo '<h1>No Data Found</h1>';
              }
            ?>
          </div>
        </div>
      </div>
      <!-- Main content End -->
<?php
  include_once 'inc/footer.php';
?>