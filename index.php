     <?php
        session_start();  
        // if the user is really logged in, let show the welcome page
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true)
        {

          header("Location: welcome.php");
          die();

        } else { // otherwise, show login page

            $error = "";
            $is_submit = false;
            if (isset($_POST['login'])) {
                $is_submit = true;
            }

            // check the user login
            if($is_submit && empty($_POST['username']))
            {
                $error .= "User name is empty!<br/>";
            }
            
            if($is_submit && empty($_POST['password']))
            {
                $error .= "Password is empty!<br/>";
            }

            if ($is_submit && empty($error)) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                
                if($username=="test" && $password=="123456")
                {
                   $_SESSION['authenticated'] = true;
                   $_SESSION['username'] = $username;
                   $_SESSION['password'] = $password;
                   $_SESSION['current_date'] = date("l, F j, Y - h:i");
                   header("Location: welcome.php");
                   die();
                } else{
                     $_SESSION['authenticated'] = false;
                     $error = "The username or password is incorrect!<br/>";
                     $attempts = array();
                     if(isset($_SESSION["failed_login_attempt"])){
                        $attempts = $_SESSION["failed_login_attempt"];
                     }
                     
                     $attempts[] = date("l, F j, Y - h:i");
                     $_SESSION["failed_login_attempt"] = $attempts;
                }
            
            }

            if (isset($_POST['report'])) {
               if(isset($_SESSION["failed_login_attempt"])){
                    $attempts = $_SESSION["failed_login_attempt"];
                    $output = "<h2>All the previous attempts (" . count($attempts) .")</h2>";
                    foreach ($attempts as $value) {
                        $output .= $value . "<br>";
                    }
               } else{
                    $error = "There is no failed login attempt!<br/>";
               }
            }

        }

     ?>


        <!DOCTYPE html>
        <html>
            <body>
                <h1> Welcome to My page</h1>
                <h7> Please Login</h7>
                <form  method="post" action="index.php">
                    <p style="color: red">
                        <?php if(!empty($error)){ echo $error;} ?>
                    <p>
                    Username:<input type="text" name="username"><br><br>
                    Password: <input     type="passowrd" name="password"><br><br>
                    <input type="submit" name="login" value="login">
                    <input type="submit" name="report" value="report">
                </form>

                <?php
                    if(isset($output)){
                         echo $output;
                    } 
                ?>
            </body>
        </html>
    