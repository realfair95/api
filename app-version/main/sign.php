<?php 
require("db.php");
if(isset($_POST['login'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	//check user
	$query=mysqli_query($con,"SELECT * FROM user_admin WHERE user_name='$username' AND password='$password' LIMIT 1");
	if($query){
		if(mysqli_num_rows($query)==1){
			while($r=mysqli_fetch_array($query)){
				$id=$r[0];
				$admin=$r[7];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['admin']=$admin;

				header("Location:dashboard");
			}
		}else{
			?>
			<p style="padding: 10px;color: #fff;background:#AC0900;border-radius: 10px; ">
				Invalid credentials!!!
			</p>
			<?php
		}
	}else{
		die(mysqli_error($con));
	}
}
?>