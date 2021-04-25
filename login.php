<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="User Login Page" content="Forms">
        <title>User Login Page</title>
        
    </head>
    <body>
        <h1>User Login Page</h1>
 <!-- css need to be replicated from signup page form -->
        <form name = "userform" action="home.php"  method ="post">
            <label for="email">Email: </label>
            <input type="email" id="email" placeholder="Enter your Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" required >
            <br><br>
            <label for="Password">Password: </label>
            <input type="password" id="pass" placeholder="Enter your Password" name="pass" required>
            <br><br>
	    
		
            <input type="submit" name="submit" value="Validate">
            <input type="reset" name="reset" value="Reset to clear ">
                  
        </form>

       <!-- user info from sign up page-->
                
            <?php
                function createUser(){
                    
                    include 'dbconnection.php';
                        
                        $firstname = $_POST['Firstname'];
                        $lastname = $_POST['Lastname'];
                        $email = $_POST['email'];
                        $phone = $_POST['Phone'];
                        $password = $_POST['password'];
                        $password_repeat = $_POST['password-repeat'];
                        $address = $_POST['Address'];   
                        $city = $_POST['City'];
                        $state = $_POST['State'];
                        $country = $_POST['Country'];
                        $zip = $_POST['Zipcode'];
                
        //  inserting the data into database


                
                        $sql1 = "SELECT MAX(USER_ID) AS 'id' FROM USER_INFO";
                        $result = mysqli_query($conn, $sql1);
                        $row = mysqli_fetch_assoc($result);
                        $newid = $row['id'] + 1;


                        $sql2 = "INSERT INTO USER_INFO(USER_ID, FIRSTNAME, LASTNAME, PASSWORD, PHONE, EMAIL, ADDRESS, CITY, COUNTRY, STATE, ZIPCODE )
                        VALUES ('".$newid."','".$firstname."', '".$lastname."', '".$password."', '".$phone."' , '".$email."', '".$address."', '".$city."', '".$country."', '".$state."', '".$zip."')";

                        if (mysqli_query($conn, $sql2)) {
                            $conn->exec($sql2);
                        } 

                        else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                }


               if(isset($_POST['createuser'])){
                    createUser();
               }

                   
            ?>
 
    </body>
    
</html>
