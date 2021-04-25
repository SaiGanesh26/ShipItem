<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>


			<!-- printing the first name after login -->
			<?php
			
			    include('dbconnection.php');

			 // Check connection
				// echo "Verifying your Database Connection......."."<br>";
			 //    if (mysqli_connect_errno())
			 //      {
			 //      echo "Failed to connect to MySQL: " . mysqli_connect_error();
			 //      }else{
				// echo "Connection successful!"."<br>";
				// }

			   	//Variable Assignment
				$email= $_POST['email'];
				$password= $_POST['pass'];
				// echo "<h2>Welcome... $email, the Cust/Trav user!</h2>"."<br>";
				
				$query = "SELECT * FROM USER_INFO where EMAIL = '$email' and PASSWORD = '$password' " ;	
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($result);


				if(!$result){
						die("Query Failed!");
					}
					else
						{
							//echo "query successful!";
						}

				// echo "EMAIL:". $row['EMAIL']."<br>"."PASSWORD:". $row['PASSWORD'];

				if($row['EMAIL']==$email && $row['PASSWORD']==$password){
			            echo "Hey ". $row['FIRSTNAME'].",";
			        }
			    else
			        {
			            echo "login Failure!";
					header("Location: error.html");
					exit();
			        }
			        mysqli_close($conn);
			?>




</body>
</html>
