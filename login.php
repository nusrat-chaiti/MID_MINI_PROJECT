<?php
	session_start();

	if(isset($_POST['submit'])){

		$id 		= $_POST['id'];
		$password 	= $_POST['password'];

		if(empty($id) || empty($password)){
			echo "null submission";

		}else{
			
			$conn =mysqli_connect('localhost', 'root', '', 'MID_MINI_PROJECT');
			//$sql = "select * from users where username='".$id."' and password='".$password."'";
			$sql = "select * from users where username='{$id}' and password='{$password}'";

			$result = mysqli_query($conn, $sql);
			$user 	= mysqli_fetch_assoc($result);
			
			if(count($user) > 0 ){
				$_SESSION['status']  = "Ok";
				header('location: home.php');
			}else{
				echo "Invalid username/password";
			}
		}

	}else{
		header("location: login.html");
	}

?>