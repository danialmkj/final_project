<?php

require_once 'connection.php' ;


$email = @$_POST['email'];
$password = @$_POST['password'];

$isValidEmail = filter_var($email , FILTER_VALIDATE_EMAIL ) ;

if($connection){
	
	if($isValidEmail === false ){
		
		echo "Email isnot correct" ;
		
	}else {
		
		$emailCheckQuery = "SELECT * FROM users WHERE email LIKE '$email' " ;
		$emailQuery = mysqli_query($connection , $emailCheckQuery);
		
		$passwordCheckQuery = "SELECT * FROM users WHERE password LIKE '$password' ";
		$passwordQuery = mysqli_query($connection , $passwordCheckQuery);
		
		
		   if(mysqli_num_rows($emailQuery) > 0 && mysqli_num_rows($passwordQuery) > 0 ){
			   
			
				$queryCheckLogin = " SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'  "; 
				$queryLogin = mysqli_query($connection , $queryCheckLogin);

		   
						if(mysqli_num_rows($queryLogin) > 0 ){
				  
				  
							echo "login successfully" ;
			   
						}else{
			   
							echo "Failed login" ;
						}
				  
			}else{
				  
					echo "you donot have account";
				  
				}
		   
		   }
		
		
	}else {
	
	echo "Internet Connection has Problem" ;
	
}





?>