<?php

try {
   $conn = new PDO('mysql:127.0.0.1;=$servername;dbname=cosc', 'root', '');
   if(isset($_POST['save'])){
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $hash=password_hash($password,PASSWORD_DEFAULT);
   //$pass=md5($pass);// hash password for security
   $insert=$conn->prepare("INSERT INTO users(username, password, email)
               values(:username,:password,:email)");
   $insert->bindParam('username',$username);
   $insert->bindParam('email',$email);
   $insert->bindParam('password',$password);
   $insert->execute();
   header("location:index.php");

   }

   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
   $conn = null;
?>



<!DOCTYPE html>
        <html>
            <body>
                <h1> Welcome to My page</h1>
                <h7> Please Login</h7>
                <form  method="post" action="registration.php">
                    
                    Username:<input type="text" username="username"><br><br>
	                Email:   <input type="text" email="email"><br><br>
                    Password: <input type="passowrd" password="password"><br><br>
                    <input type="submit" name="save" value="save">
					
                </form>

                <?php
                    if(isset($output)){
                         echo $output;
                    } 
                ?>
            </body>
        </html>
        </html>