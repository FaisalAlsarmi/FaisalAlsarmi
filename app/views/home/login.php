<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please login on the website </h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="/login/index" method="post">
			    <fieldset>
					  <p>
                    Username:<input type="text" name="username"><br><br>
                    Password: <input     type="passowrd" name="password"><br><br>
                    <input type="submit" name="login" value="login">
                    <input type="submit" name="report" value="report">
					<?php echo "<p><a href='registration.php'> register here</a>";?>
			    </fieldset>
			</form>
			<a href="/login/register"> Sign up here </a>
        </div>
    </div>

    <?php require_once '../app/views/templates/footerPublic.php' ?>
