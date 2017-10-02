<?php
 	session_start();  
	$output = "";
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true){
		$output .= "<h2>Welcome <span style='color:blue'>" . $_SESSION['username']. "!</span></h2>";
		$output .= "<h4>Your password is " . $_SESSION['password']. "</h4>";
		$output .= "<h4>You logged in on " . $_SESSION['current_date']. "</h4>";
	} else {

        header("Location: index.php");
        die();

    } 

?>

<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>
		<form  method="post" action="logout.php">
		<?php
			echo $output;
			echo "<input type='submit' name='logout' value='logout'>";
		?>
		</form>
	</body>
</html>