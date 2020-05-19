<?php
  include_once 'inc/header.php';
  include_once 'lib/User.php';
  $user = new User();
    $loginmsg = Session::get('loginmsg');
    if (isset($loginmsg)) {
      
    echo $loginmsg;
    }

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
              <tr>
                <td>01</td>
                <td>Md Alam</td>
                <td>devalam</td>
                <td>mail.alam.bd@gamil.com</td>
                <td><a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
              </tr>
              <tr>
                <td>01</td>
                <td>Md Alam</td>
                <td>devalam</td>
                <td>mail.alam.bd@gamil.com</td>
                <td><a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
              </tr>
              <tr>
                <td>01</td>
                <td>Md Alam</td>
                <td>devalam</td>
                <td>mail.alam.bd@gamil.com</td>
                <td><a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Main content End -->
<?php
  include_once 'inc/footer.php';
?>