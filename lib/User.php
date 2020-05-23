<?php
	include_once 'Session.php';
	include_once 'Database.php';

/**
 * 
 */
class User
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}
	//User Registration
	public function userRegistration($data)
	{
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = md5($data['password']);
		$chckEmail = $this->emailCheck($email);
		if ($name == "" or $username == "" or $email == "" or $password == "") {
			$msg = '<div class="alert alert-danger"><strong>Error</strong> Filed Must Not be Empty</div>';
			return $msg;
		}else if(strlen($username) < 3){
			$msg = '<div class="alert alert-danger"><strong>Error</strong> User Name Should Be 8 Charcter</div>';
			return $msg;
		}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$msg = '<div class="alert alert-danger"><strong>Error</strong> This Email Is Not Valid</div>';
			return $msg;
		}else if($chckEmail == true){
			$msg = '<div class="alert alert-danger"><strong>Error</strong> This Email Already Used</div>';
			return $msg;
		}else{
			$sql = "INSERT INTO tbl_user(name, username, email, password) VALUES(:name, :username, :email, :password)";
			$stmt = $this->db->pdo->prepare($sql);
			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':username', $username);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':password', $password);
			$result = $stmt->execute();
			if ($result) {
				$msg = '<div class="alert alert-success"><strong>Success</strong> Registration Successfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error</strong> Something Went Wrong</div>';
			return $msg;
			}

		}


	}
	//User Login
	public function userLogin($data)
	{
		$email = $data['email'];
		$password = md5($data['password']);
		$chckEmail = $this->emailCheck($email);
		if ($email == "" or $password == "") {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong> Field Must Not Be Empty</div>';
				return $msg;
		}else if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Email Is Not Valid</div>';
				return $msg;
		}

		if ($chckEmail == true) {
			$result = $this->getloginUser($email, $password);
			if ($result) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> You are logged in</div>';
				SESSION::init();
				SESSION::set('login', true);
				SESSION::set('id', $result->id);
				SESSION::set('name', $result->name);
				SESSION::set('email', $result->email);
				SESSION::set('username', $result->username);
				SESSION::set('loginmsg', $msg);
				header('Location:index.php');

			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Data Not Found</div>';
				return $msg;
			}
		}else{
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Email Not Found</div>';
				return $msg;	
		}

	}
	public function getloginUser($email, $password)
	{
		$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $password);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	
	
	public function emailCheck($email)	{
		$sql = "SELECT email FROM tbl_user WHERE email= :email";
		$stmt= $this->db->pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function getUserData()
	{
		$sql = "SELECT * FROM tbl_user";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function getUserById($id)
	{
		$sql = "SELECT * FROM tbl_user WHERE id = :id LIMIT 1";
		$stmt= $this->db->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function updateUserData($data)
	{
		$id = $data['id'];
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$chckEmail = $this->emailCheck($email);
		if (empty($name) or empty($username) or empty($email)) {
			$msg = '<div class="alert alert-danger"><strong>Error!</strong>Field Must Not Be Empty</div>';
			return $msg;
		}else if($chckEmail == true){
			$msg = '<div class="alert alert-danger"><strong>Error!</strong>This Email Already Exist</div>';
			return $msg;
		}else{
			$sql = "UPDATE INTO tbl_user(name, username, email) VALUES(:name, :username, :email) WHERE id = :id";
			$stmt = $this->db->pdo->prepare($sql);
			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':username', $username);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':id', $id);
			$result =$stmt->execute();
			if (isset($result)) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong>Profile Updated Successfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong>Something Went Wrong</div>';
				return $msg;
			}
		}
	}
}