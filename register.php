<?php 
	
	include('config.php');
	
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$email=$_POST['email'];
	//$password=md5($_POST['password']);
        $password=($_POST['password']);
	$mobile=$_POST['mobile'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$name = "/^[A-Z][a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";


	if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($mobile) || empty($address1) || empty($address2)){
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	}
	else{
		

		
					$sql="INSERT INTO user_info (first_name, last_name, email, password, mobile, address1, address2) VALUES ('$f_name','$l_name','$email','$password','$mobile','$address1','$address2')";
					$run_query=mysqli_query($conn,$sql);
					if($run_query){
						echo "

							<script>

							alert('Registered SuccessFully');
							window.open('login.html');
							</script>
								
						";
					}
			
		}
	

	

	
 ?>