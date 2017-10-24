<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please create an account</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="/login/register" method="post">
			    <fieldset>
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
        </html></div>
					</div>
			    </fieldset>
			</form>
			<a href="/login/register"> Sign up here </a>
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
