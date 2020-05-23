<?php
  include_once 'inc/header.php';
  include_once 'lib/User.php';
  Session::checkSession();
  $user = new User();
    $loginmsg = Session::get('loginmsg');
    if (isset($loginmsg)) {
      
    echo $loginmsg;
    }
    SESSION::set('loginmsg', NULL);

?>
        
        <div class="card-header">
          <h2>User List <span class="float-right">Welcome 
            <?php
              $name = Session::get('name');
              if (isset($name)) {
                echo $name;
              }
            ?>
          </span></h2>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th width="5%">Id</th>
                <th width="20%">Name</th>
                <th width="20%">Username</th>
                <th width="35%">Email</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $user = new User();
                $userData = $user->getUserData();
                foreach ($userData as $data) {
              ?>
              <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">view</a></td>
              </tr>
              <?php }  ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Main content End -->
<?php
  include_once 'inc/footer.php';
?>
